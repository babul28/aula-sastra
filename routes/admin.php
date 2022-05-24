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
    Route::post('/', [Admin\ArtworkController::class, 'store'])->name('store');

    Route::get('/{artwork:uuid}/edit', [Admin\ArtworkController::class, 'edit'])->name('edit');
    Route::put('/{artwork:uuid}', [Admin\ArtworkController::class, 'update'])->name('update');
});
