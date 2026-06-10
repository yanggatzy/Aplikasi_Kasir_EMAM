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

        // ── CHART: jumlah transaksi per hari (7 hari terakhir) ──
        $hariSingkat = ['Min','Sen','Sel','Rab','Kam','Jum','Sab'];
        $chartData = collect(range(6, 0))->map(function ($n) use ($today, $hariSingkat) {
            $date  = $today->copy()->subDays($n);
            $count = Transaksi::whereDate('tanggal', $date)->count();
            return ['label' => $hariSingkat[$date->dayOfWeek], 'value' => $count];
        })->values();

        $chartMax  = max((int) $chartData->max('value'), 5);
        $chartMax  = (int) ceil($chartMax / 5) * 5;

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
