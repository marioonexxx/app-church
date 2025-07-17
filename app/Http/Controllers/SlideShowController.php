<?php

namespace App\Http\Controllers;

use App\Models\Imageslider;
use Illuminate\Http\Request;

class SlideShowController extends Controller
{
    public function index()
    {
        $slider = Imageslider::all();

        return view('pages.imageslider.index', compact('slider'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'judul' => 'required',
            'sub_judul' => 'nullable',
            'link' => 'nullable',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:5000'
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('slider', 'public');
        }

        Imageslider::create($data);
        return back()->with('success', 'Slider ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $slider = Imageslider::findOrFail($id);

        $data = $request->validate([
            'judul' => 'required',
            'sub_judul' => 'nullable',
            'link' => 'nullable',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:5048'
        ]);

        if ($request->hasFile('image')) {
            // optional: delete old image
            $data['image'] = $request->file('image')->store('slider', 'public');
        }

        $slider->update($data);
        return back()->with('success', 'Slider diupdate');
    }

    public function destroy($id)
    {
        $slider = Imageslider::findOrFail($id);
        $slider->delete();
        return back()->with('success', 'Slider dihapus');
    }
}
