<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    // ==============================
    // Create Blog Page
    // ==============================
    public function create()
    {
        $media = Media::latest()->get();

        return view('create', compact('media'));
    }

    // ==============================
    // Store Blog
    // ==============================
    public function store(Request $request)
    {
        $request->validate([

            'title'=>'required|max:255',
            'description'=>'required|max:160',
            'category'=>'required',
            'content'=>'required',

            'featured_image'=>'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
            'featured_media_id'=>'nullable|exists:media,id',

            'gallery.*'=>'nullable|image',
            'gallery_media_ids' => 'nullable|array',
            'gallery_media_ids.*' => 'exists:media,id',

            'video'=>'nullable|mimes:mp4,mov,webm|max:512000',

        ]);

        $blog = new Blog();

        $blog->user_id = Auth::id();
        $blog->author_name = Auth::user()->name;

        $blog->title = $request->title;

        $blog->slug = $request->slug
            ? Str::slug($request->slug)
            : Str::slug($request->title);

        $blog->description = $request->description;
        $blog->category = $request->category;
        $blog->read_time = $request->read_time;
        $blog->img_alt = $request->img_alt;
        $blog->content = $request->content;
        $blog->video_url = $request->video_url;
        $blog->meta_title = $request->meta_title;
        $blog->meta_description = $request->meta_description;
        $blog->focus_keyword = $request->focus_keyword;
        $blog->status = $request->status;
        $blog->scheduled_at = $request->scheduled_at;

        // ==============================
        // Featured Image
        // ==============================

        // Option 1: Upload New Image
        if ($request->hasFile('featured_image')) {

            $image = $request->file('featured_image');

            $path = $image->store('media', 'public');

            $blog->featured_image = $path;

            $media = Media::create([
                'user_id'   => Auth::id(),
                'file_name' => $image->getClientOriginalName(),
                'file_path' => $path,
                'mime_type' => $image->getMimeType(),
                'file_size' => $image->getSize(),
                'alt_text'  => $request->img_alt,
            ]);

            $blog->featured_media_id = $media->id;
        }

        // Option 2: Choose From Media Library
        elseif ($request->filled('featured_media_id')) {

            $blog->featured_media_id = $request->featured_media_id;

            $media = Media::find($request->featured_media_id);

            if ($media) {
                $blog->featured_image = $media->file_path;
            }
        }

        // ==============================
        // Video
        // ==============================
        if ($request->hasFile('video')) {

            $video = $request
                ->file('video')
                ->store('videos', 'public');

            $blog->video = $video;
        }

        $blog->save();

        // ==============================
        // Gallery
        // ==============================
        if ($request->hasFile('gallery')) {

            foreach ($request->file('gallery') as $image) {

                $path = $image->store('gallery', 'public');

                $blog->galleries()->create([
                    'image' => $path
                ]);
            }
        }

        if ($request->filled('gallery_media_ids')) {

    foreach ($request->gallery_media_ids as $mediaId) {

        $media = Media::find($mediaId);

        if ($media) {

            $blog->galleries()->create([
                'image' => $media->file_path,
            ]);

        }

    }

}
        return redirect()
            ->route('blogs')
            ->with('success', 'Blog created successfully');
    }
}