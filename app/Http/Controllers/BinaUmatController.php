<?php

namespace App\Http\Controllers;

use App\Models\Binaumat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BinaUmatController extends Controller
{
    public function index()
    {

        $binaumat = Binaumat::all();
        return view('pages.binaumat.index', compact('binaumat'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'file_upload' => 'required|mimes:pdf|max:5120', // 5MB
        ]);

        $filePath = $request->file('file_upload')->store('binaumat_files', 'public');

        Binaumat::create([
            'nama' => $request->nama,
            'file_upload' => $filePath,


        ]);

        return back()->with('success', 'File Bina Umat berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'file_upload' => 'nullable|mimes:pdf|max:5120',
        ]);

        $binaumat = Binaumat::findOrFail($id);

        if ($request->hasFile('file_upload')) {
            // Hapus file lama jika ada
            if ($binaumat->file_upload && Storage::disk('public')->exists($binaumat->file_upload)) {
                Storage::disk('public')->delete($binaumat->file_upload);
            }

            $binaumat->file_upload = $request->file('file_upload')->store('binaumat_files', 'public');
        }

        $binaumat->nama = $request->nama;
        $binaumat->save();

        return back()->with('success', 'File Bina Umat berhasil diupdate.');
    }

    public function destroy($id)
    {
        $binaumat = Binaumat::findOrFail($id);

        if ($binaumat->files && Storage::disk('public')->exists($binaumat->files)) {
            Storage::disk('public')->delete($binaumat->files);
        }

        $binaumat->delete();

        return back()->with('success', 'File Bina Umat berhasil dihapus.');
    }
}
