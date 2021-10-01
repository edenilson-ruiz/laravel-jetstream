<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function index_view ()
    {
        return view('usuarios.index', [
            'usuario' => Usuario::class
        ]);
    }
}
