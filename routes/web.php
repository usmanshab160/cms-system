<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\BlogShowController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\SitemapController;
use App\Http\Controllers\MediaController;

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

// Route::get('/blog-create', function () {
//     return view('create');
// })->name('blog.create');

// Route::get('/blog-create', [BlogController::class, 'create'])
//     ->name('blog.create');

// Route::get('/create', function () {
//     return view('create');
// })->name('blog.create');

Route::get('/blog-create', [MediaController::class, 'index'])
    ->name('blog.create');

    
Route::post('/blog-create/store', [BlogController::class, 'store'])
    ->name('blog.store');
Route::get('/blogs', [BlogShowController::class, 'blogs']) ->name('blogs');

Route::get('/blog/{slug}', [BlogShowController::class, 'show'])
    ->name('blog.show');



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


// Route::get('/user-profile', [UserProfileController::class, 'profile'])->name('user.profile');



// Route::get('/user-profile', [UserProfileController::class, 'profile'])
//         ->name('user.profile');
// Route::get('/edit-profile', function () {
//     return view('edit-profile');
// });

Route::middleware('auth')->group(function () {

    Route::get('/edit-profile', [UserProfileController::class, 'editUserForm'])
        ->name('edit-profile.edit');

    Route::put('/edit-profile/update', [UserProfileController::class, 'updateUserForm'])
        ->name('edit-profile.update');

    Route::delete('/edit-profile/delete', [UserProfileController::class, 'destroyUserForm'])
        ->name('edit-profile.delete');

    Route::get('/user-profile', [UserProfileController::class, 'profile'])->name('user.profile');

    Route::delete('/articles/{article}', [UserProfileController::class, 'destroyArticle'])
        ->name('articles.destroy');

    Route::get('/blogs/{id}/edit', [UserProfileController::class, 'editBlog'])
        ->name('blogs.edit');

    Route::put('/blogs/{id}', [UserProfileController::class, 'updateBlog'])
        ->name('blogs.update');
});

// Site-map
Route::get('/sitemap.xml', [SitemapController::class, 'index'])
    ->name('sitemap');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });


// Route::get('/blog/create', function () {
//     return view('blog.create');
// })->name('blog.create');


require __DIR__.'/auth.php';



