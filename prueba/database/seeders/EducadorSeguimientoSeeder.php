<?php

namespace Database\Seeders;

use App\Models\Destinatario;
use App\Models\EducadorSeguimiento;
use App\Models\User;
use Illuminate\Database\Seeder;

class EducadorSeguimientoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $destinatarios = Destinatario::all();
        $educadores = User::whereHas('roles', function ($q) {
            $q->where('slug', 'educador');
        })->get();

        if ($destinatarios->isEmpty() || $educadores->isEmpty()) {
            return;
        }

        foreach ($destinatarios->take(10) as $destinatario) {
            EducadorSeguimiento::create([
                'destinatario_id' => $destinatario->id,
                'tipo' => 'academico',
                'fecha_registro' => now()->subDays(rand(1, 30)),
                'observacion' => 'El estudiante muestra un buen desempeño académico general.',
                'acuerdos' => 'Continuar con el refuerzo en matemáticas.',
                'riesgo_detectado' => false,
                'nivel_riesgo' => 'bajo',
                'user_id' => $educadores->random()->id,
            ]);
        }
    }
}
