<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class NutritionalRecord extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'recorder_id',
        'weight_kg',
        'height_cm',
        'imc',
        'classification',
        'record_date',
    ];

    protected $casts = [
        'record_date' => 'date',
    ];

    /**
     * Obtiene el estudiante al que pertenece el registro.
     */
    public function student(): BelongsTo
    {
        return $this->belongsTo(User::class, 'student_id');
    }

    /**
     * Obtiene el personal que realizó el registro.
     */
    public function recorder(): BelongsTo
    {
        return $this->belongsTo(User::class, 'recorder_id');
    }
}

