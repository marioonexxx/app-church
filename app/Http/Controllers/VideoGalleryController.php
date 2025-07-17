<?php

namespace App\Http\Controllers;

use App\Models\Videogallery;
use Illuminate\Http\Request;

class VideoGalleryController extends Controller
{
    public function index()
    {
        $videoGallery = Videogallery::all();

        return view('pages.videogallery.index', compact('videoGallery'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'caption' => 'required|string|max:255',
            'link_video' => 'required|url',
        ]);

        Videogallery::create($data);

        return back()->with('success', 'Video berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $data = $request->validate([
            'caption' => 'required|string|max:255',
            'link_video' => 'required|url'
        ]);

        // Temukan data berdasarkan ID
        $video = Videogallery::findOrFail($id);

        // Update data
        $video->update($data);

        return back()->with('success', 'Video berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $videoGallery = Videogallery::findOrFail($id);
        $videoGallery->delete();
        return back()->with('success', 'Foto dihapus');
    }
}
