<?php

use Illuminate\Support\Facades\Route;

Route::get('/', fn () => view('welcome'))->name('home');

Route::get('/about', fn () => view('pages.about'))->name('about');

Route::get('/submission', fn () => view('pages.submission'))->name('submission');

Route::get('/community', fn () => view('pages.community'))->name('community');

require __DIR__ . '/auth.php';
