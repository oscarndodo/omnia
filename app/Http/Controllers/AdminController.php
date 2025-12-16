<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function home()
    {
        return view('admin.home');
    }


    public function crentes()
    {
        return view('admin.crentes');
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

    public function config()
    {
        return view('admin.config');
    }

    public function novoCrente()
    {
        return view('admin.crente-novo');
    }
}
