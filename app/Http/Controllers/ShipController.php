<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ship;
class ShipController extends Controller
{
    public function index()
    {
        $ships = Ship::all();
        return view('manajemenkapal', compact('ships'));
    }

    // Menyimpan data kapal baru
    public function storeShip(Request $request)
    {
        $request->validate([
            'nama_kapal' => 'required|string|max:255',
            'tipe_kapal' => 'required|string|max:255',
        ]);

        Ship::create($request->all());

        return redirect()->back()->with('success', 'Data kapal berhasil ditambahkan!');
    }

    // Mengupdate data kapal
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kapal' => 'required|string|max:255',
            'tipe_kapal' => 'required|string|max:255',
        ]);

        $ship = Ship::find($id);
        $ship->update($request->all());

        return redirect()->back()->with('success', 'Data kapal berhasil diperbarui!');
    }

    // Menghapus data kapal
    public function destroy($id)
    {
        $ship = Ship::find($id);
        $ship->delete();

        return redirect()->back()->with('success', 'Data kapal berhasil dihapus!');
    }
}
