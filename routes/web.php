<?php

use App\Http\Controllers\ArtworkPostController;
use App\Http\Controllers\NewsPostController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn () => view('welcome'))->name('home');

Route::get('/about', fn () => view('pages.about'))->name('about');

Route::get('/submission', fn () => view('pages.submission'))->name('submission');

Route::get('/community', fn () => view('pages.community'))->name('community');

Route::get('/artworks', [ArtworkPostController::class, 'index'])->name('artworks.index');

Route::get('/artworks/{post:uuid}', [ArtworkPostController::class, 'show'])->name('artworks.show');

Route::get('/news', [NewsPostController::class, 'index'])->name('news.index');

Route::get('/news/{post:uuid}', [NewsPostController::class, 'show'])->name('news.show');

require __DIR__ . '/auth.php';
