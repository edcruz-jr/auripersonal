<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

//Controllers da Administração
use App\Http\Controllers\Admin\GenderController;

Route::get('/legal/terms', function () {
    return Inertia::render('TermsService');
})->name('terms');

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//Adicionando a rota para a página de administração
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/genders', [GenderController::class, 'index'])->name('genders.index');
    Route::post('/genders', [GenderController::class, 'store'])->name('genders.store');
    Route::put('/genders/{gender}', [GenderController::class, 'update'])->name('genders.update');
    Route::delete('/genders', [GenderController::class, 'destroy'])->name('genders.destroy');
});

require __DIR__.'/auth.php';
