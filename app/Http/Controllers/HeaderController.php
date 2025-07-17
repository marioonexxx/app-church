<?php

namespace App\Http\Controllers;

use App\Models\Header;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HeaderController extends Controller
{
    public function index()
    {
        $header = Header::first();
        return view('pages.headers.index', compact('header'));
    }

    public function submit(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:jpg,jpeg,png|max:5120', //5MB Maks
        ]);

        $header = Header::first(); // cek apakah sudah ada

        if (!$header) {
            $header = new Header();
        }

        $header->judul = $request->judul;

        if ($request->hasFile('logo')) {
            // hapus logo lama kalau ada
            if ($header->logo && Storage::exists('public/logo/' . $header->logo)) {
                Storage::delete('public/logo/' . $header->logo);
            }

            $file = $request->file('logo');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/logo', $filename);
            $header->logo = $filename;
        }

        $header->save();

        return redirect()->back()->with('success', 'Header berhasil disimpan.');
    }
}
