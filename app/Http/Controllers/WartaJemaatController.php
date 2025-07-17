<?php

namespace App\Http\Controllers;

use App\Models\Wartajemaat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class WartaJemaatController extends Controller
{
    public function index()
    {

        $wartaJemaat = Wartajemaat::all();
        return view('pages.wartajemaat.index', compact('wartaJemaat'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'caption' => 'required|string|max:255',
            'files' => 'required|mimes:pdf|max:5120', // 5MB
        ]);

        $filePath = $request->file('files')->store('wartajemaat', 'public');

        Wartajemaat::create([
            'judul' => $request->caption,
            'files' => $filePath,


        ]);

        return back()->with('success', 'Warta Jemaat berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'files' => 'nullable|mimes:pdf|max:5120',
        ]);

        $warta = Wartajemaat::findOrFail($id);

        if ($request->hasFile('files')) {
            // Hapus file lama jika ada
            if ($warta->files && Storage::disk('public')->exists($warta->files)) {
                Storage::disk('public')->delete($warta->files);
            }

            $warta->files = $request->file('files')->store('wartajemaat', 'public');
        }

        $warta->judul = $request->judul;
        $warta->save();

        return back()->with('success', 'Warta Jemaat berhasil diupdate.');
    }

    public function destroy($id)
    {
        $warta = Wartajemaat::findOrFail($id);

        if ($warta->files && Storage::disk('public')->exists($warta->files)) {
            Storage::disk('public')->delete($warta->files);
        }

        $warta->delete();

        return back()->with('success', 'Warta Jemaat berhasil dihapus.');
    }
}
