<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('afiliados', function (Blueprint $table) {
            // Eliminar la columna cargo
            if (Schema::hasColumn('afiliados', 'cargo')) {
                $table->dropColumn('cargo');
            }
            
            // Modificar el enum de nivel_educativo para quitar postgrado
            // En MySQL los enums son complicados de cambiar vía Schema, usaremos DB::statement
            DB::statement("ALTER TABLE afiliados MODIFY COLUMN nivel_educativo ENUM('primaria', 'secundaria', 'tecnico', 'universitario', 'ninguno')");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('afiliados', function (Blueprint $table) {
            $table->string('cargo')->nullable();
            DB::statement("ALTER TABLE afiliados MODIFY COLUMN nivel_educativo ENUM('primaria', 'secundaria', 'tecnico', 'universitario', 'postgrado', 'ninguno')");
        });
    }
};
