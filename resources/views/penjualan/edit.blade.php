@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="col-md-6 mx-auto">
        <h2 class="mb-3">Update Penjualan</h2>

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

        <form action="{{ route('penjualan.update', $penjualan->PenjualanID) }}" method="POST" class="border rounded p-3">
            @csrf
            @method('PUT') <!-- Use the PUT method for updates -->

            <div class="mb-2">
                <label for="PelangganID" class="form-label">Pelanggan :</label>
                {{-- <input type="number" class="form-control" name="PelangganID" required> --}}
                <select class="form-select" name="PelangganID" id="PelangganID" required>
                    <option value="">Pilih Pelanggan</option>
                    @foreach ($pelanggan as $p)
                        @if($p->PelangganID == $penjualan->PelangganID)
                            <option value="{{$p->PelangganID}}" selected>{{$p->NamaPelanggan}}</option>
                        @else
                            <option value="{{$p->PelangganID}}">{{$p->NamaPelanggan}}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            <div class="mb-2">
                <label for="TanggalPenjualan" class="form-label">Tanggal Penjualan:</label>
                <input type="date" class="form-control form-control-sm" name="TanggalPenjualan" value="{{ $penjualan->TanggalPenjualan }}" required>
            </div>

            <div class="mb-2">
                <label for="TotalHarga" class="form-label">Total Harga:</label>
                <input type="text" class="form-control form-control-sm" name="TotalHarga" value="{{ $penjualan->TotalHarga }}" required>
            </div>

            <button type="submit" class="btn btn-warning btn-sm bg-warning text-light">Update</button>
        </form>

    </div>
</div>
@endsection
