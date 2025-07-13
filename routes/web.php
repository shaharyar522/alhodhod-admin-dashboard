<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ArticleImageController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ContactMessageController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\MetatagController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;
use App\Models\ContactMessage;
use Illuminate\Support\Facades\Route;
use Mockery\Generator\Method;

Route::get('/', function () {
    return view('dashboard');
})->name('home');

//note that es ko maain resource controller say bhi kr satka tha laken uay apni calarification k leuy 
 //seprate route ko banaya hian  


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
Route::get('/menus/{id}/edit', [MenuController::class, 'edit'])->name('menus.edit');
Route::put('/menus/{id}/update', [MenuController::class, 'update'])->name('menus.update');
Route::delete('/menus/{id}/delete', [MenuController::class, 'destroy'])->name('menus.destroy');

//working on articles
Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');
Route::get('/articles/create', [ArticleController::class, 'create'])->name('articles.create');
Route::post('/articles', [ArticleController::class, 'store'])->name('articles.store');
Route::get('/articles/{id}/edit', [ArticleController::class, 'edit'])->name('articles.edit');
Route::put('/articles/{id}/update', [ArticleController::class, 'update'])->name('articles.update');
Route::delete('/articles/{id}', [ArticleController::class, 'destroy'])->name('articles.destroy');
Route::get('/articles/{id}/show', [ArticleController::class, 'show'])->name('articles.show');


//working on artilce images
Route::get('/articleimage', [ArticleImageController::class, 'index'])->name('articleimage.index');
Route::get('/articleimage/create', [ArticleImageController::class, 'create'])->name('articleimage.create');
Route::post('/articleimage', [ArticleImageController::class, 'store'])->name('articleimage.store');
Route::get('/articleimage/{id}/edit', [ArticleImageController::class, 'edit'])->name('articleimage.edit');
Route::put('/articleimage/{id}/update', [ArticleImageController::class, 'update'])->name('articleimage.update');
Route::delete('/articleimage/{id}', [ArticleImageController::class, 'destroy'])->name('articleimage.destroy');



//wrok on contact 
Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::post('/contacts/store', [ContactController::class, 'store'])->name('contacts.store');

//work on contact message  contact_message.index'
Route::get('/ContactMessage',[ContactMessageController::class, 'index'])->name('contact_message.index');


//work on meta tag
Route::get('/Metatag',[MetatagController::class, 'index'])->name('metatag.index');
Route::get('/Metatag/Create', [MetatagController::class, 'create'])->name('metatag.create');
Route::post('/Metatag', [MetatagController::class, 'store'])->name('metatag.store');
Route::get('/Metatag/{id}/edit', [MetatagController::class, 'edit'])->name('metatag.edit');
Route::put('/Metatag/{id}/update', [MetatagController::class, 'update'])->name('metatag.update');
Route::delete('/Metatag/{id}/delete',[MetatagController::class, 'destroy'])->name('metatag.destroy');








Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
