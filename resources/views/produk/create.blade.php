<!-- resources/views/penjualan/create.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="col-md-6 mx-auto">
        <h2 class="mb-3">Tambah Produk</h2>

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

        <form action="{{ route('produk.store') }}" method="POST" class="border rounded p-3 bg-light text-dark">
            @csrf

            <div class="mb-2">
                <label for="NamaProduk" class="form-label">Nama Produk:</label>
                <input type="text" class="form-control" name="NamaProduk" required>
            </div>

            <div class="mb-2">
                <label for="Harga" class="form-label">Harga:</label>
                <input type="number" class="form-control" name="Harga" required>
            </div>

            <div class="mb-2">
                <label for="Stok" class="form-label">Stok:</label>
                <input type="number" class="form-control" name="Stok" required>
            </div>

            <!-- Add other necessary form fields -->

            <button type="submit" class="btn btn-primary btn-sm bg-primary text-light">Tambah</button>
        </form>
        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="file" name="image">
            <!-- Form fields for other product details -->
            <button type="submit">Submit</button>
        </form>
    </div>
</div>
@endsection
