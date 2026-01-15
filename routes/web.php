<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MensajeController;

Route::get('/', function () {
    return view('welcome');
});

// Ruta que muestra el formulario para crear un nuevo mensaje
Route::get('/mensaje', [MensajeController::class, 'create'])->name('mensaje.create');

// Guardar mensaje
Route::post('/mensaje', [MensajeController::class, 'store'])->name('mensaje.store');

// Mostrar muro de mensajes
Route::get('/muro', [MensajeController::class, 'index'])
    ->middleware('auth')    // Protege la ruta para usuarios autenticados
    ->name('mensaje.index');

//Ruta a la tabla de datos
Route::get('/data', [AlumnoController::class, 'mostrarDatos'])->name('data');

//Ruta al formulario
Route::get('/admin/user/create', [AlumnoController::class, 'mostrarFormulario'])
    ->name('alumno');

//Ruta para procesar los datos del formulario enviado
Route::post('/admin/user/alumno', [AlumnoController::class, 'procesarFormulario'])
    ->name('guardar.form');

// Ruta de administración protegida con middleware 'auth'
Route::middleware(['auth'
])->group(function () {
   Route::get('/admin/dashboard', function () {
       return view('admin.dashboard');
   })->name('admin.dashboard');

   Route::get('/admin/users/create', [App\Http\Controllers\Admin\UserController::class, 'create']
   )->name('admin.users.create');

   Route::post('/admin/users/store', [App\Http\Controllers\Admin\UserController::class, 'store']
   )->name('admin.users.store');
});

// Rutas generadas por Jetstream para autenticación y dashboard
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
