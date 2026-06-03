<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DashboardController extends Controller
{
    /**
     * Display dashboard dengan data statistik
     */
    public function index()
    {
        $today = date('Y-m-d');
        $startOfWeek = Carbon::now()->startOfWeek();
        $endOfWeek = Carbon::now()->endOfWeek();

        // Statistik Hari Ini
        $totalPenjualanHariIni = DB::table('transactions')
            ->whereDate('created_at', $today)
            ->sum('amount');

        $totalTransaksiHariIni = DB::table('transactions')
            ->whereDate('created_at', $today)
            ->count();

        $pelangganBaruHariIni = DB::table('customers')
            ->whereDate('created_at', $today)
            ->count();

        // Data Mingguan
        $pendapatanMingguan = $this->getPendapatanMingguan();

        // Menu Terlaris
        $menuTerlaris = $this->getMenuTerlaris();

        // Aktivitas Terbaru
        $aktivitasTerbaru = $this->getAktivitasTerbaru();

        // Ringkasan Hari Ini
        $transaksiGagal = DB::table('transactions')
            ->whereDate('created_at', $today)
            ->where('status', 'failed')
            ->count();

        $penggunaAktif = DB::table('customers')
            ->whereDate('last_activity', $today)
            ->count();

        $rerataTransaksi = $totalPenjualanHariIni > 0
            ? $totalPenjualanHariIni / max($totalTransaksiHariIni, 1)
            : 0;

        return view('dashboard', [
            'totalPenjualanHariIni' => $totalPenjualanHariIni,
            'totalTransaksiHariIni' => $totalTransaksiHariIni,
            'pelangganBaruHariIni' => $pelangganBaruHariIni,
            'pendapatanMingguan' => $pendapatanMingguan,
            'menuTerlaris' => $menuTerlaris,
            'aktivitasTerbaru' => $aktivitasTerbaru,
            'transaksiGagal' => $transaksiGagal,
            'penggunaAktif' => $penggunaAktif,
            'rerataTransaksi' => $rerataTransaksi,
        ]);
    }

    /**
     * Get pendapatan per hari dalam minggu ini
     */
    private function getPendapatanMingguan()
    {
        $days = [];
        $data = [];

        $startOfWeek = Carbon::now()->startOfWeek();

        for ($i = 0; $i < 4; $i++) {
            $date = $startOfWeek->copy()->addDays($i);
            $dayName = $date->format('l'); // Senin, Selasa, dst
            $dateStr = $date->toDateString();

            $amount = DB::table('transactions')
                ->whereDate('created_at', $dateStr)
                ->where('status', 'success')
                ->sum('amount');

            $days[] = $dayName;
            $data[] = $amount;
        }

        return [
            'days' => $days,
            'amounts' => $data,
            'total' => array_sum($data),
            'average' => count($data) > 0 ? array_sum($data) / count($data) : 0,
        ];
    }

    /**
     * Get menu yang paling banyak terjual
     */
    private function getMenuTerlaris()
    {
        return DB::table('order_items')
            ->select('products.id', 'products.name', 'products.icon', DB::raw('COUNT(*) as sold'))
            ->join('products', 'order_items.product_id', '=', 'products.id')
            ->join('orders', 'order_items.order_id', '=', 'orders.id')
            ->whereDate('orders.created_at', date('Y-m-d'))
            ->groupBy('products.id', 'products.name', 'products.icon')
            ->orderByDesc('sold')
            ->limit(5)
            ->get();
    }

    /**
     * Get aktivitas terbaru
     */
    private function getAktivitasTerbaru()
    {
        // Pelanggan baru
        $newCustomers = DB::table('customers')
            ->select('id', 'name', 'created_at', DB::raw("'Pelanggan Baru' as type"))
            ->where('created_at', '>=', Carbon::now()->subHours(24))
            ->limit(3);

        // Transaksi besar
        $largeTransactions = DB::table('transactions')
            ->select('id', 'amount as name', 'created_at', DB::raw("'Transaksi Besar' as type"))
            ->where('amount', '>=', 500000)
            ->where('created_at', '>=', Carbon::now()->subHours(24))
            ->limit(3)
            ->union($newCustomers);

        return $largeTransactions->orderByDesc('created_at')->get();
    }

    /**
     * API endpoint untuk fetch data real-time
     */
    public function getStats()
    {
        $today = date('Y-m-d');

        return response()->json([
            'totalPenjualan' => DB::table('transactions')
                ->whereDate('created_at', $today)
                ->sum('amount'),
            'totalTransaksi' => DB::table('transactions')
                ->whereDate('created_at', $today)
                ->count(),
            'pelangganBaru' => DB::table('customers')
                ->whereDate('created_at', $today)
                ->count(),
        ]);
    }

    /**
     * Get chart data untuk Chart.js
     */
    public function getChartData($type = 'daily')
    {
        $data = [];

        if ($type === 'daily') {
            // Data 7 hari terakhir
            for ($i = 6; $i >= 0; $i--) {
                $date = Carbon::now()->subDays($i)->toDateString();
                $amount = DB::table('transactions')
                    ->whereDate('created_at', $date)
                    ->sum('amount');

                $data[] = $amount;
            }
        } elseif ($type === 'monthly') {
            // Data per bulan dalam tahun ini
            for ($month = 1; $month <= 12; $month++) {
                $amount = DB::table('transactions')
                    ->whereYear('created_at', date('Y'))
                    ->whereMonth('created_at', $month)
                    ->sum('amount');

                $data[] = $amount;
            }
        }

        return response()->json([
            'labels' => $this->getLabels($type),
            'data' => $data,
        ]);
    }

    /**
     * Get labels untuk chart
     */
    private function getLabels($type)
    {
        if ($type === 'daily') {
            $labels = [];
            for ($i = 6; $i >= 0; $i--) {
                $labels[] = Carbon::now()->subDays($i)->format('d M');
            }
            return $labels;
        } elseif ($type === 'monthly') {
            return ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun',
                    'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'];
        }
    }
}
