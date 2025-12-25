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
        // Update all records that have 'EPS' in the tipo_seguro_salud column
        DB::table('afiliados')
            ->where('tipo_seguro_salud', 'EPS')
            ->orWhere('tipo_seguro_salud', 'eps')
            ->update(['tipo_seguro_salud' => 'Sisbén']);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // No reverse needed as we are fixing data
    }
};
