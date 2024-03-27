<?php

use App\Http\Controllers\AjaxController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RequerimientosController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('/');
Route::resource('requerimientos', RequerimientosController::class)->names('requerimientos')->middleware('auth')->except(['store']);
Route::post('requerimientos', [RequerimientosController::class, 'store'])->name('requerimientos.store');
Route::get('ajax/requerimientos', [AjaxController::class, 'requerimientos'])->name('ajax.requerimientos');
Route::post('ajax/personales', [AjaxController::class, 'personales'])->name('ajax.personales');
Route::resource('login', LoginController::class)->names('login');