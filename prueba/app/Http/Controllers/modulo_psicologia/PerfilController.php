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
            'foto' => null, // https://www.bing.com/ck/a?!&&p=d0bd5b3755ec9c0e2ead8cde1e3ce9097eb283d432e00384cff234e9e99406f3JmltdHM9MTc2Njk2NjQwMA&ptn=3&ver=2&hsh=4&fclid=06ea9f92-2974-6627-1c22-899628cc6726&u=a1L2ltYWdlcy9zZWFyY2g_cT1pbWFnZW4rZGUrdW5hK211amVyJmlkPTQxODg5Mzg1NzkwQzVENTBGRDk3MTcwRjE4NUFDMzMxNEI3MDY1QUImRk9STT1JQUNGSVI&ntb=1
        ];

        return view('modulo_psicologia.perfil', compact('usuario'));
    }
}
