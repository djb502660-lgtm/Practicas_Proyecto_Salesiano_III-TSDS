<?php

namespace App\Http\Controllers\Modulo_educador;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PerfilController extends Controller
{
    public function index()
    {
        $usuario = \App\Models\Modulo_educador\Perfil::where('user_id', auth()->id())->first();

        // Si no existe el perfil, podemos crear uno básico o pasar los datos del usuario
        if (!$usuario) {
            $usuario = (object) [
                'nombre' => auth()->user()->name,
                'cargo' => 'Educador',
                'foto' => null,
                'total_ninos' => 0,
            ];
        }

        return view('modulo_educador.perfil', compact('usuario'));
    }
}
