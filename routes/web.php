<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\BlogShowController;

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

Route::get('/blogs', [BlogShowController::class, 'blogs']) ->name('blogs');
// Route::get('/blog/{slug}', [BlogShowController::class, 'show'])
//     ->name('blog.show');
Route::get('/blog/{slug}', [BlogShowController::class, 'show'])
    ->name('blog.show');

require __DIR__.'/auth.php';



