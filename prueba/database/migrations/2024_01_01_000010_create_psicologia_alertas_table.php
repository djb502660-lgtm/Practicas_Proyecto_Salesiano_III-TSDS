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
        Schema::create('psicologia_alertas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('psicologia_id')->constrained('psicologias')->onDelete('cascade');
            $table->foreignId('afiliado_id')->constrained()->onDelete('cascade');
            $table->string('nivel_riesgo', 20);
            $table->string('mensaje', 255);
            $table->string('estado', 20)->default('pendiente');
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('set null');
            $table->timestamps();

            $table->index('afiliado_id');
            $table->index('psicologia_id');
            $table->index('estado');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('psicologia_alertas');
    }
};
