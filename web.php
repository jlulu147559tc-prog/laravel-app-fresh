<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Models\Post;

// Standard Pages
Route::view('/', 'welcome');
Route::view('/about', 'about');
Route::view('/contact', 'contact');

// Post Routes (Simplified)
Route::get('/posts', function() {
    return view('posts.index', ['posts' => Post::all()]);
});

// User Registration Routes (Pointing to the Controller)
Route::get('/register', [UserController::class, 'index'])->name('users.index');
Route::get('/register/create', [UserController::class, 'create'])->name('users.create');
Route::post('/register', [UserController::class, 'store'])->name('users.store');
Route::get('/register/show/{user}', [UserController::class, 'edit'])->name('users.edit');
Route::patch('/register/update/{user}', [UserController::class, 'update'])->name('users.update');
Route::delete('/register/delete/{user}', [UserController::class, 'destroy'])->name('users.destroy');