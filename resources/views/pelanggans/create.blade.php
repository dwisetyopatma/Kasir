@extends('layouts.app')

@section('content')



@if ($errors->any())
    <div>
        <strong>Error:</strong>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('pelanggan.store') }}" method="POST">
    @csrf
{{--
    <label for="PelangganID">PelangganID:</label>
    <input type="text" name="PelangganID" required>
    <br> --}}

    <div class="container mt-5">
        <div class="col-md-6 mx-auto"> <!-- Center the form -->
            <h2 class="mb-3">Tambah Pelanggan</h2>

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

            <form action="{{ route('pelanggan.store') }}" method="POST" class="border rounded p-3 bg-dark text-dark">
                @csrf

                <div class="mb-2">
                    <label for="NamaPelanggan" class="form-label">Nama Pelanggan:</label>
                    <input type="text" class="form-control form-control-sm" name="NamaPelanggan" required>
                </div>

                <div class="mb-2">
                    <label for="Alamat" class="form-label">Alamat:</label>
                    <input type="text" class="form-control form-control-sm" name="Alamat" required>
                </div>

                <div class="mb-2">
                    <label for="NomorTelepon" class="form-label">Nomor Telepon:</label>
                    <input type="tel" class="form-control form-control-sm" name="NomorTelepon" required>
                </div>

                <button type="submit" class="btn btn-primary btn-sm bg-primary text-light">Simpan</button>
            </form>
        </div>
    </div>

</form>
@endsection
