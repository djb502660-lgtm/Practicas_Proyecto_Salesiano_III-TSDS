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
        // Actualizar todos los registros que tengan 'EPS' como tipo_seguro_salud
        DB::table('afiliados')
            ->where('tipo_seguro_salud', 'EPS')
            ->update(['tipo_seguro_salud' => 'Contributivo']);
        
        // Limpiar el campo eps (establecerlo como null)
        DB::table('afiliados')
            ->whereNotNull('eps')
            ->update(['eps' => null]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // No es necesario revertir esta migración
        // ya que estamos limpiando datos incorrectos
    }
};
