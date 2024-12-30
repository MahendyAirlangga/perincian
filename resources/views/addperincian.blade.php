@extends('include.app') {{-- Layout utama --}}
@section('title', 'Tambah Data Barang')

@section('content')
<div class="container mt-4">
    <h2 class="mb-3">Form Tambah Data Barang</h2>
    @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
    @endif
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
                    <select name="kapal" id="kapal" class="form-control" required style="max-height: 150px; overflow-y: auto;">
                        <option value="">Pilih Kapal</option>
                        @foreach($ships as $ship)
                            <option value="{{ $ship->nama_kapal }}">{{ $ship->nama_kapal }}</option>
                        @endforeach
                    </select>
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
                        <th>m&sup3;</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><input type="date" class="form-control" name="tanggal_barang[]" placeholder="Pilih tanggal" required></td>
                        <td><input type="text" class="form-control" name="colis[]" placeholder="colis" required></td>
                        <td><input type="text" class="form-control" name="jenis_barang[]" placeholder="Jenis Barang" required></td>
                        <td><input type="text" class="form-control" name="pengirim[]" placeholder="pengirim" required></td>
                        <td><input type="number" class="form-control panjang" name="panjang[]" step="0.01" placeholder="(m)" required></td>
                        <td><input type="number" class="form-control lebar" name="lebar[]" step="0.01" placeholder="(m)" required></td>
                        <td><input type="number" class="form-control tinggi" name="tinggi[]" step="0.01" placeholder="(m)" required></td>
                        <td><input type="number" class="form-control" name="total_barang[]" placeholder="total barang" required></td>
                        <td><input type="number" class="form-control m3" name="m3[]" step="0.01" placeholder="(m&sup3;)" readonly></td>
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
                <input type="text" class="form-control" id="biaya_ekspedisi_display" placeholder="Biaya ekspedisi otomatis" readonly>
                <input type="hidden" id="biaya_ekspedisi" name="biaya_ekspedisi">
            </div>
            <div class="form-group mt-3">
                <label for="biaya_lain">Biaya Lain-Lain</label>
                <input type="text" class="form-control" id="biaya_lain_display" placeholder="Masukkan biaya lain-lain (jika ada)" >
                <input type="hidden" id="biaya_lain" name="biaya_lain">
            </div>
            <div class="form-group mt-3">
                <label for="total_pembayaran">Total Pembayaran</label>
                <input type="text" class="form-control" id="total_pembayaran_display" placeholder="Total pembayaran otomatis" readonly>
                <input type="hidden" id="total_pembayaran" name="total_pembayaran">
            </div>
            <div class="form-group mt-3">
                <label for="dp_pertama">DP Pertama</label>
                <input type="text" class="form-control" id="dp_pertama_display" placeholder="Masukkan DP pertama" required>
                <input type="hidden" id="dp_pertama" name="dp_pertama">
            </div>
            <div class="form-group mt-3">
                <label for="sisa_pembayaran">Sisa Pembayaran</label>
                <input type="text" class="form-control" id="sisa_pembayaran_display" placeholder="Sisa pembayaran otomatis" readonly>
                <input type="hidden" id="sisa_pembayaran" name="sisa_pembayaran">
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
                <td><input type="number" class="form-control panjang" name="panjang[]" step="0.01" placeholder="(m)"></td>
                <td><input type="number" class="form-control lebar" name="lebar[]" step="0.01" placeholder="(m)"></td>
                <td><input type="number" class="form-control tinggi" name="tinggi[]" step="0.01" placeholder="(m)"></td>
                <td><input type="number" class="form-control" name="total_barang[]" placeholder="total barang"></td>
                <td><input type="number" class="form-control m3" name="m3[]" step="0.01" placeholder="(m3)" readonly></td>
                <td>
                    <button type="button" class="btn btn-danger btn-sm removeRow">Hapus</button>
                </td>
            </tr>`;
        barangTableBody.insertAdjacentHTML('beforeend', newRow);
        updateCalculations(); // Perbarui perhitungan setelah baris ditambahkan
    });

    // Hapus baris
    document.addEventListener('click', function (e) {
        if (e.target.classList.contains('removeRow')) {
            e.target.closest('tr').remove();
            updateCalculations(); // Perbarui perhitungan setelah baris dihapus
        }
    });

    // Format dan validasi input saat mengetik
    document.addEventListener('input', function (e) {
        if (e.target.id === 'biaya_lain_display' || e.target.id === 'dp_pertama_display') {
            // Hapus karakter non-angka
            const rawValue = e.target.value.replace(/[^\d]/g, '');
            const formattedValue = formatCurrency(parseFloat(rawValue) || 0);
            e.target.value = formattedValue;

            // Simpan nilai asli ke input hidden
            if (e.target.id === 'biaya_lain_display') {
                document.getElementById('biaya_lain').value = rawValue;
            }
            if (e.target.id === 'dp_pertama_display') {
                document.getElementById('dp_pertama').value = rawValue;
            }
            updateCalculations(); // Update total dan sisa pembayaran
        } else if (
            e.target.classList.contains('panjang') ||
            e.target.classList.contains('lebar') ||
            e.target.classList.contains('tinggi')
        ) {
            updateCalculations();
        }
    });
});

// Fungsi untuk format angka ke format currency IDR
function formatCurrency(number) {
    return number.toLocaleString('id-ID', { minimumFractionDigits: 0 });
}

// Fungsi untuk menghitung total pembayaran dan biaya ekspedisi
function updateCalculations() {
    const rows = document.querySelectorAll('#barangTable tbody tr');
    let totalM3 = 0;

    rows.forEach(row => {
        const panjang = parseFloat(row.querySelector('.panjang').value) || 0;
        const lebar = parseFloat(row.querySelector('.lebar').value) || 0;
        const tinggi = parseFloat(row.querySelector('.tinggi').value) || 0;

        // Hitung m3 per baris
        const m3 = panjang * lebar * tinggi;
        row.querySelector('.m3').value = m3.toFixed(2);
        totalM3 += m3; // Akumulasi total m3
    });

    const biayaEkspedisi = totalM3 * 750000;
    document.getElementById('biaya_ekspedisi_display').value = formatCurrency(biayaEkspedisi);
    document.getElementById('biaya_ekspedisi').value = biayaEkspedisi;

    hitungTotalPembayaran(); // Update total pembayaran
    hitungSisaPembayaran(); // Update sisa pembayaran
}

// Fungsi untuk menghitung total pembayaran
function hitungTotalPembayaran() {
    const biayaEkspedisi = parseFloat(document.getElementById('biaya_ekspedisi').value) || 0;
    const biayaLain = parseFloat(document.getElementById('biaya_lain').value) || 0;
    const totalPembayaran = biayaEkspedisi + biayaLain;

    document.getElementById('total_pembayaran_display').value = formatCurrency(totalPembayaran);
    document.getElementById('total_pembayaran').value = totalPembayaran;
}

// Fungsi untuk menghitung sisa pembayaran
function hitungSisaPembayaran() {
    const totalPembayaran = parseFloat(document.getElementById('total_pembayaran').value) || 0;
    const dpPertama = parseFloat(document.getElementById('dp_pertama').value) || 0;
    const sisaPembayaran = totalPembayaran - dpPertama;

    document.getElementById('sisa_pembayaran_display').value = formatCurrency(sisaPembayaran);
    document.getElementById('sisa_pembayaran').value = sisaPembayaran;
}


</script>


