<?php

namespace Database\Seeders;

use App\Models\DetailTransaksi;
use App\Models\Meja;
use App\Models\Menu;
use App\Models\Transaksi;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class TransaksiSeeder extends Seeder
{
    private array $namaList = [
        'Budi Santoso', 'Siti Rahayu', 'Agus Prasetyo', 'Dewi Lestari', 'Eko Cahyono',
        'Fitri Handayani', 'Guntur Wibowo', 'Hani Safitri', 'Irwan Kusuma', 'Joko Susilo',
        'Kartini', 'Luki Pranata', 'Maya Sari', 'Nanda Putra', 'Oki Setiawan',
        'Putri Utami', 'Rendi Kurniawan', 'Sri Mulyani', 'Tono Hartono', 'Udin Bakrie',
        'Vivi Andriani', 'Wahyu Triono', 'Xena Claudia', 'Yanto Purnomo', 'Zulfikar',
        'Take Away', 'Take Away', 'Take Away',
    ];

    public function run(): void
    {
        $kasir    = User::where('role', 'kasir')->first();
        $menus    = Menu::where('status', 'tersedia')->get();
        $mejaIds  = Meja::pluck('id')->toArray();
        $metodes  = ['tunai', 'qris', 'transfer'];

        if (!$kasir || $menus->isEmpty()) {
            $this->command->warn('Jalankan DatabaseSeeder dulu sebelum TransaksiSeeder.');
            return;
        }

        // Buat transaksi untuk 14 hari terakhir
        for ($daysAgo = 13; $daysAgo >= 0; $daysAgo--) {
            $date = Carbon::today()->subDays($daysAgo);

            // Hari kerja lebih ramai, weekend lebih ramai lagi
            $isWeekend  = in_array($date->dayOfWeek, [6, 0]);
            $jumlahTrx  = $isWeekend ? rand(18, 28) : rand(10, 18);

            for ($t = 0; $t < $jumlahTrx; $t++) {
                $isTakeaway = rand(0, 3) === 0; // 25% takeaway
                $idMeja     = $isTakeaway ? null : $mejaIds[array_rand($mejaIds)];
                $nama       = $this->namaList[array_rand($this->namaList)];
                $metode     = $metodes[array_rand($metodes)];

                // Ambil 1-4 menu acak
                $itemCount   = rand(1, 4);
                $pickedMenus = $menus->random($itemCount);
                $subtotal    = 0;
                $itemData    = [];

                foreach ($pickedMenus as $menu) {
                    $jumlah    = rand(1, 3);
                    $sub       = $menu->harga * $jumlah;
                    $subtotal += $sub;
                    $itemData[] = ['menu' => $menu, 'jumlah' => $jumlah, 'subtotal' => $sub];
                }

                $pajak = round($subtotal * 0.1);
                $total = $subtotal + $pajak;

                // Waktu acak dalam hari itu (jam 08.00 - 21.00)
                $jam    = rand(8, 20);
                $menit  = rand(0, 59);
                $tanggal = $date->copy()->setTime($jam, $menit, 0);

                $transaksi = Transaksi::create([
                    'nama_pelanggan'    => $nama,
                    'jenis_pesanan'     => $isTakeaway ? 'takeaway' : 'dine-in',
                    'tanggal'           => $tanggal,
                    'total'             => $total,
                    'metode_pembayaran' => $metode,
                    'id_meja'           => $idMeja,
                    'id_user'           => $kasir->id,
                ]);

                foreach ($itemData as $item) {
                    DetailTransaksi::create([
                        'id_transaksi' => $transaksi->id,
                        'id_menu'      => $item['menu']->id,
                        'jumlah'       => $item['jumlah'],
                        'subtotal'     => $item['subtotal'],
                    ]);
                }
            }
        }

        $total = Transaksi::count();
        $this->command->info("TransaksiSeeder selesai: {$total} transaksi dibuat.");
    }
}
