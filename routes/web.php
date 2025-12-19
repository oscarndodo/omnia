<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});


Route::get('auth', [AuthController::class, 'index'])->name('login');
Route::post('auth/login', [AuthController::class, 'login'])->name('auth.login');
Route::get('auth/logout', [AuthController::class, 'logout'])->name('auth.logout');

Route::prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');
    Route::get("/home", [AdminController::class, 'home'])->name('admin.home');

    Route::get("/crentes", [AdminController::class, 'crentes'])->name('admin.crentes');
    Route::get("/crentes/novo", [AdminController::class, 'novoCrente'])->name('admin.crentes.novo');
    Route::post("/crentes/novo", [AdminController::class, 'novoCrente'])->name('admin.crentes.novo');

    Route::get("/grupos", [AdminController::class, 'grupos'])->name('admin.grupos');
    Route::get("/grupos/{id}", [AdminController::class, 'grupo'])->name('admin.grupo');
    Route::get("/grupos/{id}/evento/{evento_id}", [AdminController::class, 'evento'])->name('admin.grupo.evento');

    Route::get("/eventos", [AdminController::class, 'eventos'])->name('admin.eventos');

    Route::get("/batizados", [AdminController::class, 'batizados'])->name('admin.batizados');

    Route::get("/dizimistas", [AdminController::class, 'dizimistas'])->name('admin.dizimistas');

    Route::prefix("configuracoes")->group(function() {
        Route::get("/", [AdminController::class, 'config'])->name('admin.config');
        Route::post("/novo/usuario", [AdminController::class, 'novoUsuario'])->name('admin.config.user');
        Route::get("/novo/usuario/{id}/status", [AdminController::class, 'usuarioStatus'])->name('admin.config.user.status');
        
        Route::post("/novo/sector", [AdminController::class, "novoSector"])->name("admin.sector.novo");

        Route::post("nova/congregacao", [AdminController::class, "novaCongregacao"])->name("admin.congregacao.novo");
    });
});
