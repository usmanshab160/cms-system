<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GeneralController extends Controller
{
    public function signup()
    {
        return view('signup');
    }

    public function signin()
    {
        return view('signin');
    }

    public function create()
    {
        return view('create');
    }
}
