<?php

use App\Http\Controllers\Admin\SupportController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/support', [SupportController::class, 'index'])->name('support.index');

Route::get('/support/create', [SupportController::class, 'create'])->name('support.create');

Route::post('/support/create', [SupportController::class, 'store'])->name('support.store');

Route::get('/support/{id}/details', [SupportController::class, 'show'])->name('support.show');
