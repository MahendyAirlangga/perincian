@extends('include.app') {{-- Layout utama --}}
@section('title', 'Tambah Data Barang')

@section('content')
<div class="container mt-4">
    <h2 class="mb-3">Form Tambah Data Barang</h2>
    
    <!-- Form untuk Nama Merk, Kapal, Tujuan, dan Tanggal -->
    <form action="{{ route('add.barang') }}" method="post" id="barangForm">
        @csrf
        <!-- Bagian Informasi Utama -->
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="nama_merk">Nama Merk</label>
                    <input type="text" class="form-control" id="nama_merk" name="nama_merk" placeholder="Masukkan nama merk" required>
                </div>
                <div class="form-group mt-3">
                    <label for="kapal">Kapal</label>
                    <input type="text" class="form-control" id="kapal" name="kapal" placeholder="Masukkan nama kapal" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="tujuan">Tujuan</label>
                    <input type="text" class="form-control" id="tujuan" name="tujuan" placeholder="Masukkan tujuan pengiriman" required>
                </div>
                <div class="form-group mt-3">
                    <label for="tanggal">Tanggal</label>
                    <input type="date" class="form-control" id="tanggal" name="tanggal" placeholder="Pilih tanggal pengiriman" required>
                </div>
            </div>
        </div>
    
        <!-- Tabel Input Barang -->
        <div class="mt-4">
            <table class="table table-bordered" id="barangTable">
                <thead>
                    <tr>
                        <th>Tanggal Barang</th>
                        <th>Colis</th>
                        <th>Jenis Barang</th>
                        <th>Pengirim</th>
                        <th>Panjang</th>
                        <th>Lebar</th>
                        <th>Tinggi</th>
                        <th>Total Barang</th>
                        <th>m3</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><input type="date" class="form-control" name="tanggal_barang[]" placeholder="Pilih tanggal"></td>
                        <td><input type="text" class="form-control" name="colis[]" placeholder="colis"></td>
                        <td><input type="text" class="form-control" name="jenis_barang[]" placeholder="Jenis Barang"></td>
                        <td><input type="text" class="form-control" name="pengirim[]" placeholder="pengirim"></td>
                        <td><input type="number" class="form-control" name="panjang[]" step="0.01" placeholder="(m)"></td>
                        <td><input type="number" class="form-control" name="lebar[]" step="0.01" placeholder="(m)"></td>
                        <td><input type="number" class="form-control" name="tinggi[]" step="0.01" placeholder="(m)"></td>
                        <td><input type="number" class="form-control" name="total_barang[]" placeholder="total barang"></td>
                        <td><input type="number" class="form-control" name="m3[]" step="0.01" placeholder="(m3)"></td>
                        <td>
                            <button type="button" class="btn btn-danger btn-sm removeRow">Hapus</button>
                        </td>
                    </tr>
                </tbody>
            </table>
            <button type="button" class="btn btn-primary" id="addRowButton">Tambah Baris</button>
        </div>
    
        <!-- Perincian Pembayaran -->
        <div class="mt-4">
            <div class="form-group">
                <label for="biaya_ekspedisi">Biaya Ekspedisi</label>
                <input type="number" class="form-control" id="biaya_ekspedisi" name="biaya_ekspedisi" step="0.01" placeholder="Masukkan biaya ekspedisi" required>
            </div>
            <div class="form-group mt-3">
                <label for="biaya_lain">Biaya Lain-Lain</label>
                <input type="number" class="form-control" id="biaya_lain" name="biaya_lain" step="0.01" placeholder="Masukkan biaya lain-lain (jika ada)">
            </div>
            <div class="form-group mt-3">
                <label for="total_pembayaran">Total Pembayaran</label>
                <input type="number" class="form-control" id="total_pembayaran" name="total_pembayaran" step="0.01" placeholder="Masukkan total pembayaran" required>
            </div>
            <div class="form-group mt-3">
                <label for="dp_pertama">DP Pertama</label>
                <input type="number" class="form-control" id="dp_pertama" name="dp_pertama" step="0.01" placeholder="Masukkan DP pertama (jika ada)">
            </div>
            <div class="form-group mt-3">
                <label for="sisa_pembayaran">Sisa Pembayaran</label>
                <input type="number" class="form-control" id="sisa_pembayaran" name="sisa_pembayaran" step="0.01" placeholder="Masukkan sisa pembayaran" required>
            </div>
        </div>
    
        <!-- Tombol Simpan -->
        <div class="d-flex justify-content-end mt-3">
            <button type="submit" class="btn btn-success">Simpan</button>
        </div>
    </form>
    
</div>

@endsection

<script>
document.addEventListener('DOMContentLoaded', function () {
    const addRowButton = document.getElementById('addRowButton');
    const barangTableBody = document.querySelector('#barangTable tbody');

    // Tambahkan baris baru
    addRowButton.addEventListener('click', function () {
        const newRow = `
            <tr>
                <td><input type="date" class="form-control" name="tanggal_barang[]" placeholder="Pilih tanggal"></td>
                <td><input type="text" class="form-control" name="colis[]" placeholder="colis"></td>
                <td><input type="text" class="form-control" name="jenis_barang[]" placeholder="Jenis Barang"></td>
                <td><input type="text" class="form-control" name="pengirim[]" placeholder="pengirim"></td>
                <td><input type="number" class="form-control" name="panjang[]" step="0.01" placeholder="(m)"></td>
                <td><input type="number" class="form-control" name="lebar[]" step="0.01" placeholder="(m)"></td>
                <td><input type="number" class="form-control" name="tinggi[]" step="0.01" placeholder="(m)"></td>
                <td><input type="number" class="form-control" name="total_barang[]" placeholder="total barang"></td>
                <td><input type="number" class="form-control" name="m3[]" step="0.01" placeholder="(m3)"></td>
                <td>
                    <button type="button" class="btn btn-danger btn-sm removeRow">Hapus</button>
                </td>
            </tr>`;
        barangTableBody.insertAdjacentHTML('beforeend', newRow);
    });

    // Hapus baris
    document.addEventListener('click', function (e) {
        if (e.target.classList.contains('removeRow')) {
            e.target.closest('tr').remove();
        }
    });
});
</script>


