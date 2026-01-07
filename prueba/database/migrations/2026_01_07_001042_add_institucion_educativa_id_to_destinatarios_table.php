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
        Schema::table('destinatarios', function (Blueprint $table) {
            $table->foreignId('institucion_educativa_id')->nullable()->after('nivel_educativo')->constrained('instituciones_educativas')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('destinatarios', function (Blueprint $table) {
            $table->dropForeign(['institucion_educativa_id']);
            $table->dropColumn('institucion_educativa_id');
        });
    }
};
