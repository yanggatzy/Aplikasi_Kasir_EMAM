<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transaction extends Model
{
    protected $fillable = [
        'user_id', 'table_id', 'invoice_number', 'total_price',
        'amount_received', 'change_amount', 'order_type',
        'payment_method', 'status', 'transaction_notes'
    ];

    // Relasi ke detail (Isi pesanan)
    public function details(): HasMany
    {
        return $this->hasMany(TransactionDetail::class);
    }

    // Relasi ke meja
    public function table(): BelongsTo
    {
        return $this->belongsTo(Table::class);
    }
}
