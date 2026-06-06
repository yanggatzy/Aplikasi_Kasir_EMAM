<?php

namespace Database\Seeders;

use App\Models\Kategori;
use App\Models\Menu;
use App\Models\Meja;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // ── USERS ──
        User::create(['username' => 'kasir',   'password' => Hash::make('kasir123'),   'role' => 'kasir']);
        User::create(['username' => 'manager', 'password' => Hash::make('manager123'), 'role' => 'manager']);

        // ── KATEGORI ──
        $kategoriMap = [];
        foreach (['Makanan Utama', 'Minuman', 'Snacks', 'Dessert'] as $nama) {
            $kategoriMap[$nama] = Kategori::create([
                'nama_kategori' => $nama,
                'status'        => 'aktif',
            ])->id;
        }

        // ── MENU ──
        $menus = [
            ['Nasi Goreng Spesial', 'Makanan Utama', 20000],
            ['Es Teh Manis',        'Minuman',        6000],
            ['Ayam Bakar Madu',     'Makanan Utama', 42000],
            ['Kentang Goreng',      'Snacks',        15000],
            ['Es Jeruk Peras',      'Minuman',        9000],
            ['Pisang Keju',         'Dessert',       15000],
            ['Soto Ayam',           'Makanan Utama', 18000],
            ['Bakso Urat',          'Makanan Utama', 22000],
            ['Gado-Gado',           'Makanan Utama', 16000],
            ['Es Kopi Susu',        'Minuman',       12000],
            ['Tempe Mendoan',       'Snacks',         8000],
            ['Es Krim Coklat',      'Dessert',       12000],
        ];

        foreach ($menus as [$nama, $kat, $harga]) {
            Menu::create([
                'id_kategori' => $kategoriMap[$kat],
                'nama_menu'   => $nama,
                'harga'       => $harga,
                'status'      => 'tersedia',
            ]);
        }

        // ── MEJA ──
        $mejas = [
            ['T-01', 'Meja 01', 'INDOOR',  4],
            ['T-02', 'Meja 02', 'INDOOR',  2],
            ['T-03', 'Meja 03', 'OUTDOOR', 6],
            ['T-04', 'Meja 04', 'INDOOR',  8],
            ['T-05', 'Meja 05', 'OUTDOOR', 4],
            ['T-06', 'Meja 06', 'INDOOR',  4],
            ['T-07', 'Meja 07', 'INDOOR',  6],
            ['T-08', 'Meja 08', 'OUTDOOR', 2],
            ['T-09', 'Meja 09', 'INDOOR',  4],
            ['T-10', 'Meja 10', 'OUTDOOR', 2],
            ['T-11', 'Meja 11', 'INDOOR',  4],
            ['T-12', 'Meja 12', 'INDOOR',  4],
            ['T-13', 'Meja 13', 'OUTDOOR', 6],
            ['T-14', 'Meja 14', 'INDOOR',  2],
            ['T-15', 'Meja 15', 'INDOOR',  4],
            ['T-16', 'Meja 16', 'OUTDOOR', 8],
            ['T-17', 'Meja 17', 'INDOOR',  4],
            ['T-18', 'Meja 18', 'INDOOR',  4],
            ['T-19', 'Meja 19', 'OUTDOOR', 2],
            ['T-20', 'Meja 20', 'INDOOR',  6],
            ['T-21', 'Meja 21', 'INDOOR',  4],
            ['T-22', 'Meja 22', 'OUTDOOR', 4],
            ['T-23', 'Meja 23', 'INDOOR',  2],
            ['T-24', 'Meja 24', 'INDOOR',  8],
            ['T-25', 'Meja 25', 'OUTDOOR', 4],
            ['T-26', 'Meja 26', 'INDOOR',  4],
            ['T-27', 'Meja 27', 'INDOOR',  2],
            ['T-28', 'Meja 28', 'OUTDOOR', 6],
        ];

        foreach ($mejas as [$kode, $nama, $lokasi, $kap]) {
            Meja::create([
                'kode_meja' => $kode,
                'nama_meja' => $nama,
                'lokasi'    => $lokasi,
                'kapasitas' => $kap,
                'status'    => 'tersedia',
            ]);
        }
    }
}
