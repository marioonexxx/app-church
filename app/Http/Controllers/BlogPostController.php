<?php

namespace App\Http\Controllers;

use App\Models\Blogpost;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BlogPostController extends Controller
{
    public function index()
    {

        $blogPost = Blogpost::all();
        $kategoris = Kategori::all();
        return view('pages.blogpost.index', compact('blogPost', 'kategoris'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'image' => 'required|mimes:jpg,jpeg,png,gif,webp|max:2048',
            'konten' => 'required|string',
            'kategori_id' => 'required|exists:kategori,id',
            'user_id' => 'required|exists:users,id',
        ]);

        // Simpan gambar
        $filePath = $request->file('image')->store('blogpost', 'public');

        // Auto-generate slug
        $slug = Str::slug($request->judul);
        $originalSlug = $slug;
        $count = 1;
        while (Blogpost::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $count++;
        }

        // Auto-fill SEO fields
        $metaTitle = $request->judul;
        $metaDescription = Str::limit(strip_tags($request->konten), 160);
        $metaKeywords = implode(', ', array_slice(explode(' ', Str::slug($request->judul, ' ')), 0, 8));

        // Simpan ke database
        Blogpost::create([
            'judul'             => $request->judul,
            'slug'              => $slug,
            'image'             => $filePath,
            'konten'            => $request->konten,
            'meta_title'        => $metaTitle,
            'meta_description'  => $metaDescription,
            'meta_keywords'     => $metaKeywords,
            'kategori_id'       => $request->kategori_id,
            'user_id'           => $request->user_id,
        ]);

        return back()->with('success', 'Post berhasil ditambahkan.');
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'image' => 'nullable|mimes:jpg,jpeg,png,gif,webp|max:2048',
            'konten' => 'required|string',
            'kategori_id' => 'required|exists:kategori,id',
            'user_id' => 'required|exists:users,id',
        ]);

        $blog = Blogpost::findOrFail($id);

        // Update slug jika judul berubah
        if ($blog->judul !== $request->judul) {
            $slug = Str::slug($request->judul);
            $originalSlug = $slug;
            $count = 1;
            while (Blogpost::where('slug', $slug)->where('id', '!=', $id)->exists()) {
                $slug = $originalSlug . '-' . $count++;
            }
            $blog->slug = $slug;
        }

        // Update image jika di-upload
        if ($request->hasFile('image')) {
            $filePath = $request->file('image')->store('blogpost', 'public');
            $blog->image = $filePath;
        }

        $blog->judul = $request->judul;
        $blog->konten = $request->konten;
        $blog->kategori_id = $request->kategori_id;
        $blog->user_id = $request->user_id;

        // Auto SEO Fields
        $blog->meta_title = $request->judul;
        $blog->meta_description = Str::limit(strip_tags($request->konten), 160);
        $blog->meta_keywords = implode(', ', array_slice(explode(' ', Str::slug($request->judul, ' ')), 0, 8));

        $blog->save();

        return back()->with('success', 'Post berhasil diperbarui.');
    }


    public function destroy($id)
    {
        $blogPost = Blogpost::findOrFail($id);

        if ($blogPost->image && Storage::disk('public')->exists($blogPost->image)) {
            Storage::disk('public')->delete($blogPost->image);
        }

        $blogPost->delete();

        return back()->with('success', 'Post berhasil dihapus.');
    }

    public function show()
    {

    }
}
