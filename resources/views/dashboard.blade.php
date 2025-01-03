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
                    <table class="table" id="table1">
                        <thead>
                            <tr>
                                <th>Nama Merk</th>
                                <th>Kapal</th>
                                <th>Tujuan</th>
                                <th>Tanggal</th>
                                {{-- <th>Total Pembayaran</th> --}}
                                <th>Sisa Pembayaran</th>
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
                                    {{-- <td>{{ number_format($barang->total_pembayaran, 2, ',', '.') }}</td> --}}
                                    <td>{{ number_format($barang->sisa_pembayaran, 2, ',', '.') }}</td>
                                    <td>
                                        <span class="badge {{ $barang->sisa_pembayaran > 0 ? 'bg-danger' : 'bg-success' }}">
                                            {{ $barang->sisa_pembayaran > 0 ? 'Belum Lunas' : 'Lunas' }}
                                        </span>
                                    </td>
                                    <td>
                                        <!-- Tombol untuk membuka modal -->
                                        <button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#detailModal{{ $barang->id }}">Lihat Detail</button>
                                        <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal{{ $barang->id }}">Edit</button>
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
                            <!-- Modal Header -->
                            <div class="modal-header bg-primary text-white">
                                <h5 class="modal-title text-white" id="detailModalLabel">
                                    Detail Barang: {{ $barang->nama_merk }}
                                </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
            
                            <!-- Modal Body -->
                            <div class="modal-body">
                                <!-- Informasi Barang -->
                                <div class="mb-3">
                                    <h6 class="text-primary">Informasi Barang</h6>
                                    <ul class="list-group">
                                        <li class="list-group-item">
                                            <strong>Nama Merk:</strong> {{ $barang->nama_merk }}
                                        </li>
                                        <li class="list-group-item">
                                            <strong>Kapal:</strong> {{ $barang->kapal }}
                                        </li>
                                        <li class="list-group-item">
                                            <strong>Tujuan:</strong> {{ $barang->tujuan }}
                                        </li>
                                        <li class="list-group-item">
                                            <strong>Tanggal:</strong> {{ $barang->tanggal }}
                                        </li>
                                        <li class="list-group-item">
                                            <strong>Total Pembayaran:</strong> Rp{{ number_format($barang->total_pembayaran, 2, ',', '.') }}
                                        </li>
                                        <li class="list-group-item">
                                            <strong>Uang Muka:</strong> Rp{{ number_format($barang->dp_pertama, 2, ',', '.') }}
                                        </li>
                                        <li class="list-group-item">
                                            <strong>Biaya Lain-Lain:</strong> Rp{{ number_format($barang->biaya_lain, 2, ',', '.') }}
                                        </li>
                                        <li class="list-group-item">
                                            <strong>Sisa Pembayaran:</strong> Rp{{ number_format($barang->sisa_pembayaran, 2, ',', '.') }}
                                        </li>
                                        <li class="list-group-item">
                                            <strong>Status:</strong>
                                            <span class="badge {{ $barang->sisa_pembayaran > 0 ? 'bg-danger' : 'bg-success' }}">
                                                {{ $barang->sisa_pembayaran > 0 ? 'Belum Lunas' : 'Lunas' }}
                                            </span>
                                        </li>
                                    </ul>
                                </div>
            
                                <!-- Detail Barang Terkait -->
                                <div class="mt-4">
                                    <h6 class="text-primary">Detail Barang</h6>
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped">
                                            <thead class="table-primary text-center">
                                                <tr>
                                                    <th>Tanggal Barang</th>
                                                    <th>Colis</th>
                                                    <th>Jenis Barang</th>
                                                    <th>Pengirim</th>
                                                    <th>Ukuran (m³)</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($barang->details as $detail)
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
                                </div>
                            </div>
            
                            <!-- Modal Footer -->
                            <div class="modal-footer">
                                <a href="{{ route('download.pdf', $barang->id) }}" class="btn btn-success">
                                    <i class="bi bi-download"></i> Download PDF
                                </a>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                    <i class="bi bi-x-circle"></i> Close
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            @foreach($barangs as $barang)
                <div class="modal fade" id="editModal{{ $barang->id }}" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form action="{{ route('update.payment', $barang->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="modal-header bg-warning text-white">
                                    <h5 class="modal-title" id="editModalLabel">Edit Sisa Pembayaran: {{ $barang->nama_merk }}</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="sisa_pembayaran">Sisa Pembayaran</label>
                                        <input type="number" step="0.01" class="form-control" id="sisa_pembayaran" name="sisa_pembayaran" value="{{ $barang->sisa_pembayaran }}" required>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                    <button type="submit" class="btn btn-warning">Simpan Perubahan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
</div>

@endsection
