<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PsychologicalRecord extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'psychologist_id',
        'evaluation_date',
        'reason',
        'evaluation_details',
        'recommendations',
        'risk_level',
    ];

    protected $casts = [
        'evaluation_date' => 'date',
    ];

    /**
     * Obtiene el estudiante al que pertenece el registro.
     */
    public function student(): BelongsTo
    {
        return $this->belongsTo(User::class, 'student_id');
    }

    /**
     * Obtiene el psicólogo que realizó el registro.
     */
    public function psychologist(): BelongsTo
    {
        return $this->belongsTo(User::class, 'psychologist_id');
    }
}

