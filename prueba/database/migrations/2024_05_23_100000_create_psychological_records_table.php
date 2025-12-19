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
        Schema::create('psychological_records', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('psychologist_id')->constrained('users')->onDelete('cascade');
            $table->date('evaluation_date');
            $table->string('reason'); // Motivo de la consulta/evaluación
            $table->text('evaluation_details'); // Detalles, diagnóstico, etc.
            $table->text('recommendations')->nullable(); // Recomendaciones
            $table->enum('risk_level', ['low', 'medium', 'high'])->default('low'); // Para RF-03 (Alertas)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('psychological_records');
    }
};

