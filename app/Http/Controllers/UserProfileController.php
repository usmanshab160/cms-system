<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use App\Models\Blog;
use App\Models\Media;
class UserProfileController extends Controller
{
    //  ---------- Blog Coutner like total published, scheduled, draft -----------


    public function profile()
   {
   $user = Auth::user()->loadCount([
    'blogs',
    'blogs as published_count' => function ($query) {
        $query->where('status', 'published');
    },
    'blogs as draft_count' => function ($query) {
        $query->where('status', 'draft');
    },
    'blogs as scheduled_count' => function ($query) {
        $query->where('status', 'scheduled');
    },
   ]);

    $articles = Blog::where('user_id', $user->id)
    ->latest()
    ->get();
    return view('profile', compact('user', 'articles'));

    // return view('edit-profile', compact('user', 'articles'));
    }



    //         This logic edit the user form
    public function editUserForm()
    {
      $user = Auth::user()->loadCount([
        'blogs',
        'blogs as published_count' => function ($query) {
            $query->where('status', 'published');
        },
        'blogs as draft_count' => function ($query) {
            $query->where('status', 'draft');
        },
        'blogs as scheduled_count' => function ($query) {
            $query->where('status', 'scheduled');
        },
    ]);
    $articles = Blog::where('user_id', $user->id)
        ->select(
            'id',
            'title',
            'featured_image',
            'status',
            'scheduled_at',
            'updated_at'
        )
        ->latest()
        ->get();
    // dd($articles);

    return view('edit-profile', compact('user', 'articles'));  
    }



    /**
     * Update User Profile
     */
    public function updateUserForm(Request $request)
    {


        $user = Auth::user();

        $validated = $request->validate([
            'fname' => ['required', 'string', 'max:255'],
            'lname' => ['required', 'string', 'max:255'],
            // 'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('users')->ignore($user->id),
            ],
            'role' => ['required', 'string'],
            'password' => ['nullable', 'confirmed', 'min:8'],
        ]);
        // dd('Validation Passed', $validated);
        $user->fname = $validated['fname'];
        $user->lname = $validated['lname'];
        // $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->role = $validated['role'];

        // Password update only if user entered a new password
        if (!empty($validated['password'])) {
            $user->password = Hash::make($validated['password']);
        }

        $user->save();
        return redirect()
            ->back()
            ->with('success', 'Profile updated successfully.');

    }

    /**
     * Delete User Account
     */
    public function destroyUserForm(Request $request)
    {
        $user = Auth::user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')
            ->with('success', 'Your account has been deleted successfully.');

    }


    public function destroyArticle(Blog $article)
{
    // Sirf apna article delete kar sakta hai
    if ($article->user_id != Auth::id()) {
        abort(403);
    }

    $article->delete();

    return redirect()->back()->with('success', 'Article deleted successfully.');
}


// Blog Edit and Update Logic

// public function editBlog($id)
//     {
//         $blog = Blog::with('galleries')
//                     ->where('user_id', Auth::id())
//                     ->findOrFail($id);

//         return view('edit-blog', compact('blog'));
//     }

public function editBlog($id)
{
    $blog = Blog::with('galleries')
                ->where('user_id', Auth::id())
                ->findOrFail($id);

    $media = Media::latest()->get();

    return view('edit-blog', compact(
        'blog',
        'media'
    ));
}

    // Update Blog
    public function updateBlog(Request $request, $id)
    {

        $blog = Blog::with('galleries')
                    ->where('user_id', Auth::id())
                    ->findOrFail($id);

        $validated = $request->validate([
            // 'author_name' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:blogs,slug,' . $blog->id,
            'description' => 'nullable|string',
            'category' => 'required|string|max:255',
            'read_time' => 'nullable|string|max:50',

            'featured_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'featured_media_id' => 'nullable|exists:media,id',
            'remove_featured_image' => 'nullable|boolean',
            'img_alt' => 'nullable|string|max:255',

            'content' => 'required|string',

            'video' => 'nullable|string|max:255',
            'video_url' => 'nullable|url',

            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
            'focus_keyword' => 'nullable|string|max:255',

            // 'status' => 'required|in:Draft,Published,Scheduled',
            'status' => 'required|in:draft,published,scheduled',
            'scheduled_at' => 'nullable|date',

            'gallery.*' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

            // ✅ Media Library se select ki hui gallery images (naya add kiya gaya rule)
            'gallery_media_ids' => 'nullable|array',
            'gallery_media_ids.*' => 'exists:media,id',

            'remove_gallery_images' => 'nullable|array',
            'remove_gallery_images.*' => 'exists:blog_galleries,id',
        ]);
        // dd('Validation Passed', $validated);
        // dd($validated);

        // Remove Featured Image
         if ($request->remove_featured_image) {

         if ($blog->featured_image && Storage::disk('public')->exists($blog->featured_image)) {
        Storage::disk('public')->delete($blog->featured_image);
        }

        $validated['featured_image'] = null;
        $validated['featured_media_id'] = null;
        }

    // Upload New Featured Image
        elseif ($request->hasFile('featured_image')) {

    if ($blog->featured_image && Storage::disk('public')->exists($blog->featured_image)) {
        Storage::disk('public')->delete($blog->featured_image);
    }

    $path = $request->file('featured_image')
        ->store('blogs/featured-images', 'public');

    $validated['featured_image'] = $path;
    $validated['featured_media_id'] = null;
    }

    // Select From Media Library
    elseif ($request->filled('featured_media_id')) {

    $media = Media::find($request->featured_media_id);

    if ($media) {
        $validated['featured_media_id'] = $media->id;
        $validated['featured_image'] = $media->file_path;
    }
    }
    // Gallery delete

    if ($request->filled('remove_gallery_images')) {

    $blog->galleries()
        ->whereIn('id', $request->remove_gallery_images)
        ->delete();
    }
        $blog->update($validated);


        // Gallery Images (sirf new/fresh uploads)
        if ($request->hasFile('gallery')) {

             foreach ($request->file('gallery') as $image) {

                $path = $image->store('blogs/gallery', 'public');

                $blog->galleries()->create([
                    'image' => $path
                ]);
            }
        }

        // ✅ Gallery Images (Media Library se select ki hui — ab yahan save ho rahi hain)
        if ($request->filled('gallery_media_ids')) {

            foreach ($request->gallery_media_ids as $mediaId) {

                $media = Media::find($mediaId);

                if ($media) {
                    $blog->galleries()->create([
                        'image' => $media->file_path
                    ]);
                }
            }
        }

        return redirect()
        // ->back()
            ->route('edit-profile.edit')
            ->with('success', 'Blog updated successfully.');
    }

}