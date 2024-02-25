<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Facades\App\OpenAi\GenerateImage;
use Illuminate\Http\Request;

class GenerateImageController extends Controller
{
    public function __invoke(Request $request)
    {
        $gallery = Gallery::active()->first();
        GenerateImage::generate($gallery);

        return back();
    }
}
