<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function getImages()
    {
        $images = Image::all();
        return response()->json($images);
    }

    public function uploadImage(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $path = $request->file('image')->store('images', 'public');

        Image::create(['filename' => $path]);

        return response()->json([
            'message' => 'Image uploaded successfully',
            'image_url' => asset('storage/' . $path),
        ]);
    }
}