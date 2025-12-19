<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Crear Permisos
        $this->createPermissions();

        // Crear Roles con sus permisos
        $adminRole = Role::updateOrCreate(['name' => 'Administrador General']);
        $docenteRole = Role::updateOrCreate(['name' => 'Docente']);
        $comedorRole = Role::updateOrCreate(['name' => 'Personal de Comedor']);
        $psicologoRole = Role::updateOrCreate(['name' => 'Psicologo']);
        $estudianteRole = Role::updateOrCreate(['name' => 'Estudiante']);

        // Asignar todos los permisos al Administrador General
        $adminRole->syncPermissions(Permission::all());

        // Permisos para Docente
        $docenteRole->syncPermissions([
            'users.view',
            'afiliados.view',
            'afiliados.create',
            'afiliados.edit',
            'mediciones.view',
            'nutritional-records.view',
            'psychological-records.view',
            'reports.view',
        ]);

        // Permisos para Personal de Comedor
        $comedorRole->syncPermissions([
            'users.view',
            'mediciones.view',
            'mediciones.create',
            'mediciones.edit',
            'nutritional-records.view',
            'nutritional-records.create',
            'nutritional-records.edit',
            'reports.nutritional',
        ]);

        // Permisos para Psicólogo
        $psicologoRole->syncPermissions([
            'users.view',
            'psychological-records.view',
            'psychological-records.create',
            'psychological-records.edit',
            'psychological-records.delete',
            'reports.psychological',
            'alerts.create',
        ]);

        // Permisos básicos para Estudiante
        $estudianteRole->syncPermissions([
            'users.view',
        ]);

        // Crear usuario administrador por defecto
        $adminUser = User::updateOrCreate(
            ['email' => 'admin@salesiano.edu'],
            [
                'name' => 'Administrador General',
                'password' => Hash::make('admin123'),
            ]
        );
        $adminUser->assignRole('Administrador General');
    }

    /**
     * Crear todos los permisos del sistema
     */
    private function createPermissions(): void
    {
        $permissions = [
            // Usuarios
            'users.view',
            'users.create',
            'users.edit',
            'users.delete',
            'users.assign-roles',
            
            // Roles y Permisos
            'roles.view',
            'roles.create',
            'roles.edit',
            'roles.delete',
            'permissions.view',
            'permissions.create',
            'permissions.edit',
            'permissions.delete',
            
            // Afiliados
            'afiliados.view',
            'afiliados.create',
            'afiliados.edit',
            'afiliados.delete',
            
            // Mediciones
            'mediciones.view',
            'mediciones.create',
            'mediciones.edit',
            'mediciones.delete',
            
            // Registros Nutricionales
            'nutritional-records.view',
            'nutritional-records.create',
            'nutritional-records.edit',
            'nutritional-records.delete',
            
            // Registros Psicológicos
            'psychological-records.view',
            'psychological-records.create',
            'psychological-records.edit',
            'psychological-records.delete',
            
            // Reportes
            'reports.view',
            'reports.nutritional',
            'reports.psychological',
            
            // Alertas
            'alerts.view',
            'alerts.create',
        ];

        foreach ($permissions as $permission) {
            Permission::updateOrCreate(['name' => $permission]);
        }
    }
}

