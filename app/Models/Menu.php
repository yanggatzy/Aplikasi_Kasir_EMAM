<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Menu extends Model
{
    protected $fillable = [
        'id_kategori',
        'nama_menu',
        'harga',
        'gambar',
        'status'];


        public function category(): BelongsTo
    {
        return $this->belongsTo(Kategori::class, 'id_kategori');
    }

    public function tambahMenu() {}
    public function editMenu() {}
    public function hapusMenu() {}
    public function ubahStatusMenu() {}
}
