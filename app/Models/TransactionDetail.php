<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TransactionDetail extends Model
{
    protected $fillable = ['transaction_id', 'menu_id', 'quantity', 'price', 'notes'];

    public function menu(): BelongsTo
    {
        return $this->belongsTo(Menu::class);
    }
}
