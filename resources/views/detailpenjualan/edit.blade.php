@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="col-md-6 mx-auto">
        <h2 class="mb-3">Update Detail Penjualan</h2>

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

        <form action="{{ route('detailpenjualan.update', $detailPenjualan->DetailID) }}" method="POST" class="border rounded p-3">
            @csrf
            @method('PUT') <!-- Use the PUT method for updates -->

            {{-- <div class="mb-2">
                <label for="PenjualanID" class="form-label">Penjualan ID:</label>
                <input type="text" class="form-control form-control-sm" name="PenjualanID" value="{{ old('PenjualanID') }}" required>
            </div> --}}
            <div class="mb-2">
                <label for="PenjualanID" class="form-label">Kode Transaksi :</label>
                {{-- <input type="number" class="form-control" name="PenjualanID" required> --}}
                {{-- @dd($penjualan); --}}
                <select class="form-select" name="PenjualanID" id="PenjualanID" required>
                    <option value="">Pilih Kode Transaksi</option>
                    @foreach ($penjualan as $p)
                        @if($p->PenjualanID == $detailPenjualan->PenjualanID)
                            <option value="{{$p->PenjualanID}}" selected>{{$p->PenjualanID}}</option>
                        @else
                            <option value="{{$p->PenjualanID}}">{{$p->PenjualanID}}</option>
                        @endif
                    @endforeach
                </select>
            </div>


            <div class="mb-2">
                <label for="ProdukID" class="form-label">Produk :</label>
                {{-- <input type="number" class="form-control" name="ProdukID" required> --}}
                <select class="form-select" name="ProdukID" id="ProdukID" required>
                    <option value="">Pilih Produk</option>
                    @foreach ($produk as $p)
                        @if($p->ProdukID == $detailPenjualan->ProdukID)
                            <option value="{{$p->ProdukID}}" selected>{{$p->NamaProduk}}</option>
                        @else
                            <option value="{{$p->ProdukID}}">{{$p->NamaProduk}}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="mb-2">
                <label for="JumlahProduk" class="form-label">Jumlah Produk:</label>
                <input type="number" class="form-control form-control-sm" name="JumlahProduk" value="{{ $detailPenjualan->JumlahProduk }}" required>
            </div>

            {{-- <div class="mb-2">
                <label for="Subtotal" class="form-label">Subtotal:</label>
                <input type="number" class="form-control form-control-sm" name="Subtotal" value="{{ $detailPenjualan->Subtotal }}" required>
            </div> --}}

            <button type="submit" class="btn btn-warning btn-sm bg-warning text-light">Update</button>
        </form>

    </div>
</div>
@endsection
