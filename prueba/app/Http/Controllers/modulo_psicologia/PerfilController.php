<?php

namespace App\Http\Controllers\modulo_psicologia;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PerfilController extends Controller
{
    public function index()
    {
        // Datos simulados para la vista previa
        $usuario = (object) [
            'nombre' => 'Laura M.',
            'cargo' => 'Docente',
            'foto' => null, // Se puede agregar una URL por defecto en la vista
        ];

        return view('modulo_psicologia.perfil', compact('usuario'));
    }
}
