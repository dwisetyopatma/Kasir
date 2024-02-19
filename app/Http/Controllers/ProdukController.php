<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produks = Produk::all();
        return view('produk.index', compact('produks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('produk.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $field = $request->validate([
            'Gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'NamaProduk' => 'required',
            'Harga' => 'required|numeric|min:0',
            'Stok' => 'required|integer|min:0',
        ]);

        $gambar = $request->file('Gambar');
        $filename = date('Y-m-d'). $gambar->getClientOriginalName();
        $filename = str_replace(' ', '_', $filename);

        $path     ='Gambar-produk/'.$filename;

        Storage::putFileAs('public/Gambar-produk', $gambar, $filename);

        // Simpan informasi produk ke database
        $produk = new Produk($field);
        // Assign atribut lainnya
        $produk->Gambar = $filename; // Simpan nama file gambar ke dalam database
        $produk->save();
        return redirect(route('produk.index'))->with('success', 'Produk created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('produk.show', compact('produk'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $produk = Produk::findOrFail($id);
        // dd('ada');
        return view('produk.edit', compact('produk'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $field = $request->validate([
            'Gambar' => 'nullable|mimes:jpeg,png,jpg,gif|max:2048',
            'NamaProduk' => 'required',
            'Harga' => 'required|numeric|min:0',
            'Stok' => 'required|integer|min:0',
        ]);

        $produk = Produk::findOrFail($id);

        // Check if new image is uploaded
        if ($request->hasFile('Gambar')) {
            $gambar = $request->file('Gambar');
            $filename = date('Y-m-d'). $gambar->getClientOriginalName();
            $filename = str_replace(' ', '_', $filename);

            $path = 'Gambar-produk/'.$filename;

            Storage::putFileAs('public/Gambar-produk', $gambar, $filename);

            $field['Gambar'] = $filename; // Simpan nama file gambar ke dalam database
        }

        $produk->update($field);

        return redirect(route('produk.index'))->with('success', 'Produk updated successfully.');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $produk = Produk::findOrFail($id);
        $produk->delete();

        return redirect(route('produk.index'))->with('success', 'Produk deleted successfully.');
    }
}
