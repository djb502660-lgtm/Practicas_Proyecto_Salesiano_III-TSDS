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
        // Eliminar definitivamente al usuario con email editor@example.com y nombre "Coordinador Auxiliar"
        DB::table('users')->where('email', 'editor@example.com')->delete();
        
        // Asegurarse de que no queden rastros del rol 'editor' si existiera
        $editorRole = DB::table('roles')->where('slug', 'editor')->first();
        if ($editorRole) {
            DB::table('role_user')->where('role_id', $editorRole->id)->delete();
            DB::table('roles')->where('id', $editorRole->id)->delete();
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // No revert needed
    }
};
