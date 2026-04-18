<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DetailTransaksi extends Model
{
    protected $fillable = [
        'id_transaksi',
        'id_menu',
        'jumlah',
        'subtotal',
        'notes'
    ];

    public function transaksi(): BelongsTo
    {
        return $this->belongsTo(Transaksi::class, 'id_transaksi');
    }

    public function menu(): BelongsTo
    {
        return $this->belongsTo(Menu::class, 'id_menu');
    }

    public function hitungSubtotal() {}

}
