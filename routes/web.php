<?php

use App\Http\Controllers\PeriodController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome'); });

Route::middleware(['auth', 'verified'])->group(function () {
    // Redirect standard dashboard to our tracker
    Route::get('/dashboard', function () {
        return redirect()->route('periods.index'); })->name('dashboard');

    Route::resource('periods', PeriodController::class);
});

require __DIR__ . '/auth.php';
