<?php

use App\Http\Controllers\AgendaController;
use App\Http\Controllers\Admin\AgendaController as AdminAgendaController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PostController as AdminPostController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

Route::get('/', HomeController::class)->name('home');

Route::get('/berita', [PostController::class, 'index'])->name('posts.index');
Route::get('/berita/{post:slug}', [PostController::class, 'show'])->name('posts.show');

Route::get('/agenda', [AgendaController::class, 'index'])->name('agendas.index');

Route::get('/galeri', [\App\Http\Controllers\GalleryController::class, 'index'])->name('galleries.index');
Route::get('/galeri/{slug}', [\App\Http\Controllers\GalleryController::class, 'show'])->name('galleries.show');

// Dynamic Generic Entities (List and Detail)
Route::get('/{type}', [\App\Http\Controllers\DetailController::class, 'index'])
    ->where('type', 'program|fasilitas|ekskul|guru|staff')
    ->name('generic.index');

Route::get('/{type}/{id}', [\App\Http\Controllers\DetailController::class, 'show'])
    ->where('type', 'program|fasilitas|ekskul|guru|staff')
    ->name('generic.show');

// Dynamic Page Route (Catch-all for single segments)
Route::get('/{page}', [PageController::class, 'show'])->name('pages.show');

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
| Filament handles all admin CRUD requests at /admin.
|--------------------------------------------------------------------------
*/

