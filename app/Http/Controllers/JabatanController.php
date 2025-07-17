<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use Illuminate\Http\Request;

class JabatanController extends Controller
{
    public function index()
    {

        $jabatan = Jabatan::all();
        return view('pages.jabatan.index', compact('jabatan'));
    }

    public function store(Request $request)
    {
        $request->validate
        ([
            'nama_jabatan' => 'required|string|max:255',

        ]);


        Jabatan::create
        ([
            'nama_jabatan' => $request->nama_jabatan,
        ]);

        return back()->with('success', 'Jabatan berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_jabatan' => 'required|string|max:255',

        ]);

        $jabatan = Jabatan::findOrFail($id);

        $jabatan->nama_jabatan = $request->nama_jabatan;
        $jabatan->save();

        return back()->with('success', 'Jabatan berhasil diupdate.');
    }

    public function destroy($id)
    {
        $jabatan = Jabatan::findOrFail($id);
        $jabatan->delete();
        return back()->with('success', 'Jabatan berhasil dihapus.');
    }
}
