<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;


Route::get('/', function () {
    return view('welcome');
});

Route::post('/', [FormController::class, 'store'])->name('form.store');

Route::get('/listcompanies', [FormController::class, 'getStore'])->name('form.getStore');


