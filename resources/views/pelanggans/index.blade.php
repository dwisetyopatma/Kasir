{{-- resources/views/bukus/index.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <a href="{{ route('pelanggan.create') }}" class="btn btn-primary btn-sm float-left mb-3">Tambah Data</a>

<table class="table table-stripped">
    <thead>
        <tr>
            <th>Nama Pelanggan</th>
            <th>Alamat</th>
            <th>Nomor Telepon</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($pelanggans as $pelanggan)
            <tr>
                <td>{{ $pelanggan->NamaPelanggan }}</td>
                <td>{{ $pelanggan->Alamat }}</td>
                <td>{{ $pelanggan->NomorTelepon }}</td>
                <td>
                    <a href="{{ route('pelanggan.edit', ['pelanggan' => $pelanggan->PelangganID]) }}" class="btn btn-warning btn-sm text-light">Update</a>
                    <form action="{{ route('pelanggan.destroy', [ 'id' => $pelanggan->PelangganID]) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm bg-danger text-light" onclick="return confirm('Are you sure you want to delete this item?')">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach


    </tbody>
</table>
</div>

@endsection
