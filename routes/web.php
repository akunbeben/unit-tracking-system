<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::middleware(['auth'])->group(function () {
    
    Route::get('/', fn () => view('home'))->name('home');

    Route::name('unit.')->prefix('units')->group(function () {
        Route::get('/', [\App\Http\Controllers\UnitController::class, 'index'])->name('list');
        Route::get('/create', [\App\Http\Controllers\UnitController::class, 'create'])->name('create');
        Route::post('/create', [\App\Http\Controllers\UnitController::class, 'store'])->name('store');
        Route::get('/{id}/track', [\App\Http\Controllers\LocationController::class, 'index'])->name('track');
        Route::get('/{id}/edit', [\App\Http\Controllers\UnitController::class, 'edit'])->name('edit');
        Route::put('/{id}/edit', [\App\Http\Controllers\UnitController::class, 'update'])->name('update');
        Route::delete('/{id}/delete', [\App\Http\Controllers\UnitController::class, 'destroy'])->name('delete');
    });

    Route::name('owner.')->prefix('owners')->group(function () {
        Route::get('/', [\App\Http\Controllers\OwnerController::class, 'index'])->name('list');
        Route::get('/create', [\App\Http\Controllers\OwnerController::class, 'create'])->name('create');
        Route::post('/create', [\App\Http\Controllers\OwnerController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [\App\Http\Controllers\OwnerController::class, 'edit'])->name('edit');
        Route::put('/{id}/edit', [\App\Http\Controllers\OwnerController::class, 'update'])->name('update');
        Route::delete('/{id}/delete', [\App\Http\Controllers\OwnerController::class, 'destroy'])->name('delete');
    });
});
