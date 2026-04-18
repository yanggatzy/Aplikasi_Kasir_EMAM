<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transaksi extends Model
{
    protected $fillable = [
        'nama_pelanggan',
        'jenis_pesanan',
        'tanggal',
        'total',
        'metode_pembayaran',
        'id_meja',
        'id_user',
    ];

     public function detail(): HasMany
    {
        return $this->hasMany(DetailTransaksi::class, 'id_transaksi');
    }

    public function meja(): BelongsTo
    {
        return $this->belongsTo(Meja::class, 'id_meja');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function buatTransaksi() {}
    public function hitungTotal() {}
    public function simpanTransaksi() {}

}
