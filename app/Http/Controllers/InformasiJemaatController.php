<?php

namespace App\Http\Controllers;

use App\Models\Informasijemaat;
use Illuminate\Http\Request;

class InformasiJemaatController extends Controller
{
    public function index()
    {
        $informasiJemaat = Informasijemaat::all();
        return view('pages.informasijemaat.index', compact('informasiJemaat'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string',
            'asal' => 'required|string',
            'tujuan' => 'required|string',
            'konten' => 'required|string',
        ]);

        InformasiJemaat::create($request->all());

        return back()->with('success', 'Informasi berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|string',
            'asal' => 'required|string',
            'tujuan' => 'required|string',
            'konten' => 'required|string',
        ]);

        $informasi = InformasiJemaat::findOrFail($id);
        $informasi->update($request->all());

        return back()->with('success', 'Informasi berhasil diperbarui.');
    }

    public function destroy($id) 
    {
        $informasi = InformasiJemaat::findOrFail($id);
        $informasi->delete();

        return back()->with('success', 'Informasi berhasil dihapus.');
    }
}
