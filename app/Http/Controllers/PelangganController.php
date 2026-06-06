<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Menu;
use App\Models\DetailTransaksi;
use Illuminate\Support\Facades\DB;

class PelangganController extends Controller
{
    public function index()
    {
        return view('pelanggan.menu');
    }

    public function getMenus()
    {
        $kategoris = Kategori::where('status', 'aktif')
            ->orderBy('nama_kategori')
            ->get(['id', 'nama_kategori']);

        $menus = Menu::with('kategori')
            ->where('status', 'tersedia')
            ->get()
            ->map(fn($m) => [
                'id'           => $m->id,
                'nama_menu'    => $m->nama_menu,
                'harga'        => $m->harga,
                'gambar'       => $m->gambar,
                'id_kategori'  => $m->id_kategori,
                'nama_kategori'=> $m->kategori->nama_kategori ?? '-',
            ]);

        return response()->json([
            'kategoris' => $kategoris,
            'menus'     => $menus,
        ]);
    }

    public function getTerlaris()
    {
        $terlaris = DetailTransaksi::select('id_menu', DB::raw('SUM(jumlah) as total_terjual'))
            ->groupBy('id_menu')
            ->orderByDesc('total_terjual')
            ->take(5)
            ->with('menu')
            ->get()
            ->filter(fn($d) => $d->menu !== null)
            ->map(fn($d) => [
                'id'           => $d->menu->id,
                'nama_menu'    => $d->menu->nama_menu,
                'harga'        => $d->menu->harga,
                'gambar'       => $d->menu->gambar,
                'total_terjual'=> $d->total_terjual,
            ])
            ->values();

        // fallback jika belum ada transaksi
        if ($terlaris->isEmpty()) {
            $terlaris = Menu::where('status', 'tersedia')
                ->take(5)
                ->get()
                ->map(fn($m) => [
                    'id'           => $m->id,
                    'nama_menu'    => $m->nama_menu,
                    'harga'        => $m->harga,
                    'gambar'       => $m->gambar,
                    'total_terjual'=> 0,
                ]);
        }

        return response()->json($terlaris);
    }
}
