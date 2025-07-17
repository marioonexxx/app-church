<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use App\Models\PerangkatGereja;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PerangkatGerejaController extends Controller
{
    public function index()
    {
        $perangkat = PerangkatGereja::all();
        $namaJabatan = Jabatan::all();

        return view('pages.perangkatgereja.index', compact('perangkat', 'namaJabatan'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama_lengkap' => 'required',
            'foto_upload' => 'nullable|image|mimes:jpeg,png,jpg|max:5000',
            'jabatan_id' => 'required',
            'nama_jabatan' => 'required',
            'no_hp' => 'required',
            'url_facebook' => 'required',
            'url_instagram' => 'required',
        ]);

        if ($request->hasFile('foto_upload')) {
            $data['foto_upload'] = $request->file('foto_upload')->store('perangkat_gereja', 'public');
        } else {
            $data['foto_upload'] = null; // atau bisa tidak ditulis, tergantung model
        }

        PerangkatGereja::create($data);

        // dd($data);

        return back()->with('success', 'Data perangkat gereja ditambahkan');
    }


    public function update(Request $request, $id)
    {
        $perangkat = PerangkatGereja::findOrFail($id);

        $data = $request->validate([
            'nama_lengkap' => 'required',
            'foto_upload' => 'nullable|image|mimes:jpeg,png,jpg|max:5000',
            'jabatan_id' => 'required',
            'nama_jabatan' => 'required',
            'no_hp' => 'required',
            'url_facebook' => 'required',
            'url_instagram' => 'required',
        ]);

        if ($request->hasFile('foto_upload')) {
            // Hapus file lama jika ada
            if ($perangkat->foto_upload && Storage::disk('public')->exists($perangkat->foto_upload)) {
                Storage::disk('public')->delete($perangkat->foto_upload);
            }

            // Simpan file baru
            $data['foto_upload'] = $request->file('foto_upload')->store('perangkat_gereja', 'public');
        }

        $perangkat->update($data);

        return back()->with('success', 'Data berhasil diupdate');
    }

    public function destroy($id)
    {
        $perangkat = PerangkatGereja::findOrFail($id);
        $perangkat->delete();
        return back()->with('success', 'Data berhasil dihapus');
    }
}
