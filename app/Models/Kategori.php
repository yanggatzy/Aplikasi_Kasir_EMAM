<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Kategori extends Model
{
    protected $fillable = [
        'nama_kategori',
        'deskripsi',
        'status',
    ];

    public function menus(): HasMany
    {
        return $this->hasMany(Menu::class, 'id_kategori');
    }

    public function tambahKategori() {}
    public function editKategori() {}
    public function hapusKategori() {}
    public function ubahStatusKategori() {}
}
