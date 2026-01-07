<?php

namespace Database\Seeders;

use App\Models\Destinatario;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PsicologiaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->command->info('Creando registros de psicología...');

        $adminUser = User::where('email', 'admin@example.com')->first();
        $destinatarios = Destinatario::all();

        if ($destinatarios->isEmpty()) {
            $this->command->warn('No hay destinatarios. Ejecute primero el seeder de destinatarios.');
            return;
        }

        $nivelesRiesgo = ['bajo', 'medio', 'alto', 'critico'];
        $tipos = ['individual', 'familiar', 'grupal', 'seguimiento'];

        foreach ($destinatarios->take(15) as $destinatario) {
            $riesgo = rand(0, 100) > 70; // 30% de riesgo detectado
            $nivelRiesgo = $riesgo ? $nivelesRiesgo[rand(1, 3)] : 'bajo';
            $alerta = $riesgo && rand(0, 100) > 50;

            $psicologiaId = DB::table('psicologias')->insertGetId([
                'destinatario_id' => $destinatario->id,
                'tipo' => $tipos[array_rand($tipos)],
                'fecha_registro' => now()->subDays(rand(1, 30)),
                'estado_emocional' => 'Paciente presenta estado de ánimo ' . ($riesgo ? 'decaído y ansioso.' : 'estable.'),
                'conducta' => 'Interacción ' . ($riesgo ? 'limitada, evita contacto visual.' : 'adecuada y participativa.'),
                'diagnostico_inicial' => $riesgo ? 'Se observan signos de estrés post-traumático leve.' : 'Sin hallazgos significativos.',
                'evolucion' => 'Proceso en etapa inicial.',
                'observaciones' => 'Se recomienda cita de seguimiento en 15 días.',
                'riesgo_detectado' => $riesgo,
                'nivel_riesgo' => $nivelRiesgo,
                'alerta_generada' => $alerta,
                'user_id' => $adminUser?->id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            if ($alerta) {
                DB::table('psicologia_alertas')->insert([
                    'psicologia_id' => $psicologiaId,
                    'destinatario_id' => $destinatario->id,
                    'tipo_alerta' => 'riesgo_psicosocial',
                    'descripcion' => 'Alerta generada por nivel de riesgo ' . $nivelRiesgo,
                    'fecha_alerta' => now(),
                    'estado' => 'pendiente',
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
                $this->command->info("  ⚠ Alerta generada para: {$destinatario->nombre_completo}");
            }
        }

        $this->command->info('¡Seeder de psicología completado!');
    }
}
