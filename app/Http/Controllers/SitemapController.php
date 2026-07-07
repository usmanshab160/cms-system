<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Response;

class SitemapController extends Controller
{
    public function index()
    {
        // Get all published blogs
        $blogs = Blog::where('status', 'published')->get();

        // Return XML view
        return response()
            ->view('sitemap', compact('blogs'))
            ->header('Content-Type', 'application/xml');
    }
}