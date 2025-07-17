<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {

        $kategori = Kategori::all();
        return view('pages.kategori.index', compact('kategori'));
    }

    public function store(Request $request)
    {
        $request->validate
        ([
            'nama_kategori' => 'required|string|max:255',

        ]);


        Kategori::create
        ([
            'nama_kategori' => $request->nama_kategori,
        ]);

        return back()->with('success', 'Kategori berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:255',
            
        ]);

        $kategori = Kategori::findOrFail($id);       

        $kategori->nama_kategori = $request->nama_kategori;
        $kategori->save();

        return back()->with('success', 'Kategori berhasil diupdate.');
    }

    public function destroy($id)
    {
        $kategori = Kategori::findOrFail($id);        
        $kategori->delete();
        return back()->with('success', 'Kategori berhasil dihapus.');
    }
}
