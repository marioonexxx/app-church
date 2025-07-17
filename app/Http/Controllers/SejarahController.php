<?php

namespace App\Http\Controllers;

use App\Models\Sejarah;
use Illuminate\Http\Request;

class SejarahController extends Controller
{
    public function index()
    {
        $sejarah = Sejarah::first();
        return view('pages.sejarah.index', compact('sejarah'));
    }

    public function submit(Request $request)
    {
        $request->validate([
            'konten' => 'required|string',
        ]);

        // Ambil data pertama atau buat baru
        $sejarah = Sejarah::first();

        if ($sejarah) {
            $sejarah->konten = $request->konten;
            $sejarah->save();
        } else {
            Sejarah::create([
                'konten' => $request->konten,
            ]);
        }

        return redirect()->back()->with('success', 'Sejarah berhasil diperbarui.');
    }
}
