<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Models\Penjualan;
use Illuminate\Http\Request;

class PenjualanController extends Controller
{
    public function index()
    {
        $penjualans = Penjualan::with('Pelanggan')->get();
        // dd($penjualans);
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
