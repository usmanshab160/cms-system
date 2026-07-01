<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\BlogShowController;
use App\Http\Controllers\UserProfileController;


Route::get('/', function () {
    return view('home');
});

Route::get('/signup', function () {
    return view('signup');
});

Route::get('/signin', function () {
    return view('signin');
});


Route::get('/pricing', function () {
    return view('pricing');
});

Route::get('/blog-create', function () {
    return view('create');
})->name('blog.create');

// Route::get('/create', function () {
//     return view('create');
// })->name('blog.create');

Route::post('/blog-create/store', [BlogController::class, 'store'])
    ->name('blog.store');
Route::get('/blogs', [BlogShowController::class, 'blogs']) ->name('blogs');

Route::get('/blog/{slug}', [BlogShowController::class, 'show'])
    ->name('blog.show');



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::get('/user-profile', [UserProfileController::class, 'profile'])->name('user.profile');



// Route::get('/user-profile', [UserProfileController::class, 'profile'])
//         ->name('user.profile');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// Route::get('/blog/create', function () {
//     return view('blog.create');
// })->name('blog.create');


require __DIR__.'/auth.php';



