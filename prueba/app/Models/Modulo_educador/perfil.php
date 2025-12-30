<?php

namespace App\Models\Modulo_educador;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
    use HasFactory;

    protected $table = 'perfil_educador';

    protected $fillable = [
        'user_id',
        'nombre',
        'cargo',
        'foto',
        'email',
        'telefono',
        'descripcion_puesto',
        'total_ninos',
    ];
}
