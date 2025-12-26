<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('afiliados', function (Blueprint $table) {
            // Datos personales del nino/a
            $table->integer('edad')->nullable()->after('fecha_nacimiento');
            $table->string('lugar_nacimiento')->nullable()->after('numero_documento');
            $table->string('ciudad_residencia')->nullable()->after('email');
            $table->string('parroquia_civil')->nullable()->after('ciudad_residencia');
            $table->string('sector_barrio')->nullable()->after('parroquia_civil');
            $table->text('direccion_domicilio')->nullable()->after('sector_barrio');
            $table->string('contacto_telefonico')->nullable()->after('direccion_domicilio');
            $table->boolean('tiene_discapacidad')->default(false)->after('contacto_telefonico');
            $table->integer('porcentaje_discapacidad')->nullable()->after('tiene_discapacidad');
            $table->string('departamento_referencia')->nullable()->after('departamento');

            // Datos laborales del representante
            $table->string('nombre_representante')->nullable()->after('informacion_familiar');
            $table->string('apellido_representante')->nullable()->after('nombre_representante');
            $table->string('tipo_documento_representante')->nullable()->after('apellido_representante');
            $table->string('numero_documento_representante')->nullable()->after('tipo_documento_representante');
            $table->string('parentesco')->nullable()->after('numero_documento_representante');
            $table->integer('edad_representante')->nullable()->after('parentesco');
            $table->string('nivel_estudio')->nullable()->after('edad_representante');
            $table->string('jornada_laboral')->nullable()->after('tipo_empleo');
            $table->string('dias_laborales')->nullable()->after('jornada_laboral');
            $table->string('horario_trabajo')->nullable()->after('dias_laborales');

            // Datos educativos del nino/a
            $table->boolean('estudia')->default(false)->after('descripcion_laboral');
            $table->string('ultimo_anio_aprobado')->nullable()->after('institucion_educativa');
            $table->string('jornada')->nullable()->after('ultimo_anio_aprobado');
            $table->string('representante_legal')->nullable()->after('jornada');
        });

        DB::statement("ALTER TABLE afiliados MODIFY tipo_empleo VARCHAR(20) NULL");
        DB::statement("ALTER TABLE afiliados MODIFY nivel_educativo VARCHAR(30) NULL");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('afiliados', function (Blueprint $table) {
            $table->dropColumn([
                'edad',
                'lugar_nacimiento',
                'ciudad_residencia',
                'parroquia_civil',
                'sector_barrio',
                'direccion_domicilio',
                'contacto_telefonico',
                'tiene_discapacidad',
                'porcentaje_discapacidad',
                'departamento_referencia',
                'nombre_representante',
                'apellido_representante',
                'tipo_documento_representante',
                'numero_documento_representante',
                'parentesco',
                'edad_representante',
                'nivel_estudio',
                'jornada_laboral',
                'dias_laborales',
                'horario_trabajo',
                'estudia',
                'ultimo_anio_aprobado',
                'jornada',
                'representante_legal',
            ]);
        });
    }
};
