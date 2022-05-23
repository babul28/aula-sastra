<?php

use App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Route;

Route::get('/', fn () => view('admin.dashboard'))->name('dashboard');

Route::group([
    'prefix' => '/artworks',
    'as' => 'artworks.'
], function () {
    Route::get('/', [Admin\ArtworkController::class, 'index'])->name('index');

    Route::get('/create', [Admin\ArtworkController::class, 'create'])->name('create');
});
