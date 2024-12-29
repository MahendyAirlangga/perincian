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

    public function storeShip(Request $request)
    {
        $request->validate([
            'nama_kapal' => 'required|string|max:255',
            'tipe_kapal' => 'required|string|max:255',
        ]);

        Ship::create($request->all());

        return redirect()->back()->with('success', 'Data kapal berhasil ditambahkan!');
    }
}
