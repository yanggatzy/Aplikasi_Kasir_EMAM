<?php

namespace App\Http\Controllers;

use App\Models\Meja;
use Illuminate\Http\Request;

class MejaController extends Controller
{
    public function index()
    {
        return view('kasir.status-meja');
    }

    public function getAll()
    {
        $mejas = Meja::where('aktif', true)->get()->map(fn($m) => [
            'id'     => $m->id,
            'kode'   => $m->kode_meja,
            'nama'   => $m->nama_meja,
            'zone'   => $m->lokasi,
            'cap'    => $m->kapasitas,
            'status' => $m->status,
        ]);

        return response()->json($mejas);
    }

    public function updateStatus(Request $request, Meja $meja)
    {
        $validated = $request->validate([
            'status' => 'required|in:tersedia,terisi,kotor,dipesan',
        ]);

        $meja->update(['status' => $validated['status']]);

        return response()->json(['success' => true, 'status' => $meja->status]);
    }
}
