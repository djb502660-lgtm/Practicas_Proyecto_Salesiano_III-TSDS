<?php

use App\Http\Controllers\AfiliadoController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MedicionController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\PsicologiaController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

// Rutas de autenticación
Route::middleware(['guest'])->group(function (): void {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'register']);
});

Route::middleware(['auth'])->group(function (): void {
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    Route::prefix('admin')->name('admin.')->group(function (): void {
        Route::resource('users', UserController::class);
        Route::resource('roles', RoleController::class);
        Route::resource('permissions', PermissionController::class);
        Route::resource('afiliados', AfiliadoController::class);
        Route::resource('mediciones', MedicionController::class)->parameters([
            'mediciones' => 'medicion',
        ]);
        Route::get('psicologia/reportes/{afiliado}', [PsicologiaController::class, 'report'])
            ->name('psicologia.report');
        Route::get('psicologia-alertas', [PsicologiaController::class, 'alertasIndex'])
            ->name('psicologia-alertas.index');
        Route::resource('psicologia', PsicologiaController::class)->parameters([
            'psicologia' => 'psicologiaRegistro',
        ]);
    });
});
