<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InstitucionEducativa extends Model
{
    use HasFactory;

    protected $table = 'instituciones_educativas';

    protected $fillable = ['nombre'];
}
