<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;

class DashboardController extends Controller
{
    public function index()
    {
        // Mengambil semua data menu
        $menus = Menu::all();

        // Menghitung statistik sederhana untuk dashboard
        $totalMenu = $menus->count();
        $totalHargaMenu = $menus->sum('price');

        // Mengirim data ke file view bernama 'dashboard'
        return view('dashboard', compact('menus', 'totalMenu', 'totalHargaMenu'));
    }
}
