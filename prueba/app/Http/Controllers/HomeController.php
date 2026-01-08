<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        if (auth()->guest()) {
            return view('landing');
        }

        $stats = [
            'users' => \App\Models\User::count(),
            'destinatarios' => \App\Models\Destinatario::count(),
            'mediciones' => \App\Models\Medicion::count(),
            'psicologia' => \App\Models\Psicologia::count(),
        ];

        return view('home.home', compact('stats'));
    }
}
