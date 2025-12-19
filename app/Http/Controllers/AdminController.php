<?php

namespace App\Http\Controllers;

use App\Models\Congregacao;
use App\Models\Crente;
use App\Models\Sector;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{

    public function index()
    {
        return Redirect::route('admin.home');
    }
    public function home()
    {
        return view('admin.home');
    }


    public function crentes()
    {
        return view('admin.crentes');
    }
    public function novoCrente(Request $request)
    {
        if ($request->method() == "GET") {
            return view('admin.crente-novo');
        }

        $data = $request->all();
        $crente = Crente::create($data);
        return Redirect::route('admin.crentes');
    }


    public function grupos()
    {
        return view('admin.grupos');
    }

    public function grupo($id)
    {
        return view('admin.grupo.home', ['id' => $id]);
    }

    public function evento($id, $evento_id)
    {
        return view('admin.grupo.evento');
    }

    public function eventos()
    {
        return view('admin.eventos');
    }

    public function batizados()
    {
        return view('admin.batizados');
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
