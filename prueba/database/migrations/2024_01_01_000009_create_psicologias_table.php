<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('psicologias', function (Blueprint $table) {
            $table->id();
            $table->foreignId('afiliado_id')->constrained()->onDelete('cascade');
            $table->string('tipo', 20);
            $table->date('fecha_registro');
            $table->text('estado_emocional')->nullable();
            $table->text('conducta')->nullable();
            $table->text('diagnostico_inicial')->nullable();
            $table->text('evolucion')->nullable();
            $table->text('observaciones')->nullable();
            $table->boolean('riesgo_detectado')->default(false);
            $table->string('nivel_riesgo', 20)->default('bajo');
            $table->boolean('alerta_generada')->default(false);
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('set null');
            $table->timestamps();

            $table->index('afiliado_id');
            $table->index('fecha_registro');
            $table->index('nivel_riesgo');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('psicologias');
    }
};
