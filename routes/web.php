<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PageController;


Auth::routes();

Route::get('/', [App\Http\Controllers\PageController::class, 'home'])->name('home');
Route::get('/about', [App\Http\Controllers\PageController::class, 'about'])->name('about');

Route::get('/index', [App\Http\Controllers\ItemController::class, 'index'])->name('index');
Route::get('/show/{item:slug}', [ItemController::class, 'show'])->name('show');
Route::get('/contact/{item:slug}', [ContactController::class, 'contact'])->name('contact');

Route::middleware(['auth'])->group( function () {
    Route::get('/create', [ItemController::class, 'new'])->name('new');
    Route::post('/create', [ItemController::class, 'create']);

    Route::get('/edit/{item:slug}', [ItemController::class, 'edit'])->name('edit');
    Route::put('/edit/{item:slug}', [ItemController::class, 'update'])->name('update');

    Route::delete('/delete/{item:slug}', [ItemController::class, 'delete']);
    
    Route::get('images/create/{item:slug}', [ImageController::class, 'createImage'])->name('createImage'); 
    Route::post('images/create/{item:slug}', [ImageController::class, 'store']); 
    Route::delete('images/delete/{image}', [ImageController::class, 'delete']);

    Route::get('/profile/{user}', [ProfileController::class, 'profile'])->name('profile');
});

// Route::middleware(['auth', 'admin'])->group( function () {
//     SOME ROUTE ONLY FOR ADMIN
// });
