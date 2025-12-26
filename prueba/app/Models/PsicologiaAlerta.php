<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PsicologiaAlerta extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'psicologia_alertas';

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'psicologia_id',
        'afiliado_id',
        'nivel_riesgo',
        'mensaje',
        'estado',
        'user_id',
    ];

    /**
     * Get the record that owns the alert.
     */
    public function psicologia(): BelongsTo
    {
        return $this->belongsTo(Psicologia::class);
    }

    /**
     * Get the afiliado that owns the alert.
     */
    public function afiliado(): BelongsTo
    {
        return $this->belongsTo(Afiliado::class);
    }

    /**
     * Get the user that registered the alert.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
