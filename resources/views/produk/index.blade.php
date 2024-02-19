@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <a href="{{ route('produk.create') }}" class="btn btn-primary btn-sm float-left mb-3">Tambah Data</a>

<table class="table table-stripped">
    <thead>
        <tr>
            <th>Gambar</th>
            <th>Nama Produk</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($produks as $produk)
        {{-- @dd($pelanggan) --}}
            <tr>
                <td><img src="{{url('')}}{{ Storage::url('Gambar-produk/' . $produk->Gambar) }}" alt ="{{ $produk->NamaProduk }}" width="50" height="50"></td>
                <td>{{ $produk->NamaProduk }}</td>
                <td>{{ $produk->Harga }}</td>
                <td>{{ $produk->Stok }}</td>
                <td>
                    <form action="{{ route('produk.destroy', $produk->ProdukID) }}" method="POST" class="d-inline">
                        <a href="{{ route('produk.edit', $produk->ProdukID) }}" class="btn btn-warning btn-sm text-light">Update</a>
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
