<?php

use App\Http\Controllers\PeriodController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome'); });

Route::middleware(['auth', 'verified'])->group(function () {
    // Redirect standard dashboard to our tracker
    Route::get('/dashboard', function () {
        return redirect()->route('periods.index'); })->name('dashboard');

    Route::resource('periods', PeriodController::class);

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
