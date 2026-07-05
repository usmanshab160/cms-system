<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use App\Models\Blog;
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

public function editBlog($id)
    {
        $blog = Blog::with('galleries')
                    ->where('user_id', Auth::id())
                    ->findOrFail($id);

        return view('edit-blog', compact('blog'));
    }

    // Update Blog
    public function updateBlog(Request $request, $id)
    {
        //  dd('Controller Hit');
        // dd($request->all());
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

            'gallery_images.*' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);
        // dd('Validation Passed', $validated);
        // dd($validated);

        // Featured Image Update
        if ($request->hasFile('featured_image')) {

            // Old image delete
            if ($blog->featured_image && Storage::disk('public')->exists($blog->featured_image)) {
                Storage::disk('public')->delete($blog->featured_image);
            }

            $validated['featured_image'] = $request
                ->file('featured_image')
                ->store('blogs/featured-images', 'public');
        }

        $blog->update($validated);


        // Gallery Images (sirf new images add hongi)
        if ($request->hasFile('gallery_images')) {

            foreach ($request->file('gallery_images') as $image) {

                $path = $image->store('blogs/gallery', 'public');

                $blog->galleries()->create([
                    'image' => $path
                ]);
            }
        }

        return redirect()
        // ->back()
            ->route('edit-profile.edit')
            ->with('success', 'Blog updated successfully.');
    }

}