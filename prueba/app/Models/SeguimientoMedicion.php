<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SeguimientoMedicion extends Model
{
    use HasFactory;

    protected $table = 'seguimiento_mediciones';

    protected $fillable = [
        'medicion_id',
        'destinatario_id',
        'fecha_seguimiento',
        'fecha_proximo_seguimiento',
        'estado',
    ];

    protected function casts(): array
    {
        return [
            'fecha_seguimiento' => 'date',
            'fecha_proximo_seguimiento' => 'date',
        ];
    }

    public function medicion(): BelongsTo
    {
        return $this->belongsTo(Medicion::class);
    }

    public function destinatario(): BelongsTo
    {
        return $this->belongsTo(Destinatario::class);
    }
}
