@extends('include.app')
@section('title', 'Dashboard')

@section('content')
<div class="container">
    <h1>Dashboard</h1>
    <p>Selamat datang di aplikasi Laravel dengan Mazer template!</p>

    <section class="section">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Data Perincian Barang dan Kubikasi</h5>
            </div>
            <div class="card-body">
                <!-- Tabel Barang -->
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Nama Merk</th>
                                <th>Kapal</th>
                                <th>Tujuan</th>
                                <th>Tanggal</th>
                                <th>Total Pembayaran</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($barangs as $barang)
                                <tr>
                                    <td>{{ $barang->nama_merk }}</td>
                                    <td>{{ $barang->kapal }}</td>
                                    <td>{{ $barang->tujuan }}</td>
                                    <td>{{ $barang->tanggal }}</td>
                                    <td>{{ number_format($barang->total_pembayaran, 2, ',', '.') }}</td>
                                    <td>
                                        <span class="badge {{ $barang->sisa_pembayaran > 0 ? 'bg-danger' : 'bg-success' }}">
                                            {{ $barang->sisa_pembayaran > 0 ? 'Belum Lunas' : 'Lunas' }}
                                        </span>
                                    </td>
                                    <td>
                                        <!-- Tombol untuk membuka modal -->
                                        <button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#detailModal{{ $barang->id }}">Lihat Detail</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Modal untuk Detail Barang -->
                @foreach($barangs as $barang)
                    <div class="modal fade" id="detailModal{{ $barang->id }}" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="detailModalLabel">Detail Barang: {{ $barang->nama_merk }}</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <!-- Menampilkan informasi dari Barang -->
                                    <p><strong>Nama Merk:</strong> {{ $barang->nama_merk }}</p>
                                    <p><strong>Kapal:</strong> {{ $barang->kapal }}</p>
                                    <p><strong>Tujuan:</strong> {{ $barang->tujuan }}</p>
                                    <p><strong>Tanggal:</strong> {{ $barang->tanggal }}</p>
                                    <p><strong>Total Pembayaran: </strong>{{ number_format($barang->total_pembayaran, 2, ',', '.') }}</p>
                                    <p><strong>Status:</strong>
                                        <span class="badge {{ $barang->sisa_pembayaran > 0 ? 'bg-danger' : 'bg-success' }}">
                                            {{ $barang->sisa_pembayaran > 0 ? 'Belum Lunas' : 'Lunas' }}
                                        </span>
                                    </p>
                                    <hr>

                                    <!-- Menampilkan Detail Barang terkait -->
                                    <h6>Detail Barang:</h6>
                                    <table class="table">
                                        <thead>
                                            <tr class="text-center">
                                                <th>Tanggal Barang</th>
                                                <th>Colis</th>
                                                <th>Jenis Barang</th>
                                                <th>Pengirim</th>
                                                <th>Ukuran (m³)</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($barang->details as $detail) <!-- Relasi barang->detailBarangs -->
                                                <tr class="text-center">
                                                    <td>{{ $detail->tanggal_barang }}</td>
                                                    <td>{{ $detail->colis }}</td>
                                                    <td>{{ $detail->jenis_barang }}</td>
                                                    <td>{{ $detail->pengirim }}</td>
                                                    <td>{{ number_format($detail->m3, 2) }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
</div>

@endsection
