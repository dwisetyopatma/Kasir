<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Models\Penjualan;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PenjualanController extends Controller
{
    public function index()
    {
        $penjualans = Penjualan::with('Pelanggan', 'detailPenjualans')
            ->withCount(['detailPenjualans as subtotal' => function ($query) {
                $query->select(DB::raw('sum(Subtotal)'));
            }])
            ->get();

        return view('penjualan.index', compact('penjualans'));
    }

    public function create()
    {
        $pelanggan = Pelanggan::all();
        return view('penjualan.create', compact('pelanggan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'TanggalPenjualan' => 'required|date',
            'TotalHarga' => 'required|numeric',
            'PelangganID' => 'required|integer',
            // Add other necessary validation rules
        ]);

        // $produk = Produk::find($request->produk_id);
        // // $produk->stok -= $request->jumlah; // Mengurangi stok sesuai jumlah terjual
        // $produk->save();
        Penjualan::create($request->all());

        return redirect(route('penjualan.index'))->with('success', 'Penjualan created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Penjualan $penjualan)
    {
        return view('penjualan.show', compact('penjualan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $penjualan = Penjualan::findOrFail($id);
        $pelanggan = Pelanggan::all();
        return view('penjualan.edit', compact('penjualan', 'pelanggan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $validatedData = $request->validate([
            'TanggalPenjualan' => 'required|date',
            'TotalHarga' => 'required|numeric',
            'PelangganID' => 'required|integer',
            // Add other necessary validation rules
        ]);
        $penjualan = Penjualan::findOrFail($id);
        $penjualan->update($request->all());

        return redirect(route('penjualan.index'))->with('success', 'Penjualan updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $penjualan = penjualan::findOrFail($id);
        $penjualan->delete();

        return redirect(route('penjualan.index'))->with('success', 'Penjualan deleted successfully.');
    }
}
