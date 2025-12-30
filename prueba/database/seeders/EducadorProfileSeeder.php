<?php

namespace Database\Seeders;

use App\Models\Modulo_educador\Perfil;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class EducadorProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $educadoresData = [
            [
                'name' => 'Educador Primaria A',
                'email' => 'educador1@example.com',
                'total_ninos' => 113,
                'cargo' => 'Educador de Primaria'
            ],
            [
                'name' => 'Educador Primaria B',
                'email' => 'educador2@example.com',
                'total_ninos' => 103,
                'cargo' => 'Educador de Primaria'
            ],
            [
                'name' => 'Educador Secundaria',
                'email' => 'educador3@example.com',
                'total_ninos' => 96,
                'cargo' => 'Educador de Secundaria'
            ],
        ];

        foreach ($educadoresData as $data) {
            $user = User::updateOrCreate(
                ['email' => $data['email']],
                [
                    'name' => $data['name'],
                    'password' => Hash::make('password'),
                    'email_verified_at' => now(),
                ]
            );

            // Asignar rol de educador
            $role = Role::where('slug', 'educador')->first();
            if ($role) {
                $user->syncRoles([$role->id]);
            }

            Perfil::updateOrCreate(
                ['user_id' => $user->id],
                [
                    'nombre' => $data['name'],
                    'cargo' => $data['cargo'],
                    'email' => $data['email'],
                    'total_ninos' => $data['total_ninos'],
                    'descripcion_puesto' => 'Responsable de seguimiento y bienestar estudiantil.',
                ]
            );
        }
    }
}
