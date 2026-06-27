<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([

            'title'=>'required|max:255',

            'description'=>'required|max:160',

            'category'=>'required',

            'content'=>'required',

            'featured_image'=>'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',

            'gallery.*'=>'nullable|image',

            'video'=>'nullable|mimes:mp4,mov,webm|max:512000',

        ]);


        $blog = new Blog();

        $blog->title = $request->title;

        $blog->slug =
            $request->slug
            ? Str::slug($request->slug)
            : Str::slug($request->title);

        $blog->description = $request->description;

        $blog->category = $request->category;

        $blog->read_time = $request->read_time;

        $blog->img_alt = $request->img_alt;

        $blog->content = $request->content;

        $blog->video_url = $request->video_url;

        $blog->meta_title = $request->meta_title;

        $blog->meta_description =
            $request->meta_description;

        $blog->focus_keyword =
            $request->focus_keyword;

        $blog->status = $request->status;

        $blog->scheduled_at =
            $request->scheduled_at;

        $blog->author = $request->author;

        // Featured Image
        if($request->hasFile('featured_image'))
        {
            $path = $request
                ->file('featured_image')
                ->store('blogs','public');

            $blog->featured_image = $path;
        }

        // Video
        if($request->hasFile('video'))
        {
            $video = $request
                ->file('video')
                ->store('videos','public');

            $blog->video = $video;
        }

        $blog->save();

        // Gallery Images

        if($request->hasFile('gallery'))
        {
            foreach($request->file('gallery')
                    as $image)
            {
                $path = $image
                    ->store('gallery','public');

                $blog->galleries()->create([
                    'image'=>$path
                ]);
            }
        }

        return redirect()
                ->back()
                ->with('success',
                    'Blog created successfully');
    }
    
}