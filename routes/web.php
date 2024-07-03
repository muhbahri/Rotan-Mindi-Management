<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\InventarisController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StokController;
use App\Http\Controllers\SubkontraktorController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('inventaris.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/view_order', [HomeController::class, 'view_order']);
Route::get('/view_addorder', [HomeController::class, 'view_addorder']);
Route::post('add_order', [HomeController::class, 'add_order']);
Route::get('/edit_order/{id}', [HomeController::class, 'edit_order']);
Route::post('/update_order/{id}', [HomeController::class, 'update_order']);
Route::get('/delete_order/{id}', [HomeController::class, 'delete_order']);

Route::get('/show_order', [InventarisController::class, 'view_order']);


Route::resource('subkontraktor', SubkontraktorController::class);
Route::resource('stok', StokController::class);

require __DIR__.'/auth.php';

Route::resource('manager/dashboard', HomeController::class)->middleware(['auth','manager']);

