<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ShowItemController;
use App\Http\Controllers\CreateItemController;
use App\Http\Controllers\EditItemController;
use App\Http\Controllers\DeleteItemController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PageController;


Auth::routes();

Route::get('/', [App\Http\Controllers\PageController::class, 'home'])->name('home');
Route::get('/about', [App\Http\Controllers\PageController::class, 'about'])->name('about');

Route::get('/index', [App\Http\Controllers\ItemController::class, 'index'])->name('index');
Route::get('/show/{item:slug}', [ShowItemController::class, 'show'])->name('show');
Route::get('/contact/{item:slug}', [ContactController::class, 'contact'])->name('contact');

Route::middleware(['auth'])->group( function () {
    Route::get('/create', [CreateItemController::class, 'new'])->name('new');
    Route::post('/create', [CreateItemController::class, 'create']);

    Route::get('/edit/{item:slug}', [EditItemController::class, 'edit'])->name('edit');
    Route::put('/edit/{item:slug}', [EditItemController::class, 'update'])->name('update');

    Route::delete('/delete/{item:slug}', [DeleteItemController::class, 'delete']);
    
    Route::get('images/create/{item:slug}', [ImageController::class, 'createImage'])->name('createImage'); 
    Route::post('images/create/{item:slug}', [ImageController::class, 'store']); 
    Route::delete('images/delete/{image}', [ImageController::class, 'delete']);

    Route::get('/profile/{user}', [ProfileController::class, 'profile'])->name('profile');
});

// Route::middleware(['auth', 'admin'])->group( function () {
//     SOME ROUTE ONLY FOR ADMIN
// });
