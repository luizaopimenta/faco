<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UploadController
{
    public function uploadImage(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:5120'
        ]);

        $path = $request->file('image')->store('uploads/images', 'public');

        return response()->json(['message' => 'Imagem enviada', 'url' => Storage::url($path)]);
    }

    public function uploadVideo(Request $request)
    {
        $request->validate([
            'video' => 'required|file|mimes:mp4,mov,avi,mkv|max:102400'
        ]);

        $path = $request->file('video')->store('uploads/videos', 'public');

        return response()->json(['message' => 'Vídeo enviado', 'url' => Storage::url($path)]);
    }
}
