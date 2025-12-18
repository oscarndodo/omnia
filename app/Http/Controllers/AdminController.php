<?php

namespace App\Http\Controllers;

use App\Models\Crente;
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
        return view('admin.config', compact('users'));
    }

    public function novoUsuario(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'nullable|string|max:20',
            'role' => 'required|string|in:Admin,Provincia,Pastor,Lider'
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
}
