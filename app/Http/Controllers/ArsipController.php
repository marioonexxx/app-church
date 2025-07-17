<?php

namespace App\Http\Controllers;

use App\Models\Arsip;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArsipController extends Controller
{
    public function index()
    {
        $data = Arsip::all();
        return view('pages.arsip.index', compact('data'));
    }
    public function store(Request $request)
    {   
        $request->validate([
            'nama_dokumen' => 'required|string|max:255',
            'keterangan' => 'required|string|max:255',
            'tahun' => 'required|string|max:255',
            'file' => 'required|mimes:pdf|max:20480', // 5MB
        ]);

        $filePath = $request->file('file')->store('arsip_files', 'public');

        Arsip::create([
            'nama_dokumen' => $request->nama_dokumen,
            'keterangan' => $request->keterangan,
            'tahun' => $request->tahun,
            'file' => $filePath,


        ]);

        return back()->with('success', 'File Arsip/Dokumen berhasil ditambahkan.');
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_dokumen' => 'required|string|max:255',
            'keterangan' => 'required|string|max:255',
            'tahun' => 'required|string|max:255',
            'file' => 'nullable|mimes:pdf|max:20480',
        ]);
 
        $data = Arsip::findOrFail($id);

        if ($request->hasFile('file')) {
            // Hapus file lama jika ada
            if ($data->file && Storage::disk('public')->exists($data->file)) {
                Storage::disk('public')->delete($data->file);
            }

           $data->file = $request->file('file')->store('arsip_files', 'public');
        }

        $data->nama_dokumen = $request->nama_dokumen;
        $data->keterangan = $request->keterangan;
        $data->tahun = $request->tahun;
        $data->save();

        return back()->with('success', 'File Arsip/Dokumen berhasil diupdate.');

    }
    public function destroy($id)
    {   
        $data = Arsip::findOrFail($id);

        if ($data->file && Storage::disk('public')->exists($data->file)) {
            Storage::disk('public')->delete($data->file);
        }

        $data->delete();

        return back()->with('success', 'File Arsip/Dokumen berhasil dihapus.');

    }
}
