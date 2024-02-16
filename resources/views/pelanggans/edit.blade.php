@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="col-md-6 mx-auto">
        <h2 class="mb-3">Update Pelanggan</h2>

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

        <form action="{{ route('pelanggan.update', $pelanggan->PelangganID) }}" method="POST" class="border rounded p-3">
            @csrf
            @method('PUT') <!-- Use the PUT method for updates -->

            <div class="mb-2">
                <label for="NamaPelanggan" class="form-label">Nama Pelanggan:</label>
                <input type="text" class="form-control form-control-sm" name="NamaPelanggan" value="{{ $pelanggan->NamaPelanggan }}" required>
            </div>

            <div class="mb-2">
                <label for="Alamat" class="form-label">Alamat:</label>
                <input type="text" class="form-control form-control-sm" name="Alamat" value="{{ $pelanggan->Alamat }}" required>
            </div>

            <div class="mb-2">
                <label for="NomorTelepon" class="form-label">Nomor Telepon:</label>
                <input type="tel" class="form-control form-control-sm" name="NomorTelepon" value="{{ $pelanggan->NomorTelepon }}" required>
            </div>

            <button type="submit" class="btn btn-warning btn-sm bg-warning text-light">Update</button>
        </form>

    </div>
</div>
@endsection
