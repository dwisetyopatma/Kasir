<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    public function index()
    {
        $pelanggans = Pelanggan::all();
        // dd($pelanggans);
        return view('pelanggans.index', compact('pelanggans'));
    }

    public function create()
    {
        return view('pelanggans.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'NamaPelanggan' => 'required',
            'Alamat' => 'required',
            'NomorTelepon' => 'required|integer',
        ]);

        Pelanggan::create($request->all());

        return redirect()->route('pelanggan.index')
            ->with('success', 'Pelanggan berhasil ditambahkan!');

        }

    public function edit($id)
    {
        $pelanggan = Pelanggan::findOrFail($id);
        return view('pelanggans.edit', compact('pelanggan'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'NamaPelanggan' => 'required|string',
            'Alamat' => 'required|string',
            'NomorTelepon' => 'required|numeric',
        ]);

        $pelanggan = Pelanggan::findOrFail($id);
        $pelanggan->update($validatedData);

        return redirect(route('pelanggan.index'))->with('success', 'Pelanggan updated successfully.');
    }

    public function destroy($id)
{
    $pelanggan = Pelanggan::findOrFail($id);
    $pelanggan->delete();

    return redirect(route('pelanggan.index'))->with('success', 'Pelanggan deleted successfully.');
}
}
