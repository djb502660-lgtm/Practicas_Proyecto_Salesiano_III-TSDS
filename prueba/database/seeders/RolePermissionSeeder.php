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

            // Permisos de Afiliados
            ['name' => 'Ver Afiliados', 'slug' => 'afiliados.view', 'description' => 'Permite ver la lista de afiliados'],
            ['name' => 'Crear Afiliados', 'slug' => 'afiliados.create', 'description' => 'Permite crear nuevos afiliados'],
            ['name' => 'Editar Afiliados', 'slug' => 'afiliados.edit', 'description' => 'Permite editar afiliados existentes'],
            ['name' => 'Eliminar Afiliados', 'slug' => 'afiliados.delete', 'description' => 'Permite eliminar afiliados'],

            // Permisos de Mediciones
            ['name' => 'Ver Mediciones', 'slug' => 'mediciones.view', 'description' => 'Permite ver la lista de mediciones'],
            ['name' => 'Crear Mediciones', 'slug' => 'mediciones.create', 'description' => 'Permite crear nuevas mediciones'],
            ['name' => 'Editar Mediciones', 'slug' => 'mediciones.edit', 'description' => 'Permite editar mediciones existentes'],
            ['name' => 'Eliminar Mediciones', 'slug' => 'mediciones.delete', 'description' => 'Permite eliminar mediciones'],

            // Permisos de Psicologia
            ['name' => 'Ver Psicologia', 'slug' => 'psicologia.view', 'description' => 'Permite ver la lista de registros de psicologia'],
            ['name' => 'Crear Psicologia', 'slug' => 'psicologia.create', 'description' => 'Permite crear nuevos registros de psicologia'],
            ['name' => 'Editar Psicologia', 'slug' => 'psicologia.edit', 'description' => 'Permite editar registros de psicologia'],
            ['name' => 'Eliminar Psicologia', 'slug' => 'psicologia.delete', 'description' => 'Permite eliminar registros de psicologia'],
            ['name' => 'Ver Alertas de Psicologia', 'slug' => 'psicologia-alertas.view', 'description' => 'Permite ver alertas de psicologia'],
            ['name' => 'Ver Reportes de Psicologia', 'slug' => 'psicologia-reportes.view', 'description' => 'Permite ver reportes de psicologia'],

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
        // Rol Administrador - Todos los permisos
        $adminRole = Role::updateOrCreate(
            ['slug' => 'admin'],
            [
                'name' => 'Administrador',
                'description' => 'Rol con todos los permisos del sistema. Acceso completo.',
            ]
        );
        $adminRole->permissions()->sync(array_column($permissions, 'id'));
        $this->command->info("  ✓ Rol creado: {$adminRole->name} (con todos los permisos)");

        // Rol Editor - Permisos de visualización y edición limitada
        $editorRole = Role::updateOrCreate(
            ['slug' => 'editor'],
            [
                'name' => 'Editor',
                'description' => 'Rol con permisos de visualización y edición limitada.',
            ]
        );
        $editorRole->permissions()->sync([
            $permissions['users.view']->id,
            $permissions['users.edit']->id,
            $permissions['roles.view']->id,
            $permissions['permissions.view']->id,
            $permissions['afiliados.view']->id,
            $permissions['afiliados.create']->id,
            $permissions['afiliados.edit']->id,
            $permissions['mediciones.view']->id,
            $permissions['mediciones.create']->id,
            $permissions['mediciones.edit']->id,
            $permissions['psicologia.view']->id,
            $permissions['psicologia.create']->id,
            $permissions['psicologia.edit']->id,
            $permissions['psicologia-alertas.view']->id,
            $permissions['psicologia-reportes.view']->id,
            $permissions['dashboard.access']->id,
        ]);
        $this->command->info("  ✓ Rol creado: {$editorRole->name}");

        // Rol Moderador - Permisos intermedios
        $moderatorRole = Role::updateOrCreate(
            ['slug' => 'moderator'],
            [
                'name' => 'Moderador',
                'description' => 'Rol con permisos de moderación y gestión básica.',
            ]
        );
        $moderatorRole->permissions()->sync([
            $permissions['users.view']->id,
            $permissions['users.edit']->id,
            $permissions['users.assign-roles']->id,
            $permissions['roles.view']->id,
            $permissions['permissions.view']->id,
            $permissions['afiliados.view']->id,
            $permissions['afiliados.create']->id,
            $permissions['afiliados.edit']->id,
            $permissions['afiliados.delete']->id,
            $permissions['mediciones.view']->id,
            $permissions['mediciones.create']->id,
            $permissions['mediciones.edit']->id,
            $permissions['mediciones.delete']->id,
            $permissions['psicologia.view']->id,
            $permissions['psicologia.create']->id,
            $permissions['psicologia.edit']->id,
            $permissions['psicologia.delete']->id,
            $permissions['psicologia-alertas.view']->id,
            $permissions['psicologia-reportes.view']->id,
            $permissions['dashboard.access']->id,
        ]);
        $this->command->info("  ✓ Rol creado: {$moderatorRole->name}");

        // Rol Usuario - Solo visualización básica
        $userRole = Role::updateOrCreate(
            ['slug' => 'usuario'],
            [
                'name' => 'Usuario',
                'description' => 'Rol básico de usuario con permisos de solo lectura.',
            ]
        );
        $userRole->permissions()->sync([
            $permissions['users.view']->id,
            $permissions['afiliados.view']->id,
            $permissions['mediciones.view']->id,
            $permissions['psicologia.view']->id,
            $permissions['psicologia-reportes.view']->id,
            $permissions['dashboard.access']->id,
        ]);
        $this->command->info("  ✓ Rol creado: {$userRole->name}");

        return [
            'admin' => $adminRole,
            'editor' => $editorRole,
            'moderator' => $moderatorRole,
            'usuario' => $userRole,
        ];
    }

    /**
     * Crear usuarios de ejemplo.
     *
     * @param  array<string, Role>  $roles
     */
    private function createUsers(array $roles): void
    {
        // Usuario Administrador
        $adminUser = User::updateOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Administrador',
                'password' => Hash::make('password'),
                'email_verified_at' => now(),
            ]
        );
        $adminUser->syncRoles([$roles['admin']->id]);
        $this->command->info("  ✓ Usuario creado: {$adminUser->name} ({$adminUser->email}) - Contraseña: password");

        // Usuario Editor
        $editorUser = User::updateOrCreate(
            ['email' => 'editor@example.com'],
            [
                'name' => 'Editor',
                'password' => Hash::make('password'),
                'email_verified_at' => now(),
            ]
        );
        $editorUser->syncRoles([$roles['editor']->id]);
        $this->command->info("  ✓ Usuario creado: {$editorUser->name} ({$editorUser->email}) - Contraseña: password");

        // Usuario Moderador
        $moderatorUser = User::updateOrCreate(
            ['email' => 'moderator@example.com'],
            [
                'name' => 'Moderador',
                'password' => Hash::make('password'),
                'email_verified_at' => now(),
            ]
        );
        $moderatorUser->syncRoles([$roles['moderator']->id]);
        $this->command->info("  ✓ Usuario creado: {$moderatorUser->name} ({$moderatorUser->email}) - Contraseña: password");

        // Usuario Regular
        $regularUser = User::updateOrCreate(
            ['email' => 'usuario@example.com'],
            [
                'name' => 'Usuario Regular',
                'password' => Hash::make('password'),
                'email_verified_at' => now(),
            ]
        );
        $regularUser->syncRoles([$roles['usuario']->id]);
        $this->command->info("  ✓ Usuario creado: {$regularUser->name} ({$regularUser->email}) - Contraseña: password");
    }
}
