<!-- resources/views/penjualan/create.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="col-md-6 mx-auto">
        <h2 class="mb-3">Tambah Penjualan</h2>

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

        <form action="{{ route('penjualan.store') }}" method="POST" class="border rounded p-3 bg-light text-dark">
            @csrf
            <div class="mb-2">
                <label for="PelangganID" class="form-label">Pelanggan :</label>
                {{-- <input type="number" class="form-control" name="PelangganID" required> --}}
                <select class="form-select" name="PelangganID" id="PelangganID" required>
                    <option value="">Pilih Pelanggan</option>
                    @foreach ($pelanggan as $p)
                        <option value="{{$p->PelangganID}}">{{$p->NamaPelanggan}}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-2">
                <label for="TanggalPenjualan" class="form-label">Tanggal Penjualan:</label>
                <input type="date" class="form-control" name="TanggalPenjualan" required>
            </div>

            <div class="mb-2">
                <label for="TotalHarga" class="form-label">Total Harga:</label>
                <input type="number" class="form-control" name="TotalHarga" required>
            </div>



            <!-- Add other necessary form fields -->

            <button type="submit" class="btn btn-primary btn-sm bg-primary text-light">Tambah</button>
        </form>
    </div>
</div>
@endsection
