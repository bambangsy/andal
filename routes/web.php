<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/dashboard', [HomeController::class, 'index'])
    ->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard/{id}', [DashboardController::class, 'show'])
    ->middleware(['auth', 'verified'])->name('dashboard.show');

Route::get('/dashboard/company/{companyId}', [DashboardController::class, 'listByCompany'])
    ->middleware(['auth', 'verified'])->name('dashboard.listByCompany');

Route::get('/admin1', function () {
    return redirect('/admin');
})->middleware(['auth', 'verified'])->name('admin1');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
