<?php

namespace App\Http\Controllers;

use App\Models\Sektor;
use App\Models\Unit;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    public function index()
    {
        $dataSektor = Sektor::all();
        $data = Unit::with('sektor')->get()->groupBy(fn($item) => $item->sektor->nama ?? 'Tanpa Sektor');
        return view('pages.unit.index', compact('data','dataSektor'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string',
        ]);

        Unit::create($request->all());

        return redirect()->back()->with('success','Data Unit Berhasil Ditambahkan.');


    }
    public function update(Request $request, $id)
    {
        $request ->validate([
            'nama' => 'required|string',
        ]);

        $data = Unit::findOrFail($id);
        $data->update($request->all());

        return redirect()->back()->with('success','Data Unit Berhasil Diupdate.');

    }
    public function destroy($id)
    {
        $data = Unit::findOrFail($id);
        $data->delete();

        return redirect()->back()->with('success','Data Unit Berhasil Dihapus');

    }
}
