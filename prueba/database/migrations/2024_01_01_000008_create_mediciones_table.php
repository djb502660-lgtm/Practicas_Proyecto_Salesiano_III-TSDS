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
        Schema::create('mediciones', function (Blueprint $table) {
            $table->id();
            $table->foreignId('destinatario_id')->constrained()->onDelete('cascade');
            $table->decimal('peso', 5, 2)->comment('Peso en kilogramos');
            $table->decimal('talla', 3, 2)->comment('Talla en metros');
            $table->decimal('imc', 5, 2)->nullable()->comment('Índice de Masa Corporal calculado');
            $table->string('clasificacion', 20)->nullable()->comment('desnutricion, peso_normal, sobrepeso, obesidad');
            $table->text('observaciones')->nullable();
            $table->date('fecha_medicion');
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('set null');
            $table->timestamps();

            $table->index('destinatario_id');
            $table->index('fecha_medicion');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mediciones');
    }
};
