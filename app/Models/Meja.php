<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Meja extends Model
{
    // Kolom yang boleh diisi (Mass Assignment)
    protected $fillable = [
        'kode_meja',
        'nama_meja',
        'kapasitas',
        'lokasi',
        'status',
        'aktif',
    ];

    /**
     * Relasi: Satu meja bisa punya banyak riwayat transaksi
     */
    public function transaksi(): HasMany
    {
        return $this->hasMany(Transaksi::class, 'id_meja');
    }

    public function tambahMeja() {}
    public function editMeja() {}
    public function hapusMeja() {}
    public function ubahStatusMeja() {}
}
