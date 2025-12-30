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
        Schema::create('educador_seguimientos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('destinatario_id')->constrained()->onDelete('cascade');
            $table->string('tipo')->default('academico'); // academico, convivencial, etc.
            $table->date('fecha_registro');
            $table->text('observacion');
            $table->text('acuerdos')->nullable();
            $table->boolean('riesgo_detectado')->default(false);
            $table->string('nivel_riesgo')->nullable();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('educador_seguimientos');
    }
};
