<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // 1. Renombrar Roles existentes
        DB::table('roles')->where('slug', 'admin')->update([
            'name' => 'Director',
            'slug' => 'director',
            'description' => 'Rol con todos los permisos del sistema. Acceso completo.'
        ]);

        DB::table('roles')->where('slug', 'moderator')->update([
            'name' => 'Coordinador',
            'slug' => 'coordinador',
            'description' => 'Rol con permisos de coordinación y gestión básica.'
        ]);

        DB::table('roles')->where('slug', 'usuario')->update([
            'name' => 'Educador',
            'slug' => 'educador',
            'description' => 'Rol básico de educador con permisos de lectura y registro de datos.'
        ]);

        // 2. Manejar el rol Editor y el usuario Editor
        // Eliminamos al usuario editor@example.com definitivamente
        DB::table('users')->where('email', 'editor@example.com')->delete();

        $editorRole = DB::table('roles')->where('slug', 'editor')->first();
        if ($editorRole) {
            // Desvincular cualquier otro usuario que pudiera tener este rol antes de borrarlo
            DB::table('role_user')->where('role_id', $editorRole->id)->delete();
            DB::table('roles')->where('id', $editorRole->id)->delete();
        }

        // 3. Actualizar nombres de usuarios de ejemplo si existen
        DB::table('users')->where('email', 'admin@example.com')->update(['name' => 'Director']);
        DB::table('users')->where('email', 'moderator@example.com')->update(['name' => 'Coordinador']);
        DB::table('users')->where('email', 'usuario@example.com')->update(['name' => 'Educador']);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // No revert needed for this specific data fix
    }
};
