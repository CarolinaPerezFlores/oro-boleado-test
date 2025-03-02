<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageUploadController extends Controller
{
    public function showForm()
    {
        return view('upload');
    }

    public function upload(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpg,png,jpeg,gif|max:2048'
        ]);

        $path = $request->file('image')->store('images', 'public');

        return back()->with('success', 'Imagen subida correctamente')->with('image', $path);
    }
}
