<?php

namespace App\Http\Controllers;

use App\Models\DetailBarang;
use App\Models\Barang;
use App\Models\Ship;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function indexaddperincian(){
        $ships = Ship::all();
        return view('addperincian', compact('ships'));
    }

    public function indexPerincian(){
        $barangs = Barang::with(['details', 'ship'])->get();
        $detailBarangs = DetailBarang::all();
        return view('dashboard', compact('barangs','detailBarangs'));
    }

    public function add_barang(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama_merk' => 'required|string|max:255',
            'kapal' => 'required|string|max:255',
            'tujuan' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'tanggal_barang.*' => 'required|date',
            'colis.*' => 'required|string|max:255',
            'jenis_barang.*' => 'required|string|max:255',
            'pengirim.*' => 'required|string|max:255',
            'panjang.*' => 'required|numeric',
            'lebar.*' => 'required|numeric',
            'tinggi.*' => 'required|numeric',
            'total_barang.*' => 'required|integer',
            'm3.*' => 'required|numeric',
            'biaya_ekspedisi' => 'required|numeric',
            'biaya_lain' => 'nullable|numeric',
            'total_pembayaran' => 'required|numeric',
            'dp_pertama' => 'nullable|numeric',
            'sisa_pembayaran' => 'required|numeric',
        ]);

        // Insert data ke tabel barang
        $barang = Barang::create([
            'nama_merk' => $request->nama_merk,
            'kapal' => $request->kapal,
            'tujuan' => $request->tujuan,
            'tanggal' => $request->tanggal,
            'biaya_ekspedisi' => $request->biaya_ekspedisi,
            'biaya_lain' => $request->biaya_lain ?? 0,
            'total_pembayaran' => $request->total_pembayaran,
            'dp_pertama' => $request->dp_pertama ?? 0,
            'sisa_pembayaran' => $request->sisa_pembayaran,
            'terbilang' => $request->total_pembayaran,
        ]);

        // Loop untuk insert data barang_details
        if ($request->has('tanggal_barang')) {
            foreach ($request->tanggal_barang as $key => $tanggal_barang) {
                DetailBarang::create([
                    'barang_id' => $barang->id,
                    'tanggal_barang' => $tanggal_barang,
                    'colis' => $request->colis[$key],
                    'jenis_barang' => $request->jenis_barang[$key],
                    'pengirim' => $request->pengirim[$key],
                    'panjang' => $request->panjang[$key],
                    'lebar' => $request->lebar[$key],
                    'tinggi' => $request->tinggi[$key],
                    'total_barang' => $request->total_barang[$key],
                    'm3' => $request->m3[$key],
                ]);
            }
        }

        // Redirect dengan pesan sukses
        return redirect()->back()->with('success', 'Data barang berhasil disimpan.');
    }
}
