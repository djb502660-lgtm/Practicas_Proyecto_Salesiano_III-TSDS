<?php

use App\Http\Controllers\AfiliadoController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MedicionController;
use App\Http\Controllers\NutritionalRecordController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\PsychologicalRecordController;
use App\Http\Controllers\ReportController;
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
    });

    // Rutas para registros nutricionales y psicológicos
    Route::resource('nutritional-records', NutritionalRecordController::class);
    Route::resource('psychological-records', PsychologicalRecordController::class);
    
    // Rutas de reportes
    Route::prefix('reports')->name('reports.')->group(function (): void {
        Route::get('/', [ReportController::class, 'index'])->name('index');
        Route::get('/nutritional', [ReportController::class, 'nutritional'])->name('nutritional');
        Route::get('/psychological', [ReportController::class, 'psychological'])->name('psychological');
        Route::get('/alerts', [ReportController::class, 'alerts'])->name('alerts');
    });
});

