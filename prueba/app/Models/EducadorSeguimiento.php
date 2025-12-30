<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EducadorSeguimiento extends Model
{
    use HasFactory;

    protected $table = 'educador_seguimientos';

    protected $fillable = [
        'destinatario_id',
        'tipo',
        'fecha_registro',
        'observacion',
        'acuerdos',
        'riesgo_detectado',
        'nivel_riesgo',
        'user_id',
    ];

    protected function casts(): array
    {
        return [
            'fecha_registro' => 'date',
            'riesgo_detectado' => 'boolean',
        ];
    }

    public function destinatario(): BelongsTo
    {
        return $this->belongsTo(Destinatario::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function getTipoLabelAttribute(): string
    {
        return match ($this->tipo) {
            'academico' => 'Académico',
            'convivencial' => 'Convivencial',
            'disciplinario' => 'Disciplinario',
            default => ucfirst($this->tipo),
        };
    }

    public function getNivelRiesgoLabelAttribute(): string
    {
        return match ($this->nivel_riesgo) {
            'bajo' => 'Bajo',
            'medio' => 'Medio',
            'alto' => 'Alto',
            default => 'Sin Clasificar',
        };
    }

    public function getNivelRiesgoColorAttribute(): string
    {
        return match ($this->nivel_riesgo) {
            'bajo' => '#28a745',
            'medio' => '#ffc107',
            'alto' => '#dc3545',
            default => '#6c757d',
        };
    }
}
