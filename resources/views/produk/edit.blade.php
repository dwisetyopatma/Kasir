@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="col-md-6 mx-auto">
        <h2 class="mb-3">Update Produk</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Error:</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('produk.update', $produk->ProdukID) }}" enctype="multipart/form-data" method="POST" class="border rounded p-3">
            @csrf
            @method('PUT') <!-- Use the PUT method for updates -->

            <div class="mb-2">
                <label for="Gambar" class="form-label">Gambar:</label>
                <input type="file" class="form-control form-control-sm" name="Gambar">
            </div>

            <div class="mb-2">
                <label for="NamaProduk" class="form-label">Nama Produk:</label>
                <input type="text" class="form-control form-control-sm" name="NamaProduk" value="{{ $produk->NamaProduk }}" required>
            </div>

            <div class="mb-2">
                <label for="Harga" class="form-label">Harga:</label>
                <input type="text" class="form-control form-control-sm" name="Harga" value="{{ $produk->Harga }}" required>
            </div>

            <div class="mb-2">
                <label for="Stok" class="form-label">Stok:</label>
                <input type="text" class="form-control form-control-sm" name="Stok" value="{{ $produk->Stok }}" required>
            </div>

            <button type="submit" class="btn btn-warning btn-sm bg-warning text-light">Update</button>
            {{-- <button type="submit" class="btn btn-primary">Submit</button> --}}
        </form>
    </div>
</div>
@endsection
