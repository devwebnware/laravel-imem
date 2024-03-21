<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\ExportDataController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    // Category CRUD
    Route::resource('categories', CategoryController::class);
    // Tags CRUD
    Route::resource('tags', TagController::class);
    // Listing CRUD
    Route::resource('listings', ListingController::class);
    Route::get('listings/data/export', [ListingController::class, 'export'])->name('listings.data.export');
    Route::get('listings/data/import', [ListingController::class, 'import'])->name('listings.data.import');
    Route::post('listings/data/handel/import', [ListingController::class, 'handelImport'])->name('listings.data.handel.import');
});

require __DIR__ . '/auth.php';
