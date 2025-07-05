<?php

use App\Http\Controllers\MenuController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
})->name('home');

//working on pages
Route::get('/pages', [PageController::class, 'index'])->name('pages.index');
Route::get('/pages/create', [PageController::class, 'create'])->name('pages.create');
Route::post('/pages', [PageController::class, 'store'])->name('pages.store');
Route::get('/pages/{id}/edit', [PageController::class, 'edit'])->name('pages.edit');
Route::put('/pages/{id}/update', [PageController::class, 'update'])->name('pages.update');
Route::delete('/pages/{id}/delete', [PageController::class, 'destroy'])->name('pages.destroy');


//working on menus
Route::get('/menus' , [MenuController::class , 'index'])->name('menus.index');
Route::get('/menus/create' , [MenuController::class, 'create'])->name('menus.create');
Route::post('/menus' , [MenuController::class, 'store'])->name('menus.store');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
