<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserProfileController extends Controller
{
    // Blog Coutner like total published, scheduled, draft
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
}
