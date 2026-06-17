<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\DetailTransaksi;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function kasirDashboard()
    {
        return view('kasir.dashboard', $this->buildData());
    }

    public function managerDashboard()
    {
        return view('manager.dashboard', $this->buildData());
    }

    private function buildData(): array
    {
        $today = today();

        // ── STAT CARDS ──
        $pendapatanHariIni    = Transaksi::whereDate('tanggal', $today)->sum('total');
        $totalTransaksiHariIni = Transaksi::whereDate('tanggal', $today)->count();
        $pelangganHariIni     = Transaksi::whereDate('tanggal', $today)
                                    ->distinct('nama_pelanggan')
                                    ->count('nama_pelanggan');

        // ── CHART: porsi terjual per hari (minggu ini Sen–Min) ──
        $hariSingkat = ['Sen','Sel','Rab','Kam','Jum','Sab','Min'];
        $monday = $today->copy()->startOfWeek(Carbon::MONDAY);
        $chartData = collect(range(0, 6))->map(function ($n) use ($today, $monday, $hariSingkat) {
            $date  = $monday->copy()->addDays($n);
            $total = $date->gt($today) ? 0
                : (int) DetailTransaksi::whereHas('transaksi', fn($q) => $q->whereDate('tanggal', $date))->sum('jumlah');
            return ['label' => $hariSingkat[$n], 'value' => $total];
        })->values();

        $maxVal   = (int) $chartData->max('value');
        $step     = $maxVal > 100 ? 50 : ($maxVal > 20 ? 10 : 5);
        $chartMax = (int) ceil(max($maxVal, $step) / $step) * $step;

        // ── MENU TERLARIS (all-time, top 5) ──
        $menuTerlaris = DetailTransaksi::select('id_menu', DB::raw('SUM(jumlah) as total_terjual'))
            ->groupBy('id_menu')
            ->orderByDesc('total_terjual')
            ->take(5)
            ->with('menu')
            ->get()
            ->filter(fn($d) => $d->menu !== null)
            ->values();

        return compact(
            'pendapatanHariIni', 'totalTransaksiHariIni', 'pelangganHariIni',
            'chartData', 'chartMax', 'menuTerlaris'
        );
    }
}
