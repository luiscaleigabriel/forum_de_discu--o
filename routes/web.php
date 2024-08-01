<?php

use App\Http\Controllers\Admin\SupportController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/support', [SupportController::class, 'index'])->name('support.index');

// Route::get('/support/create', [SupportController::class, 'create'])->name('support.create');

// Route::post('/support/create', [SupportController::class, 'store'])->name('support.store');

// Route::get('/support/{id}/details', [SupportController::class, 'show'])->name('support.show');

// Route::get('/support/{id}/edit', [SupportController::class, 'edit'])->name('support.edit');

// Route::put('/support/{id}/update', [SupportController::class, 'update'])->name('support.update');

// Route::delete('/support/{id}/delete', [SupportController::class, 'destroy'])->name('support.destroy');
