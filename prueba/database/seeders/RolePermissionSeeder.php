<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->command->info('Creando permisos...');
        $permissions = $this->createPermissions();

        $this->command->info('Creando roles...');
        $roles = $this->createRoles($permissions);

        $this->command->info('Creando usuarios...');
        $this->createUsers($roles);

        $this->command->info('¡Seeder completado exitosamente!');
    }

    /**
     * Crear todos los permisos del sistema.
     *
     * @return array<string, Permission>
     */
    private function createPermissions(): array
    {
        $permissionsData = [
            // Permisos de Usuarios
            ['name' => 'Ver Usuarios', 'slug' => 'users.view', 'description' => 'Permite ver la lista de usuarios'],
            ['name' => 'Crear Usuarios', 'slug' => 'users.create', 'description' => 'Permite crear nuevos usuarios'],
            ['name' => 'Editar Usuarios', 'slug' => 'users.edit', 'description' => 'Permite editar usuarios existentes'],
            ['name' => 'Eliminar Usuarios', 'slug' => 'users.delete', 'description' => 'Permite eliminar usuarios'],
            ['name' => 'Asignar Roles a Usuarios', 'slug' => 'users.assign-roles', 'description' => 'Permite asignar roles a usuarios'],

            // Permisos de Roles
            ['name' => 'Ver Roles', 'slug' => 'roles.view', 'description' => 'Permite ver la lista de roles'],
            ['name' => 'Crear Roles', 'slug' => 'roles.create', 'description' => 'Permite crear nuevos roles'],
            ['name' => 'Editar Roles', 'slug' => 'roles.edit', 'description' => 'Permite editar roles existentes'],
            ['name' => 'Eliminar Roles', 'slug' => 'roles.delete', 'description' => 'Permite eliminar roles'],
            ['name' => 'Asignar Permisos a Roles', 'slug' => 'roles.assign-permissions', 'description' => 'Permite asignar permisos a roles'],

            // Permisos de Permisos
            ['name' => 'Ver Permisos', 'slug' => 'permissions.view', 'description' => 'Permite ver la lista de permisos'],
            ['name' => 'Crear Permisos', 'slug' => 'permissions.create', 'description' => 'Permite crear nuevos permisos'],
            ['name' => 'Editar Permisos', 'slug' => 'permissions.edit', 'description' => 'Permite editar permisos existentes'],
            ['name' => 'Eliminar Permisos', 'slug' => 'permissions.delete', 'description' => 'Permite eliminar permisos'],

            // Permisos de Destinatarios
            ['name' => 'Ver Destinatarios', 'slug' => 'destinatarios.view', 'description' => 'Permite ver la lista de destinatarios'],
            ['name' => 'Crear Destinatarios', 'slug' => 'destinatarios.create', 'description' => 'Permite crear nuevos destinatarios'],
            ['name' => 'Editar Destinatarios', 'slug' => 'destinatarios.edit', 'description' => 'Permite editar destinatarios existentes'],
            ['name' => 'Eliminar Destinatarios', 'slug' => 'destinatarios.delete', 'description' => 'Permite eliminar destinatarios'],

            // Permisos de Mediciones
            ['name' => 'Ver Mediciones', 'slug' => 'mediciones.view', 'description' => 'Permite ver la lista de mediciones'],
            ['name' => 'Crear Mediciones', 'slug' => 'mediciones.create', 'description' => 'Permite crear nuevas mediciones'],
            ['name' => 'Editar Mediciones', 'slug' => 'mediciones.edit', 'description' => 'Permite editar mediciones existentes'],
            ['name' => 'Eliminar Mediciones', 'slug' => 'mediciones.delete', 'description' => 'Permite eliminar mediciones'],

            // Permisos de Psicología
            ['name' => 'Ver Psicología', 'slug' => 'psicologia.view', 'description' => 'Permite ver la lista de registros de psicología'],
            ['name' => 'Crear Psicología', 'slug' => 'psicologia.create', 'description' => 'Permite crear nuevos registros de psicología'],
            ['name' => 'Editar Psicología', 'slug' => 'psicologia.edit', 'description' => 'Permite editar registros de psicología'],
            ['name' => 'Eliminar Psicología', 'slug' => 'psicologia.delete', 'description' => 'Permite eliminar registros de psicología'],
            ['name' => 'Ver Reportes de Psicología', 'slug' => 'psicologia-reportes.view', 'description' => 'Permite ver los reportes detallados de psicología'],
            ['name' => 'Ver Alertas de Psicología', 'slug' => 'psicologia-alertas.view', 'description' => 'Permite ver la lista de alertas generadas en psicología'],

            // Permisos de Educador
            ['name' => 'Ver Perfil Educador', 'slug' => 'educador.perfil', 'description' => 'Permite acceder al perfil del educador'],
            ['name' => 'Ver Seguimiento Educador', 'slug' => 'educador.view', 'description' => 'Permite ver la lista de seguimientos de educadores'],
            ['name' => 'Crear Seguimiento Educador', 'slug' => 'educador.create', 'description' => 'Permite crear nuevos seguimientos de educadores'],
            ['name' => 'Editar Seguimiento Educador', 'slug' => 'educador.edit', 'description' => 'Permite editar seguimientos de educadores'],
            ['name' => 'Eliminar Seguimiento Educador', 'slug' => 'educador.delete', 'description' => 'Permite eliminar seguimientos de educadores'],

            // Permisos del Dashboard
            ['name' => 'Acceder al Dashboard', 'slug' => 'dashboard.access', 'description' => 'Permite acceder al panel de control'],
        ];

        $permissions = [];
        foreach ($permissionsData as $permissionData) {
            $permission = Permission::updateOrCreate(
                ['slug' => $permissionData['slug']],
                $permissionData
            );
            $permissions[$permissionData['slug']] = $permission;
            $this->command->info("  ✓ Permiso creado: {$permissionData['name']}");
        }

        return $permissions;
    }

    /**
     * Crear todos los roles del sistema.
     *
     * @param  array<string, Permission>  $permissions
     * @return array<string, Role>
     */
    private function createRoles(array $permissions): array
    {
        // Rol Director - Todos los permisos
        $directorRole = Role::updateOrCreate(
            ['slug' => 'director'],
            [
                'name' => 'Director',
                'description' => 'Rol con todos los permisos del sistema. Acceso completo.',
            ]
        );
        $directorRole->permissions()->sync(array_map(fn($p) => $p->id, $permissions));
        $this->command->info("  ✓ Rol creado: {$directorRole->name} (con todos los permisos)");

        // Rol Coordinador - Permisos intermedios
        $coordinadorRole = Role::updateOrCreate(
            ['slug' => 'coordinador'],
            [
                'name' => 'Coordinador',
                'description' => 'Rol con permisos de coordinación y gestión básica.',
            ]
        );
        $coordinadorRole->permissions()->sync([
            $permissions['users.view']->id,
            $permissions['users.edit']->id,
            $permissions['users.assign-roles']->id,
            $permissions['roles.view']->id,
            $permissions['permissions.view']->id,
            $permissions['destinatarios.view']->id,
            $permissions['destinatarios.create']->id,
            $permissions['destinatarios.edit']->id,
            $permissions['destinatarios.delete']->id,
            $permissions['mediciones.view']->id,
            $permissions['mediciones.create']->id,
            $permissions['mediciones.edit']->id,
            $permissions['mediciones.delete']->id,
            $permissions['psicologia.view']->id,
            $permissions['psicologia.create']->id,
            $permissions['psicologia.edit']->id,
            $permissions['psicologia-reportes.view']->id,
            $permissions['psicologia-alertas.view']->id,
            $permissions['educador.view']->id,
            $permissions['educador.create']->id,
            $permissions['educador.edit']->id,
            $permissions['dashboard.access']->id,
        ]);
        $this->command->info("  ✓ Rol creado: {$coordinadorRole->name}");

        // Rol Educador - Solo visualización y registro básico
        $educadorRole = Role::updateOrCreate(
            ['slug' => 'educador'],
            [
                'name' => 'Educador',
                'description' => 'Rol básico de educador con permisos de lectura y registro de datos.',
            ]
        );
        $educadorRole->permissions()->sync([
            $permissions['users.view']->id,
            $permissions['destinatarios.view']->id,
            $permissions['mediciones.view']->id,
            $permissions['mediciones.create']->id,
            $permissions['psicologia.view']->id,
            $permissions['psicologia.create']->id,
            $permissions['dashboard.access']->id,
        ]);
        $this->command->info("  ✓ Rol creado: {$educadorRole->name}");

        // Rol Educador - Ya definido arriba, pero asegurémonos de que tenga sus permisos
        $educadorRole->permissions()->sync([
            $permissions['users.view']->id,
            $permissions['destinatarios.view']->id,
            $permissions['mediciones.view']->id,
            $permissions['mediciones.create']->id,
            $permissions['psicologia.view']->id,
            $permissions['psicologia.create']->id,
            $permissions['educador.perfil']->id,
            $permissions['educador.view']->id,
            $permissions['educador.create']->id,
            $permissions['educador.edit']->id,
            $permissions['educador.delete']->id,
            $permissions['dashboard.access']->id,
        ]);
        $this->command->info("  ✓ Rol actualizado: {$educadorRole->name}");

        // Asegurarse de que el rol 'docente' (si existe) pase sus usuarios a 'educador'
        $docenteRole = Role::where('slug', 'docente')->first();
        if ($docenteRole) {
            foreach ($docenteRole->users as $user) {
                if (!$user->hasRole('educador')) {
                    $user->roles()->attach($educadorRole->id);
                }
            }
            $docenteRole->delete();
            $this->command->info("  ✓ Usuarios del rol 'docente' migrados a 'educador' y rol antiguo eliminado");
        }

        return [
            'director' => $directorRole,
            'coordinador' => $coordinadorRole,
            'educador' => $educadorRole,
        ];
    }

    /**
     * Crear usuarios de ejemplo.
     *
     * @param  array<string, Role>  $roles
     */
    private function createUsers(array $roles): void
    {
        // Usuario Director
        $directorUser = User::updateOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Director',
                'password' => Hash::make('password'),
                'email_verified_at' => now(),
            ]
        );
        $directorUser->syncRoles([$roles['director']->id]);
        $this->command->info("  ✓ Usuario creado: {$directorUser->name} ({$directorUser->email}) - Contraseña: password");

        // Usuario Coordinador
        $coordinadorUser = User::updateOrCreate(
            ['email' => 'moderator@example.com'],
            [
                'name' => 'Coordinador',
                'password' => Hash::make('password'),
                'email_verified_at' => now(),
            ]
        );
        $coordinadorUser->syncRoles([$roles['coordinador']->id]);
        $this->command->info("  ✓ Usuario creado: {$coordinadorUser->name} ({$coordinadorUser->email}) - Contraseña: password");

        // Usuario Educador
        $educadorUser = User::updateOrCreate(
            ['email' => 'educador@example.com'],
            [
                'name' => 'Educador',
                'password' => Hash::make('password'),
                'email_verified_at' => now(),
            ]
        );
        $educadorUser->syncRoles([$roles['educador']->id]);
        $this->command->info("  ✓ Usuario creado: {$educadorUser->name} ({$educadorUser->email}) - Contraseña: password");
    }
}
