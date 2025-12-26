<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Afiliado extends Model
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
        'edad',
        'genero',
        'estado_civil',
        'nacionalidad',
        'tipo_documento',
        'numero_documento',
        'lugar_nacimiento',
        'telefono',
        'celular',
        'email',
        'direccion_residencia',
        'direccion_domicilio',
        'barrio',
        'ciudad',
        'ciudad_residencia',
        'parroquia_civil',
        'sector_barrio',
        'departamento',
        'departamento_referencia',
        'pais',
        'codigo_postal',
        'contacto_telefonico',
        'tiene_discapacidad',
        'porcentaje_discapacidad',
        'nombre_conyuge',
        'numero_hijos',
        'personas_a_cargo',
        'informacion_familiar',
        'nombre_representante',
        'apellido_representante',
        'tipo_documento_representante',
        'numero_documento_representante',
        'parentesco',
        'edad_representante',
        'nivel_estudio',
        'ocupacion',
        'lugar_trabajo',
        'cargo',
        'ingresos_mensuales',
        'tipo_empleo',
        'jornada_laboral',
        'dias_laborales',
        'horario_trabajo',
        'descripcion_laboral',
        'estudia',
        'nivel_educativo',
        'institucion_educativa',
        'titulo_obtenido',
        'ultimo_anio_aprobado',
        'jornada',
        'representante_legal',
        'estudiando_actualmente',
        'tiene_seguro_salud',
        'tipo_seguro_salud',
        'eps',
        'condiciones_medicas',
        'medicamentos_permanentes',
        'alergias',
        'observaciones',
        'estado',
        'fecha_registro',
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
            'fecha_nacimiento' => 'date',
            'fecha_registro' => 'date',
            'ingresos_mensuales' => 'decimal:2',
            'numero_hijos' => 'integer',
            'personas_a_cargo' => 'integer',
            'edad' => 'integer',
            'edad_representante' => 'integer',
            'porcentaje_discapacidad' => 'integer',
            'estudiando_actualmente' => 'boolean',
            'tiene_seguro_salud' => 'boolean',
            'tiene_discapacidad' => 'boolean',
            'estudia' => 'boolean',
        ];
    }

    /**
     * Get the user that registered the afiliado.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the full name of the afiliado.
     */
    public function getNombreCompletoAttribute(): string
    {
        $nombre = trim($this->primer_nombre . ' ' . ($this->segundo_nombre ?? ''));
        $apellido = trim($this->primer_apellido . ' ' . ($this->segundo_apellido ?? ''));

        return trim($nombre . ' ' . $apellido);
    }

    /**
     * Get the age of the afiliado.
     */
    public function getEdadAttribute(): int
    {
        if (array_key_exists('edad', $this->attributes) && $this->attributes['edad'] !== null) {
            return (int) $this->attributes['edad'];
        }

        return $this->fecha_nacimiento->age;
    }

    /**
     * Get the mediciones for the afiliado.
     */
    public function mediciones(): HasMany
    {
        return $this->hasMany(Medicion::class);
    }

    /**
     * Get the psicologia records for the afiliado.
     */
    public function psicologias(): HasMany
    {
        return $this->hasMany(Psicologia::class);
    }

    /**
     * Get the latest medicion for the afiliado.
     */
    public function ultimaMedicion(): ?Medicion
    {
        return $this->mediciones()->latest('fecha_medicion')->first();
    }
}
