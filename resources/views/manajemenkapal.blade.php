@extends('include.app')
@section('title', 'Manajemen Kapal')

@section('content')
<div class="container">
    <h1>Manajemen Kapal</h1>
    <section class="section">
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Data Kapal</h5>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addShipModal">Tambah Kapal</button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table" id="table1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Kapal</th>
                                <th>Tipe Kapal</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($ships as $ship)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $ship->nama_kapal }}</td>
                                    <td>{{ $ship->tipe_kapal }}</td>
                                    <td>
                                        <!-- Tombol Edit -->
                                        <a href="#" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editShipModal{{ $ship->id }}">Edit</a>
                                        
                                        <!-- Tombol Hapus -->
                                        <form action="{{ route('delete.ship', $ship->id) }}" method="POST" style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus kapal ini?')">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- Modal Tambah Kapal -->
<div class="modal fade" id="addShipModal" tabindex="-1" aria-labelledby="addShipModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('store.ship') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="addShipModalLabel">Tambah Kapal</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama_kapal">Nama Kapal</label>
                        <input type="text" class="form-control" id="nama_kapal" name="nama_kapal" required>
                    </div>
                    <div class="form-group mt-3">
                        <label for="tipe_kapal">Tipe Kapal</label>
                        <input type="text" class="form-control" id="tipe_kapal" name="tipe_kapal" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Edit Kapal -->
@foreach ($ships as $ship)
<div class="modal fade" id="editShipModal{{ $ship->id }}" tabindex="-1" aria-labelledby="editShipModalLabel{{ $ship->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('update.ship', $ship->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title" id="editShipModalLabel{{ $ship->id }}">Edit Kapal</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="edit_nama_kapal">Nama Kapal</label>
                        <input type="text" class="form-control" id="edit_nama_kapal" name="nama_kapal" value="{{ $ship->nama_kapal }}" required>
                    </div>
                    <div class="form-group mt-3">
                        <label for="edit_tipe_kapal">Tipe Kapal</label>
                        <input type="text" class="form-control" id="edit_tipe_kapal" name="tipe_kapal" value="{{ $ship->tipe_kapal }}" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach

@endsection
