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


Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'home'])->name('home');

Route::get('/index', [App\Http\Controllers\ItemController::class, 'index'])->name('index');
Route::get('/show/{item}', [ShowItemController::class, 'show'])->name('show');
Route::get('/contact/{item}', [ContactController::class, 'contact'])->name('contact');

Route::middleware(['auth'])->group( function () {
    Route::get('/create', [CreateItemController::class, 'new'])->name('new');
    Route::post('/create', [CreateItemController::class, 'create']);

    Route::get('/edit/{item}', [EditItemController::class, 'edit'])->name('edit');
    Route::put('/edit/{item}', [EditItemController::class, 'update']);

    Route::delete('/delete/{item}', [DeleteItemController::class, 'delete']);
    
    Route::get('images/create/{item}', [ImageController::class, 'createImage'])->name('createImage'); 
    Route::post('images/create/{item}', [ImageController::class, 'store']); 
    Route::delete('images/delete/{image}', [ImageController::class, 'delete']);

    Route::get('/profile/{user}', [ProfileController::class, 'profile'])->name('profile');
});

// Route::middleware(['auth', 'admin'])->group( function () {
//     SOME ROUTE ONLY FOR ADMIN
// });