@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <a href="{{ route('penjualan.create') }}" class="btn btn-primary btn-sm float-left mb-3">Tambah Data</a>

<table class="table table-stripped">
    <thead>
        <tr>
            <th>Kode Transaksi</th>
            <th>Pelanggan</th>
            <th>Tanggal Penjualan</th>
            <th>Total Harga</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($penjualans as $penjualan)
        {{-- @dd($pelanggan) --}}
            <tr>
                <td>{{$penjualan->PenjualanID}}</td>
                <td>{{$penjualan->Pelanggan->NamaPelanggan}}</td>
                <td>{{ $penjualan->TanggalPenjualan }}</td>
                <td>{{ $penjualan->subtotal }}</td>
                <td>
                    <form action="{{ route('penjualan.destroy', $penjualan->PenjualanID) }}" method="POST" class="d-inline">
                        <a href="{{ route('penjualan.edit', $penjualan->PenjualanID) }}" class="btn btn-warning btn-sm text-light">Update</a>
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
