<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->group(function () {
    Route::get("/", [AdminController::class, 'home'])->name('admin.home');
    Route::get("/crentes", [AdminController::class, 'crentes'])->name('admin.crentes');
    Route::get("/grupos", [AdminController::class, 'grupos'])->name('admin.grupos');
    Route::get("/grupos/{id}", [AdminController::class, 'grupo'])->name('admin.grupo');
    Route::get("/grupos/{id}/evento/{evento_id}", [AdminController::class, 'evento'])->name('admin.grupo.evento');
    Route::get("/eventos", [AdminController::class, 'eventos'])->name('admin.eventos');
    Route::get("/configuracoes", [AdminController::class, 'config'])->name('admin.config');
    Route::get("/crentes/novo", [AdminController::class, 'novoCrente'])->name('admin.crentes.novo');
});
