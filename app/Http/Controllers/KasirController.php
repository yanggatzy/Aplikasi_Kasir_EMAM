<?php

namespace App\Http\Controllers;

use App\Models\DetailTransaksi;
use App\Models\Meja;
use App\Models\Menu;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class KasirController extends Controller
{
    public function index()
    {
        return view('kasir.kasir');
    }

    public function getMenus()
    {
        $menus = Menu::with('kategori')
            ->where('status', 'tersedia')
            ->get()
            ->map(fn($m) => [
                'id'        => $m->id,
                'nama_menu' => $m->nama_menu,
                'harga'     => $m->harga,
                'gambar'    => $m->gambar,
                'kategori'  => $m->kategori->nama_kategori,
            ]);

        return response()->json($menus);
    }

    public function getMejas()
    {
        $mejas = Meja::where('status', 'tersedia')
            ->get()
            ->map(fn($m) => [
                'id'   => $m->id,
                'kode' => $m->kode_meja,
                'nama' => $m->nama_meja,
            ]);

        return response()->json($mejas);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_pelanggan'    => 'required|string|max:100',
            'jenis_pesanan'     => 'required|in:dine-in,takeaway',
            'metode_pembayaran' => 'required|in:tunai,qris,transfer',
            'id_meja'           => 'nullable|exists:mejas,id',
            'status_meja'       => 'nullable|in:terisi,dipesan',
            'items'             => 'required|array|min:1',
            'items.*.id_menu'   => 'required|exists:menus,id',
            'items.*.jumlah'    => 'required|integer|min:1',
        ]);

        $result = DB::transaction(function () use ($validated) {
            $subtotal    = 0;
            $itemDetails = [];

            foreach ($validated['items'] as $item) {
                $menu = Menu::find($item['id_menu']);
                $sub  = $menu->harga * $item['jumlah'];
                $subtotal += $sub;
                $itemDetails[] = [
                    'id_menu'  => $item['id_menu'],
                    'nama'     => $menu->nama_menu,
                    'harga'    => $menu->harga,
                    'jumlah'   => $item['jumlah'],
                    'subtotal' => $sub,
                ];
            }

            $pajak = round($subtotal * 0.1);
            $total = $subtotal + $pajak;

            $transaksi = Transaksi::create([
                'nama_pelanggan'    => $validated['nama_pelanggan'],
                'jenis_pesanan'     => $validated['jenis_pesanan'],
                'tanggal'           => now(),
                'total'             => $total,
                'metode_pembayaran' => $validated['metode_pembayaran'],
                'id_meja'           => $validated['id_meja'] ?? null,
                'id_user'           => Auth::id(),
            ]);

            foreach ($itemDetails as $detail) {
                DetailTransaksi::create([
                    'id_transaksi' => $transaksi->id,
                    'id_menu'      => $detail['id_menu'],
                    'jumlah'       => $detail['jumlah'],
                    'subtotal'     => $detail['subtotal'],
                ]);
            }

            if (!empty($validated['id_meja']) && !empty($validated['status_meja'])) {
                Meja::find($validated['id_meja'])->update(['status' => $validated['status_meja']]);
            }

            return compact('transaksi', 'itemDetails', 'subtotal', 'pajak', 'total');
        });

        return response()->json([
            'success'   => true,
            'transaksi' => $result['transaksi'],
            'items'     => $result['itemDetails'],
            'subtotal'  => $result['subtotal'],
            'pajak'     => $result['pajak'],
            'total'     => $result['total'],
        ]);
    }
}
