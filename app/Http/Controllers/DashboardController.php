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

        // ── CHART: pendapatan per hari (7 hari terakhir) ──
        $hariSingkat = ['Min','Sen','Sel','Rab','Kam','Jum','Sab'];
        $chartData = collect(range(6, 0))->map(function ($n) use ($today, $hariSingkat) {
            $date  = $today->copy()->subDays($n);
            $total = (int) Transaksi::whereDate('tanggal', $date)->sum('total');
            return ['label' => $hariSingkat[$date->dayOfWeek], 'value' => $total];
        })->values();

        $maxVal   = (int) $chartData->max('value');
        $step     = $maxVal > 500000 ? 100000 : ($maxVal > 100000 ? 50000 : 10000);
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
