<?php

namespace App\Models\modulo_psicologia;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
    use HasFactory;

    protected $table = 'perfil_psicologo';

    protected $fillable = [
        'nombre',
        'cargo',
        'foto',
        'email',
        'telefono',
        'descripcion_puesto',
    ];
}
