<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    
    public function __invoke() {
        $gallery = Gallery::active()->first();
        return inertia('Gallery', [
            'gallery' => $gallery,
            'image_url' => sprintf("gallery/%s", $gallery->image_path ?? "default.jpg")
        ]);
    }

}
