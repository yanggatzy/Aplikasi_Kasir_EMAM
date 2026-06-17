<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Menu;
use App\Models\Meja;
use App\Models\User;
use App\Models\Transaksi;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ManagerController extends Controller
{
    // ══════════════════════════════════════════
    //  KATEGORI
    // ══════════════════════════════════════════

    public function indexKategori()
    {
        $kategoris = Kategori::withCount('menus')->get();
        return view('manager.kategori', compact('kategoris'));
    }

    public function storeKategori(Request $request)
    {
        $data = $request->validate([
            'nama_kategori' => 'required|string|max:100',
            'deskripsi'     => 'nullable|string',
        ]);
        Kategori::create(array_merge($data, ['status' => 'aktif']));
        return response()->json(['success' => true]);
    }

    public function updateKategori(Request $request, Kategori $kategori)
    {
        $data = $request->validate([
            'nama_kategori' => 'required|string|max:100',
            'deskripsi'     => 'nullable|string',
        ]);
        $kategori->update($data);
        return response()->json(['success' => true]);
    }

    public function destroyKategori(Kategori $kategori)
    {
        $kategori->delete();
        return response()->json(['success' => true]);
    }

    public function toggleKategori(Kategori $kategori)
    {
        $kategori->update([
            'status' => $kategori->status === 'aktif' ? 'nonaktif' : 'aktif',
        ]);
        return response()->json(['success' => true, 'status' => $kategori->status]);
    }

    // ══════════════════════════════════════════
    //  MENU
    // ══════════════════════════════════════════

    public function indexMenu()
    {
        $menus     = Menu::with('kategori')->get();
        $kategoris = Kategori::where('status', 'aktif')->get();
        return view('manager.menu', compact('menus', 'kategoris'));
    }

    public function storeMenu(Request $request)
    {
        $data = $request->validate([
            'nama_menu'   => 'required|string|max:100',
            'id_kategori' => 'required|exists:kategoris,id',
            'harga'       => 'required|numeric|min:0',
            'gambar'      => 'nullable|image|max:2048',
        ]);
        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('menus', 'public');
        }
        Menu::create(array_merge($data, ['status' => 'tersedia']));
        return response()->json(['success' => true]);
    }

    public function updateMenu(Request $request, Menu $menu)
    {
        $data = $request->validate([
            'nama_menu'   => 'required|string|max:100',
            'id_kategori' => 'required|exists:kategoris,id',
            'harga'       => 'required|numeric|min:0',
            'gambar'      => 'nullable|image|max:2048',
        ]);
        if ($request->hasFile('gambar')) {
            if ($menu->gambar) Storage::disk('public')->delete($menu->gambar);
            $data['gambar'] = $request->file('gambar')->store('menus', 'public');
        } else {
            unset($data['gambar']);
        }
        $menu->update($data);
        return response()->json(['success' => true]);
    }

    public function destroyMenu(Menu $menu)
    {
        if ($menu->gambar) Storage::disk('public')->delete($menu->gambar);
        $menu->delete();
        return response()->json(['success' => true]);
    }

    public function toggleMenu(Menu $menu)
    {
        $menu->update([
            'status' => $menu->status === 'tersedia' ? 'habis' : 'tersedia',
        ]);
        return response()->json(['success' => true, 'status' => $menu->status]);
    }

    // ══════════════════════════════════════════
    //  MEJA (CRUD – status dikelola kasir)
    // ══════════════════════════════════════════

    public function indexMeja()
    {
        $mejas = Meja::all();
        return view('manager.meja', compact('mejas'));
    }

    public function storeMeja(Request $request)
    {
        $data = $request->validate([
            'kode_meja' => 'required|string|max:20|unique:mejas',
            'nama_meja' => 'required|string|max:100',
            'kapasitas' => 'required|integer|min:1',
            'lokasi'    => 'required|in:INDOOR,OUTDOOR',
        ]);
        Meja::create(array_merge($data, ['status' => 'tersedia']));
        return response()->json(['success' => true]);
    }

    public function updateMeja(Request $request, Meja $meja)
    {
        $data = $request->validate([
            'nama_meja' => 'required|string|max:100',
            'kapasitas' => 'required|integer|min:1',
            'lokasi'    => 'required|in:INDOOR,OUTDOOR',
        ]);
        $meja->update($data);
        return response()->json(['success' => true]);
    }

    public function destroyMeja(Meja $meja)
    {
        $meja->delete();
        return response()->json(['success' => true]);
    }

    public function toggleMeja(Meja $meja)
    {
        $newStatus = $meja->status === 'nonaktif' ? 'tersedia' : 'nonaktif';
        $meja->update(['status' => $newStatus]);
        return response()->json(['success' => true, 'status' => $newStatus]);
    }

    // ══════════════════════════════════════════
    //  USER
    // ══════════════════════════════════════════

    public function indexUser()
    {
        $users = User::where('role', 'kasir')->get();
        return view('manager.user', compact('users'));
    }

    public function storeUser(Request $request)
    {
        $data = $request->validate([
            'username' => 'required|string|max:50|unique:users',
            'password' => 'required|string|min:6',
            'role'     => 'required|in:kasir,manager',
        ]);
        User::create([
            'username' => $data['username'],
            'password' => Hash::make($data['password']),
            'role'     => $data['role'],
        ]);
        return response()->json(['success' => true]);
    }

    public function updateUser(Request $request, User $user)
    {
        $rules = [
            'username' => 'required|string|max:50|unique:users,username,' . $user->id,
            'password' => 'nullable|string|min:6',
        ];
        $data = $request->validate($rules);
        $update = ['username' => $data['username']];
        if (!empty($data['password'])) {
            $update['password'] = Hash::make($data['password']);
        }
        $user->update($update);
        return response()->json(['success' => true]);
    }

    public function destroyUser(User $user)
    {
        if ($user->role === 'manager') {
            return response()->json(['success' => false, 'message' => 'Tidak bisa hapus akun manager'], 403);
        }
        $user->delete();
        return response()->json(['success' => true]);
    }

    // ══════════════════════════════════════════
    //  TRANSAKSI (view only)
    // ══════════════════════════════════════════

    public function indexTransaksi()
    {
        $transaksis = Transaksi::with(['meja', 'user'])
            ->latest('tanggal')
            ->get();
        return view('manager.transaksi', compact('transaksis'));
    }

    // ══════════════════════════════════════════
    //  LAPORAN
    // ══════════════════════════════════════════

    public function indexLaporan()
    {
        $totalPendapatan = Transaksi::sum('total');
        $totalTransaksi  = Transaksi::count();
        $totalMenuAktif  = Menu::where('status', 'tersedia')->count();
        $totalMeja       = Meja::count();

        $laporanHarian = Transaksi::selectRaw('DATE(tanggal) as tanggal, COUNT(*) as jumlah_transaksi, SUM(total) as total_pendapatan')
            ->groupByRaw('DATE(tanggal)')
            ->orderByRaw('DATE(tanggal) DESC')
            ->take(30)
            ->get();

        return view('manager.laporan', compact(
            'totalPendapatan', 'totalTransaksi', 'totalMenuAktif', 'totalMeja',
            'laporanHarian'
        ));
    }

    public function detailLaporan(string $tanggal)
    {
        $date = Carbon::parse($tanggal)->startOfDay();

        $transaksis = Transaksi::with(['meja', 'user'])
            ->whereDate('tanggal', $date)
            ->orderBy('tanggal')
            ->get();

        $totalPendapatan = $transaksis->sum('total');
        $totalTransaksi  = $transaksis->count();

        $perMetode = $transaksis->groupBy('metode_pembayaran')
            ->map(fn($group) => [
                'jumlah' => $group->count(),
                'total'  => $group->sum('total'),
            ]);

        return view('manager.detail-laporan', compact(
            'transaksis', 'totalPendapatan', 'totalTransaksi', 'date', 'perMetode'
        ));
    }
}
