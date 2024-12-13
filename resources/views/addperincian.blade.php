@extends('include.app') {{-- Layout utama --}}
@section('title', 'Tambah Data Barang')

@section('content')
<div class="container mt-4">
    <h2 class="mb-3">Form Tambah Data Barang</h2>
    
    <!-- Form untuk Nama Merk, Kapal, Tujuan, dan Tanggal -->
    <form action="" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="nama_merk">Nama Merk</label>
                    <input type="text" class="form-control" id="nama_merk" name="nama_merk" required>
                </div>
                <div class="form-group mt-3">
                    <label for="kapal">Kapal</label>
                    <input type="text" class="form-control" id="kapal" name="kapal" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="tujuan">Tujuan</label>
                    <input type="text" class="form-control" id="tujuan" name="tujuan" required>
                </div>
                <div class="form-group mt-3">
                    <label for="tanggal">Tanggal</label>
                    <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                </div>
            </div>
        </div>

        <!-- Tombol untuk Menampilkan Tabel -->
        <button type="button" id="showTableButton" class="btn btn-success mt-4">
            Tambah Data Barang
        </button>
        

        <!-- Tabel Input Barang -->
        <div class="mt-4" id="tableContainer" style="display: none;">
            <table class="table table-bordered" id="itemTable">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>Tanggal</th>
                        <th>Colis</th>
                        <th>Jenis Barang</th>
                        <th>Pengirim</th>
                        <th>P</th>
                        <th>L</th>
                        <th>T</th>
                        <th>Total Barang</th>
                        <th>m3</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Row kosong pertama -->
                    <tr>
                        <td>1</td>
                        <td><input type="date" name="tanggal_barang[]" class="form-control" required></td>
                        <td><input type="text" name="colis[]" class="form-control"></td>
                        <td><input type="text" name="jenis_barang[]" class="form-control"></td>
                        <td><input type="text" name="pengirim[]" class="form-control"></td>
                        <td><input type="number" name="panjang[]" class="form-control" step="0.01"></td>
                        <td><input type="number" name="lebar[]" class="form-control" step="0.01"></td>
                        <td><input type="number" name="tinggi[]" class="form-control" step="0.01"></td>
                        <td><input type="number" name="total_barang[]" class="form-control"></td>
                        <td><input type="number" name="m3[]" class="form-control" step="0.01"></td>
                        <td>
                            <button type="button" class="btn btn-danger btn-sm removeRow">Hapus</button>
                        </td>
                    </tr>
                </tbody>
            </table>
            <button type="button" class="btn btn-primary" id="addRowButton">Tambah Baris</button>
        </div>

        <!-- Submit -->
        <button type="submit" class="btn btn-primary mt-4">Simpan Data</button>
    </form>
</div>

@endsection

<script>
document.addEventListener('DOMContentLoaded', function () {
    const showTableButton = document.getElementById('showTableButton');
    const tableContainer = document.getElementById('tableContainer');
    const addRowButton = document.getElementById('addRowButton');
    const tableBody = document.querySelector('#itemTable tbody');

    // Tampilkan tabel saat tombol ditekan
    if (showTableButton && tableContainer) {
        showTableButton.addEventListener('click', function () {
            tableContainer.style.display = 'block';
        });
    } else {
        console.error('Elemen showTableButton atau tableContainer tidak ditemukan');
    }

    // Tambahkan baris baru ke tabel
    if (addRowButton && tableBody) {
        addRowButton.addEventListener('click', function () {
            const rowCount = tableBody.rows.length;
            const newRow = `
                <tr>
                    <td>${rowCount + 1}</td>
                    <td><input type="date" name="tanggal_barang[]" class="form-control" required></td>
                    <td><input type="text" name="colis[]" class="form-control"></td>
                    <td><input type="text" name="jenis_barang[]" class="form-control"></td>
                    <td><input type="text" name="pengirim[]" class="form-control"></td>
                    <td><input type="number" name="panjang[]" class="form-control" step="0.01"></td>
                    <td><input type="number" name="lebar[]" class="form-control" step="0.01"></td>
                    <td><input type="number" name="tinggi[]" class="form-control" step="0.01"></td>
                    <td><input type="number" name="total_barang[]" class="form-control"></td>
                    <td><input type="number" name="m3[]" class="form-control" step="0.01"></td>
                    <td>
                        <button type="button" class="btn btn-danger btn-sm removeRow">Hapus</button>
                    </td>
                </tr>
            `;
            tableBody.insertAdjacentHTML('beforeend', newRow);
        });
    } else {
        console.error('Elemen addRowButton atau tableBody tidak ditemukan');
    }

    // Hapus baris dari tabel
    document.addEventListener('click', function (e) {
        if (e.target.classList.contains('removeRow')) {
            e.target.closest('tr').remove();
        }
    });
});

</script>

