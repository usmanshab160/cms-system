<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\createModel;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class createController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:100',
            'description' => 'required|max:160',
            'category' => 'required',
            'content' => 'required',
            'featured_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
            'gallery.*' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
            'video' => 'nullable|mimes:mp4,mov,webm|max:512000',
            'video_url' => 'nullable|url',
        ]);

        // Featured Image Upload
        $featuredImage = null;

        if ($request->hasFile('featured_image')) {
            $featuredImage = $request->file('featured_image')
                ->store('blogs/featured', 'public');
        }

        // Gallery Upload
        $galleryImages = [];

        if ($request->hasFile('gallery')) {

            foreach ($request->file('gallery') as $image) {

                $galleryImages[] = $image->store(
                    'blogs/gallery',
                    'public'
                );
            }
        }

        // Video Upload
        $videoPath = null;
        if ($request->hasFile('video')) {

            $videoPath = $request->file('video')
                ->store('blogs/videos', 'public');
        }

        createModel::create([

            'title' => $request->title,

            'slug' => $request->slug
                ? Str::slug($request->slug)
                : Str::slug($request->title),

            'description' => $request->description,

            'category' => $request->category,

            'read_time' => $request->read_time,

            // CKEDITOR CONTENT
            'content' => $request->content,

            'featured_image' => $featuredImage,

            'img_alt' => $request->img_alt,

            'gallery' => json_encode($galleryImages),

            'video' => $videoPath,

            'video_url' => $request->video_url,

            'meta_title' => $request->meta_title,

            'meta_description' => $request->meta_description,

            'focus_keyword' => $request->focus_keyword,

            'status' => $request->status ?? 'draft',

            'scheduled_at' => $request->scheduled_at,

            'author' => $request->author,
        ]);

        return redirect()
            ->back()
            ->with('success', 'Blog created successfully');
    }
}
