<?php

namespace App\Http\Controllers;

use App\Models\Shk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ShkController extends Controller
{
    public function index()
    {

        $shk = Shk::all();
        return view('pages.shk.index', compact('shk'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'file_upload' => 'required|mimes:pdf|max:5120', // 5MB
        ]);

        $filePath = $request->file('file_upload')->store('shk_files', 'public');

        Shk::create([
            'nama' => $request->nama,
            'file_upload' => $filePath,


        ]);

        return back()->with('success', 'File SHK berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'file_upload' => 'nullable|mimes:pdf|max:5120',
        ]);

        $shk = Shk::findOrFail($id);

        if ($request->hasFile('file_upload')) {
            // Hapus file lama jika ada
            if ($shk->file_upload && Storage::disk('public')->exists($shk->file_upload)) {
                Storage::disk('public')->delete($shk->file_upload);
            }

            $shk->file_upload = $request->file('file_upload')->store('shk_files', 'public');
        }

        $shk->nama = $request->nama;
        $shk->save();

        return back()->with('success', 'File SHK berhasil diupdate.');
    }

    public function destroy($id)
    {
        $shk = Shk::findOrFail($id);

        if ($shk->files && Storage::disk('public')->exists($shk->files)) {
            Storage::disk('public')->delete($shk->files);
        }

        $shk->delete();

        return back()->with('success', 'File SHK berhasil dihapus.');
    }
}
