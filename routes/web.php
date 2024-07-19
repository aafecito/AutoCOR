<?php

use App\Http\Controllers\AsignarController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AutoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\despachoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PermisoController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserControlador;
use App\Http\Controllers\VehiController;
use App\Http\Controllers\VentaControlador;
use App\Http\Controllers\VentaController;
use Symfony\Component\HttpKernel\Profiler\Profile;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::resource('/autos', AutoController::class)->names('autos');
Route::resource('/ofertas', OfferController::class)->names('ofertas');
Route::resource('/contact', ContactController::class)->names('contacto');
Route::resource('/', HomeController::class)->names('home');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Route::get('/welcome', [PageController::class, 'welcome'])->name('home');
    // route::get('/autos', [PageController::class, 'ShowAutos'])->name('autos');
    // Route::get('/ofertas', [PageController::class, 'ShowOfertas'])->name('ofertas');
    // Route::get('/contact', [PageController::class, 'ShowContact'])->name('contacto');
    Route::get('/profile', [UserControlador::class, 'profile']);
    Route::resource('/client', ClienteController::class)->names('cliente');
    Route::resource('/roles', RoleController::class)->names('roles');
    Route::resource('/permisos', PermisoController::class)->names('permisos');
    Route::resource('/usuarios', AsignarController::class)->names('asignar');
    Route::resource('/vehiculo', VehiController::class)->names('vehiculo');
    Route::resource('/venta', VentaController::class)->names('venta');
    Route::resource('/despacho', despachoController::class)->names('despacho');
    Route::post('/venta/{id}', [VentaController::class, 'show'])->name('showv');
});

Route::get('/auth/redirect', [AuthController::class, 'redirect']);
Route::get('/auth/callback-url', [AuthController::class, 'callback']);
