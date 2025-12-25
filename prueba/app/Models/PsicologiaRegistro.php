<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PsicologiaRegistro extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'psicologia_registros';

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'afiliado_id',
        'tipo',
        'fecha_registro',
        'estado_emocional',
        'conducta',
        'diagnostico_inicial',
        'evolucion',
        'observaciones',
        'nivel_riesgo',
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
        ];
    }

    /**
     * Get the afiliado that owns the record.
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
}
