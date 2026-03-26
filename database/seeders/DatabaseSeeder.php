<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use App\Models\Menu;
use App\Models\Table;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. BUAT USER (Login Admin & Manager)
        User::create([
            'name' => 'Admin Yunus',
            'email' => 'admin@emam.com',
            'password' => \Illuminate\Support\Facades\Hash::make('password123'),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'Manager Emam',
            'email' => 'manager@emam.com',
            'password' => \Illuminate\Support\Facades\Hash::make('password123'),
            'role' => 'manager',
        ]);

        // 2. BUAT KATEGORI (FR-04)
        $makanan = Category::create(['name' => 'Foods', 'is_active' => true]);
        $minuman = Category::create(['name' => 'Drinks', 'is_active' => true]);

        // 3. BUAT MENU (FR-05)
        Menu::create([
            'category_id' => $makanan->id,
            'name' => 'Nasi Goreng Spesial',
            'price' => 25000,
            'is_available' => true,
        ]);

        Menu::create([
            'category_id' => $minuman->id,
            'name' => 'Es Teh Manis',
            'price' => 5000,
            'is_available' => true,
        ]);

        // 4. BUAT MEJA (FR-06 & FR-07)
        Table::create(['number' => 'A1', 'capacity' => 2, 'status' => 'available', 'is_active' => true]);
        Table::create(['number' => 'B1', 'capacity' => 4, 'status' => 'maintenance', 'is_active' => true]);
    }
}
