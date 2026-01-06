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
        Schema::create('seguimiento_mediciones', function (Blueprint $table) {
            $table->id();
            $table->foreignId('medicion_id')->constrained('mediciones')->onDelete('cascade');
            $table->foreignId('destinatario_id')->constrained('destinatarios')->onDelete('cascade');
            $table->date('fecha_seguimiento'); // Current date of measurement
            $table->date('fecha_proximo_seguimiento'); // 6 months later
            $table->string('estado')->default('pendiente'); // pendiente, realizado
            $table->timestamps(); // includes created_at for registration date/time

            $table->index('destinatario_id');
            $table->index('medicion_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seguimiento_mediciones');
    }
};
