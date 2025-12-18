<?php

namespace Database\Seeders;

use App\Models\Afiliado;
use App\Models\Medicion;
use App\Models\User;
use Illuminate\Database\Seeder;

class MedicionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->command->info('Creando mediciones de ejemplo...');

        $adminUser = User::where('email', 'admin@example.com')->first();
        $afiliados = Afiliado::all();

        if ($afiliados->isEmpty()) {
            $this->command->warn('No hay afiliados en la base de datos. Ejecute primero el seeder de afiliados.');
            return;
        }

        $mediciones = [
            // Mediciones con sobrepeso
            [
                'afiliado_id' => $afiliados->random()->id,
                'peso' => 85.5,
                'talla' => 1.70,
                'fecha_medicion' => now()->subDays(10),
                'observaciones' => 'Paciente con sobrepeso. Se recomienda dieta y ejercicio.',
            ],
            [
                'afiliado_id' => $afiliados->random()->id,
                'peso' => 92.0,
                'talla' => 1.75,
                'fecha_medicion' => now()->subDays(5),
                'observaciones' => 'Sobrepeso moderado. Requiere seguimiento nutricional.',
            ],
            [
                'afiliado_id' => $afiliados->random()->id,
                'peso' => 78.3,
                'talla' => 1.65,
                'fecha_medicion' => now()->subDays(15),
                'observaciones' => 'Límite de sobrepeso. Iniciar programa de actividad física.',
            ],

            // Mediciones con obesidad
            [
                'afiliado_id' => $afiliados->random()->id,
                'peso' => 110.0,
                'talla' => 1.68,
                'fecha_medicion' => now()->subDays(8),
                'observaciones' => 'Obesidad grado I. Requiere intervención médica y nutricional urgente.',
            ],
            [
                'afiliado_id' => $afiliados->random()->id,
                'peso' => 125.5,
                'talla' => 1.72,
                'fecha_medicion' => now()->subDays(3),
                'observaciones' => 'Obesidad grado II. Seguimiento especializado necesario.',
            ],
            [
                'afiliado_id' => $afiliados->random()->id,
                'peso' => 95.0,
                'talla' => 1.60,
                'fecha_medicion' => now()->subDays(12),
                'observaciones' => 'Obesidad. Paciente menor de edad, requiere atención pediátrica.',
            ],

            // Mediciones con desnutrición
            [
                'afiliado_id' => $afiliados->random()->id,
                'peso' => 45.0,
                'talla' => 1.70,
                'fecha_medicion' => now()->subDays(7),
                'observaciones' => 'Desnutrición leve. Se recomienda evaluación nutricional completa.',
            ],
            [
                'afiliado_id' => $afiliados->random()->id,
                'peso' => 38.5,
                'talla' => 1.65,
                'fecha_medicion' => now()->subDays(20),
                'observaciones' => 'Desnutrición moderada. Requiere suplementación nutricional.',
            ],
            [
                'afiliado_id' => $afiliados->random()->id,
                'peso' => 42.0,
                'talla' => 1.75,
                'fecha_medicion' => now()->subDays(14),
                'observaciones' => 'Bajo peso. Seguimiento nutricional y médico.',
            ],

            // Mediciones con peso normal
            [
                'afiliado_id' => $afiliados->random()->id,
                'peso' => 65.0,
                'talla' => 1.70,
                'fecha_medicion' => now()->subDays(6),
                'observaciones' => 'Peso normal. Mantener hábitos saludables.',
            ],
            [
                'afiliado_id' => $afiliados->random()->id,
                'peso' => 58.5,
                'talla' => 1.65,
                'fecha_medicion' => now()->subDays(4),
                'observaciones' => 'IMC dentro del rango normal. Continuar con alimentación balanceada.',
            ],
            [
                'afiliado_id' => $afiliados->random()->id,
                'peso' => 72.0,
                'talla' => 1.75,
                'fecha_medicion' => now()->subDays(9),
                'observaciones' => 'Peso saludable. Buen estado nutricional.',
            ],

            // Mediciones para menores de edad
            [
                'afiliado_id' => $afiliados->where('fecha_nacimiento', '>', now()->subYears(18))->random()->id ?? $afiliados->random()->id,
                'peso' => 35.0,
                'talla' => 1.50,
                'fecha_medicion' => now()->subDays(11),
                'observaciones' => 'Adolescente con peso normal para su edad.',
            ],
            [
                'afiliado_id' => $afiliados->where('fecha_nacimiento', '>', now()->subYears(18))->random()->id ?? $afiliados->random()->id,
                'peso' => 28.5,
                'talla' => 1.45,
                'fecha_medicion' => now()->subDays(13),
                'observaciones' => 'Niño con desnutrición. Requiere atención pediátrica inmediata.',
            ],
            [
                'afiliado_id' => $afiliados->where('fecha_nacimiento', '>', now()->subYears(18))->random()->id ?? $afiliados->random()->id,
                'peso' => 55.0,
                'talla' => 1.55,
                'fecha_medicion' => now()->subDays(2),
                'observaciones' => 'Adolescente con sobrepeso. Iniciar programa de intervención.',
            ],
        ];

        foreach ($mediciones as $medicionData) {
            $imc = round($medicionData['peso'] / ($medicionData['talla'] * $medicionData['talla']), 2);
            
            $clasificacion = match (true) {
                $imc < 18.5 => 'desnutricion',
                $imc < 25 => 'peso_normal',
                $imc < 30 => 'sobrepeso',
                default => 'obesidad',
            };

            $medicion = Medicion::create([
                'afiliado_id' => $medicionData['afiliado_id'],
                'peso' => $medicionData['peso'],
                'talla' => $medicionData['talla'],
                'imc' => $imc,
                'clasificacion' => $clasificacion,
                'observaciones' => $medicionData['observaciones'],
                'fecha_medicion' => $medicionData['fecha_medicion'],
                'user_id' => $adminUser?->id,
            ]);

            $afiliado = $medicion->afiliado;
            $this->command->info("  ✓ Medición creada: {$afiliado->nombre_completo} - IMC: {$imc} ({$medicion->clasificacion_label})");
        }

        $this->command->info('¡Seeder de mediciones completado exitosamente!');
    }
}
