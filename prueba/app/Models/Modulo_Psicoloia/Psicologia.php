<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Psicologia extends Model
{
    use HasFactory;

    /**
     * The "booted" method of the model.
     */
    protected static function booted(): void
    {
        static::saved(function (Psicologia $psicologia) {
            if ($psicologia->riesgo_detectado && $psicologia->nivel_riesgo === 'alto' && !$psicologia->alerta_generada) {
                // TODO: Implement actual notification logic to Administrator
                // Notification::send(User::role('admin')->get(), new AlertaPsicologica($psicologia));

                // For now, we just mark it as alerted if we were to process it
                // $psicologia->updateQuietly(['alerta_generada' => true]);

                // This is where RF-P03 Logic would be hooked.
            }
        });
    }

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
        'afiliado_id',
        'fecha_evaluacion',
        'tipo', // 'evaluacion', 'seguimiento', 'urgencia'
        'motivo_consulta',
        'diagnostico_inicial',
        'observaciones',
        'antecedentes_familiares',
        'evolucion', // For follow-ups
        'acciones_realizadas',
        'riesgo_detectado', // boolean
        'nivel_riesgo', // 'bajo', 'medio', 'alto'
        'alerta_generada', // boolean, for RF-P03
        'user_id', // Psychologist
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'fecha_evaluacion' => 'date',
            'riesgo_detectado' => 'boolean',
            'alerta_generada' => 'boolean',
        ];
    }

    /**
     * Get the afiliado that owns the psychology record.
     */
    public function afiliado(): BelongsTo
    {
        return $this->belongsTo(Afiliado::class);
    }

    /**
     * Get the user that registered the record.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Scope a query to only include high risk cases.
     */
    public function scopeRiesgoAlto($query)
    {
        return $query->where('riesgo_detectado', true)
            ->where('nivel_riesgo', 'alto');
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
            'bajo' => '#28a745', // Green
            'medio' => '#ffc107', // Yellow
            'alto' => '#dc3545', // Red
            default => '#6c757d', // Gray
        };
    }
}
