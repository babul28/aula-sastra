<?php

use App\Http\Controllers\ArtworkPostController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn () => view('welcome'))->name('home');

Route::get('/about', fn () => view('pages.about'))->name('about');

Route::get('/submission', fn () => view('pages.submission'))->name('submission');

Route::get('/community', fn () => view('pages.community'))->name('community');

Route::get('/artworks', [ArtworkPostController::class, 'index'])->name('artworks.index');

Route::get('/artworks/{artwork:uuid}', [ArtworkPostController::class, 'show'])->name('artworks.show');

require __DIR__ . '/auth.php';
