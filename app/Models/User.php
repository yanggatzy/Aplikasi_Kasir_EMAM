<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'username',
        'password',
        'role'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function transaksis(): HasMany
    {
        return $this->hasMany(Transaksi::class, 'id_user');
    }

    // Method sesuai use case

    public function login() {}
    public function logout() {}
    public function tambahUser() {}
    public function editUser() {}
    public function hapusUser() {}
}
