<?php

namespace App\Http\Controllers;
use App\Models\Blog;


class BlogShowController extends Controller
{


  // All blogs listing page
    public function blogs()
    {
        $blogs = Blog::where('status', 'published')
        ->latest()
        ->paginate(6);
        // ->get();

        return view('blog-page', compact('blogs'));
    }


public function show($slug)
    {
        $blog = Blog::where('slug', $slug)
                    ->where('status', 'published')
                    ->firstOrFail();

        // Related blogs (same category)
        $relatedBlogs = Blog::where('category', $blog->category)
                            ->where('id', '!=', $blog->id)
                            ->latest()
                            ->take(3)
                            ->get();

        return view('blog-detailed', compact(
            'blog',
            'relatedBlogs'
        ));
    }

    }



  
