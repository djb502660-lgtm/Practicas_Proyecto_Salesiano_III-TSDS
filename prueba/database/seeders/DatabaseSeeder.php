<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RolePermissionSeeder::class,
            DestinatarioSeeder::class,
            DestinatarioMenorSeeder::class,
            MedicionSeeder::class,
            PsicologiaSeeder::class,
            EducadorProfileSeeder::class,
            EducadorSeguimientoSeeder::class,
        ]);
    }
}
