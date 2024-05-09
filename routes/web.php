<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\CustomerController;

Route::get('/', function () {
    return Inertia::render('home');
});



Route::get('customers/create', [CustomerController::class, 'create']);
Route::get('customers', [CustomerController::class, 'index'])->name('customers.index');
Route::post('customers',[CustomerController::class, 'store']);
Route::delete('customers/{customer}', [CustomerController::class, "destroy"]);
Route::get('customers/{customer}/edit', [CustomerController::class, "edit"]);
Route::put('customers/{customer}', [CustomerController::class, 'update']);

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
