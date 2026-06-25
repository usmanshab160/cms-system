<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;

Route::get('/', function () {
    return view('home');
});

Route::get('/signup', function () {
    return view('signup');
});

Route::get('/signin', function () {
    return view('signin');
});

Route::get('/create', function () {
    return view('create');
});

Route::get('/pricing', function () {
    return view('pricing');
});

Route::get('/blogs', function () {
    return view('blog-page');
});

Route::get('/blogs/detail', function () {
    return view('blog-detailed');
});

// Route::post('/blog/store', [createController::class, 'store']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/blog/create', function(){
        return view('blog.create');
});

Route::post('/blog/store', [BlogController::class,'store'])
    ->name('blog.store');

require __DIR__.'/auth.php';
