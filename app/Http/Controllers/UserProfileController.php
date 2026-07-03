<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;

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

    return view('profile', compact('user'));
}

    public function editUserForm()
    {
        $user = Auth::user();

        return view('edit-profile', compact('user'));
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
}
