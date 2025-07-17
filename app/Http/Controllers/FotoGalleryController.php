<?php

namespace App\Http\Controllers;

use App\Models\Fotogallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FotoGalleryController extends Controller
{
    public function index()
    {
        $fotoGallery = Fotogallery::all();

        return view('pages.fotogallery.index', compact('fotoGallery'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'caption' => 'required',
            'foto_upload' => 'nullable|image|mimes:jpeg,png,jpg|max:5000'
        ]);

        if ($request->hasFile('foto_upload')) {
            $data['foto_upload'] = $request->file('foto_upload')->store('fotogallery', 'public');
        }

        Fotogallery::create($data);
        return back()->with('success', 'Foto ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $fotoGallery = Fotogallery::findOrFail($id);

        $data = $request->validate([
            'caption' => 'required',
            'foto_upload' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        if ($request->hasFile('foto_upload')) {
            // Hapus file lama jika ada
            if ($fotoGallery->foto_upload && Storage::disk('public')->exists($fotoGallery->foto_upload)) {
                Storage::disk('public')->delete($fotoGallery->foto_upload);
            }

            // Simpan file baru
            $data['foto_upload'] = $request->file('foto_upload')->store('fotogallery', 'public');
        }

        $fotoGallery->update($data);

        return back()->with('success', 'Foto diupdate');
    }

    public function destroy($id)
    {
        $fotoGallery = Fotogallery::findOrFail($id);
        $fotoGallery->delete();
        return back()->with('success', 'Foto dihapus');
    }
}
