<?php

namespace App\Http\Controllers;

use App\Models\DetailPenjualan;
use App\Models\Penjualan;
use App\Models\Produk;
use Illuminate\Http\Request;

class DetailPenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $detailPenjualans = DetailPenjualan::with(['Penjualan', 'Produk'])->get();
        return view('detailpenjualan.index', compact('detailPenjualans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $produk = Produk::all();
        $penjualan = Penjualan::all();
        return view('detailpenjualan.create', compact('produk', 'penjualan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'PenjualanID' => 'required|integer',
            'ProdukID' => 'required|integer',
            'JumlahProduk' => 'required|integer|min:1',
            // 'Subtotal' => 'required|numeric|min:0',
        ]);

        $jumlahProduk = $request->JumlahProduk;
        $produk = Produk::findOrFail($request->ProdukID);
        $request['Subtotal'] = $produk->Harga * $jumlahProduk;
        // dd($subtotal);

        DetailPenjualan::create($request->all());

        return redirect(route('detailpenjualan.index'))->with('success', 'DetailPenjualan created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('detailpenjualan.show', compact('detailPenjualan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $produk = Produk::all();
        $penjualan = Penjualan::all();
        $detailPenjualan = DetailPenjualan::findOrFail($id);
        return view('detailpenjualan.edit', compact(['detailPenjualan', 'produk', 'penjualan']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'PenjualanID' => 'required|integer',
            'ProdukID' => 'required|integer',
            'JumlahProduk' => 'required|integer|min:1',
            // 'Subtotal' => 'required|numeric|min:0',
        ]);

        $jumlahProduk = $request->JumlahProduk;
        $produk = Produk::findOrFail($request->ProdukID);
        $validatedData['Subtotal'] = $produk->Harga * $jumlahProduk;



        $detailpenjualan = DetailPenjualan::findOrFail($id);
        $detailpenjualan->update($validatedData);


        return redirect(route('detailpenjualan.index'))->with('success', 'DetailPenjualan updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $detailPenjualan = DetailPenjualan::findOrFail($id);
        $detailPenjualan->delete();

        return redirect(route('detailpenjualan.index'))->with('success', 'DetailPenjualan deleted successfully.');
    }
}
