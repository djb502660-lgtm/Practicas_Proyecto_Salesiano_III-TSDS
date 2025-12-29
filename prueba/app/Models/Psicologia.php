<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Psicologia extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'psicologias';

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'destinatario_id',
        'tipo',
        'fecha_registro',
        'estado_emocional',
        'conducta',
        'diagnostico_inicial',
        'evolucion',
        'observaciones',
        'riesgo_detectado',
        'nivel_riesgo',
        'alerta_generada',
        'user_id',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'fecha_registro' => 'date',
            'riesgo_detectado' => 'boolean',
            'alerta_generada' => 'boolean',
        ];
    }

    /**
     * Get the destinatario that owns the record.
     */
    public function destinatario(): BelongsTo
    {
        return $this->belongsTo(Destinatario::class);
    }

    /**
     * Get the user that registered the record.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the alerts for the record.
     */
    public function alertas(): HasMany
    {
        return $this->hasMany(PsicologiaAlerta::class);
    }

    /**
     * Human friendly label for tipo.
     */
    public function getTipoLabelAttribute(): string
    {
        return match ($this->tipo) {
            'evaluacion' => 'Evaluacion',
            'seguimiento' => 'Seguimiento',
            default => 'Registro',
        };
    }

    /**
     * Get the label for the risk level.
     */
    public function getNivelRiesgoLabelAttribute(): string
    {
        return match ($this->nivel_riesgo) {
            'bajo' => 'Bajo',
            'medio' => 'Medio',
            'alto' => 'Alto',
            default => 'Sin Clasificar',
        };
    }

    /**
     * Get the color for the risk level badge.
     */
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
