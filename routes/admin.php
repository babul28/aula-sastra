<?php

use App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Route;

Route::get('/', [Admin\DashboardController::class, '__invoke'])->name('dashboard');

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

Route::group([
    'prefix' => '/news',
    'as' => 'news.'
], function () {
    Route::get('/', [Admin\NewsController::class, 'index'])->name('index');

    Route::get('/create', [Admin\NewsController::class, 'create'])->name('create');
    Route::post('/', [Admin\NewsController::class, 'store'])->name('store');

    Route::get('/{news:uuid}/edit', [Admin\NewsController::class, 'edit'])->name('edit');
    Route::put('/{news:uuid}', [Admin\NewsController::class, 'update'])->name('update');
});
