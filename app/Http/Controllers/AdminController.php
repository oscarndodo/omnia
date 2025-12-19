<?php

namespace App\Http\Controllers;

use App\Models\Congregacao;
use App\Models\Crente;
use App\Models\Evento;
use App\Models\Grupo;
use App\Models\Sector;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{

    public function index()
    {
        $users = User::orderByDesc('id')->paginate(10);
        $activos = User::where("status", true)->count();
        $inactivos = User::where("status", false)->count();

        $sectores = Sector::orderByDesc("id")->paginate();
        $congregacoes = Congregacao::orderByDesc("id")->paginate();

        foreach ($sectores as $item) {
            $item['lider'] = User::find($item->lider);
        }
        return view('admin.config', [
            'users' => $users,
            'activos' => $activos,
            'inactivos' => $inactivos,
            'sectores' => $sectores,
            'congregacoes' => $congregacoes
        ]);
    }
    public function home()
    {
        return view('admin.home');
    }


    public function crentes()
    {
        $crentes = Crente::orderByDesc('id')->paginate();
        return view('admin.crentes', ['crentes' => $crentes]);
    }
    public function novoCrente(Request $request)
    {
        if ($request->method() == "GET") {
            $grupos = Grupo::all();
            return view('admin.crente-novo', ['grupos' => $grupos]);
        }

        $data = $request->all();
        // dd($data);
        $grupo = Grupo::find($data['grupo']);
        if ($grupo == null) {
            return Redirect::back()->withErrors(['error' => "Grupo familiar inválido!"]);
        }
        $grupo->crentes()->create($data);
        return Redirect::route('admin.crentes')->withErrors(['success' => "Crente criado com sucesso!"]);
    }


    public function grupos()
    {
        $users = User::all();
        $congregacoes = Congregacao::all();
        $grupos = Grupo::orderByDesc('id')->paginate();

        foreach ($grupos as $item) {
            $item['lider'] = User::find($item->lider);
            $item['congregacao'] = Congregacao::find($item->congregacao_id);
        }

        return view('admin.grupos', [
            'users' => $users,
            'congregacoes' => $congregacoes,
            'grupos' => $grupos
        ]);
    }

    public function novoGrupo(Request $request)
    {
        $data = $request->validate([
            "nome" => "required",
            "lider" => "required",
            "congregacao" => "required",
            "endereco" => "required"
        ]);

        $user = User::find($data['lider']);
        $data['lider'] = $user['id'];

        $congregacao = Congregacao::find($data['congregacao']);
        if ($congregacao == null) {
            return Redirect::back()->withErrors(['error' => "Congregação invalida!"]);
        }
        $lider = User::find($data['lider']);
        if ($lider == null) {
            return Redirect::back()->withErrors(['error' => "Líder invalido!"]);
        }
        $congregacao->grupos()->create($data);

        return Redirect::back()->withErrors(['success' => "Sector criado com sucesso!"]);
    }

        public function novoEvento(Request $request)
        {
            $data = $request->validate([
                "grupo_id" => "required",
                "titulo" => "required|string",
                "data" => "required|date",
                "descricao" => "nullable|string",
                "local" => "nullable|string",
                "tipo" => "nullable|string",
                "inicio" => "nullable|string",
                "termino" => "nullable|string",
            ]);

            
            $grupo = Grupo::find($data['grupo_id']);
            if ($grupo == null) {
                return Redirect::back()->withErrors(['error' => "Grupo familiar inválido!"]);
            }
            $grupo->eventos()->create($data);
            return Redirect::back()->withErrors(['success' => "Evento criado com sucesso!"]);
        }

    public function grupo($id)
    {
        $grupo = Grupo::findOrFail($id);
        if ($grupo == null) {
            return Redirect::back()->withErrors(['error' => "Grupo familiar inválido!"]);
        }
        return view('admin.grupo.home', ['grupo' => $grupo]);
    }

    public function evento($id, $evento_id)
    {
        return view('admin.grupo.evento');
    }

    public function eventos()
    {
        $eventos = Evento::orderByDesc('id')->paginate();
        return view('admin.eventos', ['eventos' => $eventos]);
    }

    public function batizados()
    {
        $batizados = Crente::where("batizado", true)->orderByDesc('id')->paginate();
        return view('admin.batizados', ['batizados' => $batizados]);
    }

    public function dizimistas()
    {
        return view('admin.dizimistas');
    }

    public function config()
    {
        $users = User::orderByDesc('id')->paginate(10);
        $activos = User::where("status", true)->count();
        $inactivos = User::where("status", false)->count();

        $sectores = Sector::orderByDesc("id")->paginate();
        $congregacoes = Congregacao::orderByDesc("id")->paginate();

        foreach ($sectores as $item) {
            $item['lider'] = User::find($item->lider);
        }
        return view('admin.config', [
            'users' => $users,
            'activos' => $activos,
            'inactivos' => $inactivos,
            'sectores' => $sectores,
            'congregacoes' => $congregacoes
        ]);
    }

    public function novoUsuario(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|min:3',
            'phone' => 'nullable|string|min:9',
            'role' => 'required|string'
        ]);

        $data['password'] = "123456"; // Default password, should be changed later

        User::class::create($data);
        return Redirect::route('admin.config');
    }
    public function usuarioStatus($id)
    {
        $user = User::findOrFail($id);
        $user->status = !$user->status;
        $user->save();

        return Redirect::route('admin.config');
    }

    public function novoSector(Request $request)
    {
        $data = $request->validate([
            "nome" => "required",
            "lider" => "required"
        ]);
        $user = User::find($data['lider']);
        $data['lider'] = $user['id'];

        Sector::create($data);
        return Redirect::back()->withErrors(['success' => "Sector criado com sucesso!"]);
    }

    public function novaCongregacao(Request $request)
    {
        $data = $request->all();

        $sector = Sector::find($data['sector_id']);
        if ($sector == null) return Redirect::back()->withErrors(['error' => "Sector invalido!"]);
        $congregacao = $sector->congregacoes()->create($data);
        return Redirect::back()->withErrors(['success' => "Sector criado com sucesso!"]);
    }
}
