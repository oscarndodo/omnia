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
    Route::get("/crentes/{id}/perfil", [AdminController::class, 'perfil'])->name('admin.crentes.perfil');
    Route::get("/crentes/novo", [AdminController::class, 'novoCrente'])->name('admin.crentes.novo');
    Route::post("/crentes/novo", [AdminController::class, 'novoCrente'])->name('admin.crentes.novo');

    Route::get("/grupos", [AdminController::class, 'grupos'])->name('admin.grupos');
    Route::post('/novo/grupo', [AdminController::class, 'novoGrupo'])->name('admin.grupos.novo');
    Route::post('/novo/evento', [AdminController::class, 'novoEvento'])->name('admin.grupos.evento');
    Route::get("/grupos/{id}", [AdminController::class, 'grupo'])->name('admin.grupo');
    Route::post("/grupos/{id}/adicionar/crente", [AdminController::class, 'addCrente'])->name('admin.grupo.crente');
    Route::get("/grupos/{id}/evento/{evento_id}", [AdminController::class, 'evento'])->name('admin.grupo.evento');
    Route::get("/grupos/{id}/evento/{evento_id}/remover", [AdminController::class, 'eventoDelete'])->name('admin.grupo.evento.delete');
    Route::get("/grupos/{id}/evento/{evento_id}/presenca/{crente_id}", [AdminController::class, 'marcarPresenca'])->name('admin.grupo.evento.presenca');
    Route::post("/grupos/{id}/evento/{evento_id}/oferta", [AdminController::class, 'oferta'])->name('admin.grupo.evento.oferta');
    Route::get("/grupos/{id}/evento/{evento_id}/oferta/{oferta_id}/eliminar", [AdminController::class, 'ofertaDelete'])->name('admin.grupo.evento.oferta.delete');
    Route::post("/grupos/{id}/evento/{evento_id}/visita", [AdminController::class, 'visita'])->name('admin.grupo.evento.visita');

    Route::get("/eventos", [AdminController::class, 'eventos'])->name('admin.eventos');

    Route::get("/batizados", [AdminController::class, 'batizados'])->name('admin.batizados');

    Route::get("/dizimistas", [AdminController::class, 'dizimistas'])->name('admin.dizimistas');

    Route::prefix("configuracoes")->group(function () {
        Route::get("/", [AdminController::class, 'config'])->name('admin.config');
        Route::post("/novo/usuario", [AdminController::class, 'novoUsuario'])->name('admin.config.user');
        Route::get("/novo/usuario/{id}/status", [AdminController::class, 'usuarioStatus'])->name('admin.config.user.status');

        Route::post("/novo/sector", [AdminController::class, "novoSector"])->name("admin.sector.novo");

        Route::post("nova/congregacao", [AdminController::class, "novaCongregacao"])->name("admin.congregacao.novo");
    });
});
