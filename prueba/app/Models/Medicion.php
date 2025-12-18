<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Medicion extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'mediciones';

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'afiliado_id',
        'peso',
        'talla',
        'imc',
        'clasificacion',
        'observaciones',
        'fecha_medicion',
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
            'peso' => 'decimal:2',
            'talla' => 'decimal:2',
            'imc' => 'decimal:2',
            'fecha_medicion' => 'date',
        ];
    }

    /**
     * Get the afiliado that owns the medicion.
     */
    public function afiliado(): BelongsTo
    {
        return $this->belongsTo(Afiliado::class);
    }

    /**
     * Get the user that registered the medicion.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Calculate IMC based on weight and height.
     */
    public function calcularIMC(): float
    {
        if ($this->talla > 0) {
            return round($this->peso / ($this->talla * $this->talla), 2);
        }

        return 0;
    }

    /**
     * Get classification based on IMC.
     */
    public function obtenerClasificacion(): string
    {
        $imc = $this->imc ?? $this->calcularIMC();

        if ($imc < 18.5) {
            return 'desnutricion';
        } elseif ($imc < 25) {
            return 'peso_normal';
        } elseif ($imc < 30) {
            return 'sobrepeso';
        } else {
            return 'obesidad';
        }
    }

    /**
     * Get classification label in Spanish.
     */
    public function getClasificacionLabelAttribute(): string
    {
        return match ($this->clasificacion) {
            'desnutricion' => 'Desnutrición',
            'peso_normal' => 'Peso Normal',
            'sobrepeso' => 'Sobrepeso',
            'obesidad' => 'Obesidad',
            default => 'No clasificado',
        };
    }

    /**
     * Get classification color for badges.
     */
    public function getClasificacionColorAttribute(): string
    {
        return match ($this->clasificacion) {
            'desnutricion' => '#ffc107',
            'peso_normal' => '#28a745',
            'sobrepeso' => '#fd7e14',
            'obesidad' => '#dc3545',
            default => '#808080',
        };
    }
}
