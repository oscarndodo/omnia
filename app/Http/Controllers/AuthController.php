<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function index()
    {
        return view('welcome');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'telefone' => 'required|string|min:9',
            'password' => 'required|string|min:6',
        ]);

        $user = User::where('phone', $credentials['telefone'])->first();
        if ($user === null) {
            return redirect()->route('login')->withErrors(['error' => 'Credenciais inválidas.']);
        }

        Auth::attempt($credentials);
        if (Auth::check()) {
            return redirect()->route('admin.home');
        } else {
            return redirect()->route('login')->withErrors(['error' => 'Credenciais inválidas.']);
        }
    }


    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('auth.logout');
    }
}
