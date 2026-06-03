<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Menu extends Model
{
    protected $fillable = [
        'id_kategori',
        'nama_menu',
        'harga',
        'gambar',
        'status'];


        public function kategori(): BelongsTo
    {
        return $this->belongsTo(Kategori::class, 'id_kategori');
    }

        public function detailTransaksis(): HasMany
    {
        return $this->hasMany(DetailTransaksi::class, 'id_menu');
    }

    public function tambahMenu() {}
    public function editMenu() {}
    public function hapusMenu() {}
    public function ubahStatusMenu() {}
}
