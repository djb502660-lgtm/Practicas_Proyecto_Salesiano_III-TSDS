<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('destinatarios', function (Blueprint $table) {
            $table->id();
            $table->string('foto')->nullable();

            // Datos Personales
            $table->string('primer_nombre');
            $table->string('segundo_nombre')->nullable();
            $table->string('primer_apellido');
            $table->string('segundo_apellido')->nullable();
            $table->date('fecha_nacimiento');
            $table->enum('genero', ['masculino', 'femenino', 'otro'])->default('masculino');
            $table->enum('estado_civil', ['soltero', 'casado', 'divorciado', 'viudo', 'union_libre'])->default('soltero');
            $table->string('nacionalidad')->default('Colombiana');
            $table->enum('tipo_documento', ['cedula', 'pasaporte', 'tarjeta_identidad', 'cedula_extranjeria'])->default('cedula');
            $table->string('numero_documento')->unique();

            // Datos de Contacto
            $table->string('telefono')->nullable();
            $table->string('celular')->nullable();
            $table->string('email')->nullable();
            $table->text('direccion_residencia');
            $table->string('barrio')->nullable();
            $table->string('ciudad');
            $table->string('departamento');
            $table->string('pais')->default('Colombia');
            $table->string('codigo_postal')->nullable();

            // Datos Familiares
            $table->string('nombre_conyuge')->nullable();
            $table->integer('numero_hijos')->default(0);
            $table->integer('personas_a_cargo')->default(0);
            $table->text('informacion_familiar')->nullable();

            // Datos Laborales del familiar
            $table->string('ocupacion')->nullable();
            $table->string('lugar_trabajo')->nullable();
            $table->string('cargo')->nullable();
            $table->decimal('ingresos_mensuales', 15, 2)->nullable();
            $table->enum('tipo_empleo', ['empleado', 'independiente', 'desempleado', 'estudiante', 'jubilado', 'otro'])->nullable();
            $table->text('descripcion_laboral')->nullable();

            // Datos Educativos
            $table->enum('nivel_educativo', ['primaria', 'secundaria', 'tecnico', 'universitario', 'ninguno'])->nullable();
            $table->string('institucion_educativa')->nullable();
            $table->string('titulo_obtenido')->nullable();
            $table->boolean('estudiando_actualmente')->default(false);

            // Datos de Salud
            $table->boolean('tiene_seguro_salud')->default(true);
            $table->string('tipo_seguro_salud')->nullable();
            $table->text('condiciones_medicas')->nullable();
            $table->text('medicamentos_permanentes')->nullable();
            $table->text('alergias')->nullable();

            // Datos Adicionales
            $table->text('observaciones')->nullable();
            $table->enum('estado', ['activo', 'inactivo', 'suspendido'])->default('activo');
            $table->date('fecha_registro')->default(now());
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('set null');

            $table->timestamps();

            $table->index('numero_documento');
            $table->index('estado');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('destinatarios');
    }
};

