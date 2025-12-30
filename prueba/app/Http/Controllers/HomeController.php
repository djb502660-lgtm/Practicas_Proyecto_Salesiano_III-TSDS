<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $stats = [
            'users' => \App\Models\User::count(),
            'destinatarios' => \App\Models\Destinatario::count(),
            'mediciones' => \App\Models\Medicion::count(),
            'psicologia' => \App\Models\Psicologia::count(),
            'educador' => \App\Models\EducadorSeguimiento::count(),
        ];

        return view('home.home', compact('stats'));
    }
}
