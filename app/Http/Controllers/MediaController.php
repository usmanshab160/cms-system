<?php

namespace App\Http\Controllers;

use App\Models\Media;

class MediaController extends Controller
{
    public function index()
    {
        $media = Media::latest()->get();

        return view('create', compact('media'));
    }
}