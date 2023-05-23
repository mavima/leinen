<?php

use App\Http\Controllers\ImageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;



Route::get('/', function () {
    return view('home');
});


Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'home'])->name('home');

Route::get('/index', [App\Http\Controllers\ItemController::class, 'index'])->name('index');
Route::post('/index', [App\Http\Controllers\ItemController::class, 'index'])->name('filter');
Route::get('/create', [ItemController::class, 'new'])->name('new');
Route::post('/create', [ItemController::class, 'create']);
Route::get('/show/{item}', [ItemController::class, 'show'])->name('show');
Route::get('/edit/{item}', [ItemController::class, 'edit'])->name('edit');
Route::put('/edit/{item}', [ItemController::class, 'update']);
Route::delete('/delete/{item}', [ItemController::class, 'delete']);

Route::get('images/create/{item}', [ImageController::class, 'createImage'])->name('createImage'); 
Route::post('images/create/{item}', [ImageController::class, 'store']); 
Route::delete('images/delete/{image}', [ImageController::class, 'delete']);
