<?php

use App\Http\Controllers\PeriodController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome'); });

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [PeriodController::class, 'index'])->name('dashboard');

    Route::resource('periods', PeriodController::class);

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
