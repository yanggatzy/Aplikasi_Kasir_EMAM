<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Authenticatable
{
    protected $fillable = [
        'nama',
        'email',
        'password',
        'role'
    ];


    // Method sesuai use case
    public function login() {}
    public function logout() {}
    public function tambahUser() {}
    public function editUser() {}
    public function hapusUser() {}
}
