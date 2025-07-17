<?php

namespace App\Http\Controllers;

use App\Models\Visi;
use Illuminate\Http\Request;

class VisiController extends Controller
{
    public function index()
    {
        $visi = Visi::first();
        return view('pages.visi.index', compact('visi'));
    }

    public function submit(Request $request)
    {
        $request->validate([
            'konten' => 'required|string',
        ]);

        // Ambil data pertama atau buat baru
        $visi = Visi::first();

        if ($visi) {
            $visi->konten = $request->konten;
            $visi->save();
        } else {
            Visi::create([
                'konten' => $request->konten,
            ]);
        }

        return redirect()->back()->with('success', 'Visi berhasil diperbarui.');
    }
}
