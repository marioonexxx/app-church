<?php

namespace App\Http\Controllers;

use App\Models\IbadahMinggu;
use Illuminate\Http\Request;

class IbadahMingguController extends Controller
{
    public function index()
    {
        $kebaktianMinggu = IbadahMinggu::first();
        return view('pages.ibadahminggu.index', compact('kebaktianMinggu'));
    }

    public function submit(Request $request)
    {
        $request->validate([
            'konten' => 'required|string',
        ]);

        // Ambil data pertama atau buat baru
        $kebaktianMinggu = IbadahMinggu::first();

        if ($kebaktianMinggu) {
            $kebaktianMinggu->konten = $request->konten;
            $kebaktianMinggu->save();
        } else {
            IbadahMinggu::create([
                'konten' => $request->konten,
            ]);
        }

        return redirect()->back()->with('success', 'Jadwal berhasil diperbarui.');
    }
}
