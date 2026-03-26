<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Table extends Model
{
    // Kolom yang boleh diisi (Mass Assignment)
    protected $fillable = [
        'number',
        'capacity',
        'status',
        'is_active'
    ];

    /**
     * Relasi: Satu meja bisa punya banyak riwayat transaksi
     */
    public function transactions(): HasMany
    {
        return $this->hasMany(Transaction::class);
    }
}
