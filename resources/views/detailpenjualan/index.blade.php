@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <a href="{{ route('detailpenjualan.create') }}" class="btn btn-primary btn-sm float-left mb-3">Tambah Data</a>

<table class="table table-stripped">
    <thead>
        <tr>
            <th>Kode Transaksi</th>
            <th>Nama Produk</th>
            <th>Jumlah Produk</th>
            <th>Subtotal</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($detailPenjualans as $detailpenjualan)
        {{-- @dd($detailpenjualan) --}}
            <tr>
                {{-- <td>{{ $detailpenjualan->DetailID }}</td> --}}
                <td>{{ $detailpenjualan->PenjualanID }}</td>
                {{-- <td>{{ $detailpenjualan->Produk->NamaProduk }}</td> --}}
                <td>{{ $detailpenjualan->Produk->NamaProduk ?? 'produk telah dihapus' }}</td>
                <td>{{ $detailpenjualan->JumlahProduk }}</td>
                <td>{{ $detailpenjualan->Subtotal }}</td>
                <td>
                    {{-- @dd($detailpenjualan->DetailID) --}}
                    <a href="{{ route('detailpenjualan.edit', ['detailpenjualan' => $detailpenjualan->DetailID]) }}" class="btn btn-warning btn-sm text-light">Update</a>

                    {{-- <button type="button" class="btn btn-danger text-danger">Hapus</button> --}}
                    <form action="{{ route('detailpenjualan.destroy', [ 'detailpenjualan' => $detailpenjualan->DetailID]) }}" method="POST" class="d-inline">
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
