<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FruitController;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;

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

    // Fruit Management Routes
    Route::resource('fruits', FruitController::class);

    // Report Routes
    Route::get('/reports', [ReportController::class, 'index'])->name('reports.index');
    Route::get('/reports/category/{category}', [ReportController::class, 'filterByCategory'])->name('reports.filterByCategory');
    Route::get('/reports/availability/{status}', [ReportController::class, 'filterByAvailability'])->name('reports.filterByAvailability');
    Route::get('/reports/export-csv', [ReportController::class, 'exportCSV'])->name('reports.exportCSV');
    Route::get('/reports/export-available-csv', [ReportController::class, 'exportAvailableCSV'])->name('reports.exportAvailableCSV');
    Route::get('/reports/export-out-of-stock-csv', [ReportController::class, 'exportOutOfStockCSV'])->name('reports.exportOutOfStockCSV');
    Route::get('/reports/export-pdf', [ReportController::class, 'exportPDF'])->name('reports.exportPDF');
    Route::get('/reports/export-available-pdf', [ReportController::class, 'exportAvailablePDF'])->name('reports.exportAvailablePDF');
    Route::get('/reports/export-out-of-stock-pdf', [ReportController::class, 'exportOutOfStockPDF'])->name('reports.exportOutOfStockPDF');
});

require __DIR__.'/auth.php';
