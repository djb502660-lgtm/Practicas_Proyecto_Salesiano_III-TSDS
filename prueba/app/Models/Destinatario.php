<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property \Carbon\Carbon $fecha_nacimiento
 */
class Destinatario extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'primer_nombre',
        'segundo_nombre',
        'primer_apellido',
        'segundo_apellido',
        'fecha_nacimiento',
        'genero',
        'estado_civil',
        'nacionalidad',
        'tipo_documento',
        'numero_documento',
        'telefono',
        'celular',
        'email',
        'direccion_residencia',
        'barrio',
        'ciudad',
        'departamento',
        'pais',
        'codigo_postal',
        'nombre_conyuge',
        'numero_hijos',
        'personas_a_cargo',
        'informacion_familiar',
        'ocupacion',
        'lugar_trabajo',
        'cargo',
        'ingresos_mensuales',
        'tipo_empleo',
        'descripcion_laboral',
        'nivel_educativo',
        'institucion_educativa',
        'titulo_obtenido',
        'estudiando_actualmente',
        'tiene_seguro_salud',
        'tipo_seguro_salud',
        'condiciones_medicas',
        'medicamentos_permanentes',
        'alergias',
        'observaciones',
        'estado',
        'fecha_registro',
        'user_id',
        'institucion_educativa_id',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'fecha_nacimiento' => 'date',
            'fecha_registro' => 'date',
            'ingresos_mensuales' => 'decimal:2',
            'numero_hijos' => 'integer',
            'personas_a_cargo' => 'integer',
            'estudiando_actualmente' => 'boolean',
            'tiene_seguro_salud' => 'boolean',
        ];
    }

    /**
     * Get the user that registered the destinatario.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the full name of the destinatario.
     */
    public function getNombreCompletoAttribute(): string
    {
        $nombre = trim($this->primer_nombre . ' ' . ($this->segundo_nombre ?? ''));
        $apellido = trim($this->primer_apellido . ' ' . ($this->segundo_apellido ?? ''));

        return trim($nombre . ' ' . $apellido);
    }

    /**
     * Get the age of the destinatario.
     */
    public function getEdadAttribute(): int
    {
        return $this->fecha_nacimiento->age;
    }

    /**
     * Get the mediciones for the destinatario.
     */
    public function mediciones(): HasMany
    {
        return $this->hasMany(Medicion::class);
    }

    /**
     * Get the latest medicion for the destinatario.
     */
    public function ultimaMedicion(): ?Medicion
    {
        return $this->mediciones()->latest('fecha_medicion')->first();
    }

    /**
     * Get the educational institution of the destinatario.
     */
    public function institucionEducativa(): BelongsTo
    {
        return $this->belongsTo(InstitucionEducativa::class);
    }

    /**
     * Scope a query to search destinatarios.
     */
    public function scopeSearch($query, $search)
    {
        return $query->when($search, function ($query, $search) {
            return $query->where(function ($query) use ($search) {
                $query->where('primer_nombre', 'like', "%{$search}%")
                    ->orWhere('segundo_nombre', 'like', "%{$search}%")
                    ->orWhere('primer_apellido', 'like', "%{$search}%")
                    ->orWhere('segundo_apellido', 'like', "%{$search}%")
                    ->orWhere('numero_documento', 'like', "%{$search}%")
                    ->orWhere('ciudad', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%");
            });
        });
    }
}

