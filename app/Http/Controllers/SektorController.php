<?php

namespace App\Http\Controllers;

use App\Models\Sektor;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;

class SektorController extends Controller
{
    public function index()
    {
        $data = Sektor::all();
        return view('pages.sektor.index', compact('data'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string',
        ]);

        Sektor::create($request->all());

        return redirect()->back()->with('success','Data Sektor Berhasil Ditambahkan.');


    }
    public function update(Request $request, $id)
    {
        $request ->validate([
            'nama' => 'required|string',
        ]);

        $data = Sektor::findOrFail($id);
        $data->update($request->all());

        return redirect()->back()->with('success','Data Sektor Berhasil Diupdate.');

    }
    public function destroy($id)
    {
        $data = Sektor::findOrFail($id);
        $data->delete();

        return redirect()->back()->with('success','Data Sektor Berhasil Dihapus');

    }
}
