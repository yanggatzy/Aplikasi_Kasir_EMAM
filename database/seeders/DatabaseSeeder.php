<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. BUAT USER (Login Admin & Manager)
        User::create([
            'username' => 'kasir',
            'password' => Hash::make('kasir123'),
            'role' => 'kasir',
        ]);

        User::create([
            'username' => 'manager',
            'password' => Hash::make('manager123'),
            'role' => 'manager',
        ]);

    }
}
