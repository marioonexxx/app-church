<?php

namespace App\Http\Controllers;

use App\Models\Misi;
use Illuminate\Http\Request;

class MisiController extends Controller
{
    public function index()
    {
        $misi = Misi::first();
        return view('pages.misi.index', compact('misi'));
    }

    public function submit(Request $request)
    {
        $request->validate([
            'konten' => 'required|string',
        ]);

        // Ambil data pertama atau buat baru
        $misi = Misi::first();

        if ($misi) {
            $misi->konten = $request->konten;
            $misi->save();
        } else {
            Misi::create([
                'konten' => $request->konten,
            ]);
        }

        return redirect()->back()->with('success', 'Misi berhasil diperbarui.');
    }
}
