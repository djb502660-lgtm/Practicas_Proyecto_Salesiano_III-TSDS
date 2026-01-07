<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InstitucionEducativaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $escuelas = [
            'Mariscal Sucre',
            '22 de Marzo',
            '26 de Agosto',
            '10 de Agosto',
            'Técnico San Lorenzo',
            'Quito Luz de América',
            'Otras'
        ];

        foreach ($escuelas as $escuela) {
            \App\Models\InstitucionEducativa::firstOrCreate(['nombre' => $escuela]);
        }
    }
}
