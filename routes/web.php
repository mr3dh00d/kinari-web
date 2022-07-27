<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\AdminLoginController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use App\Http\Controllers;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::domain('admin.' . env('APP_URL'))->group(function () {
    Route::get('/login', [Controllers\AdminLoginController::class, 'index']);
    Route::post('/authenticate', [Controllers\AdminLoginController::class, 'authenticate']);
    Route::post('/logout', [Controllers\AdminLoginController::class, 'logOut'])->name('logout');
    Route::middleware(['is_admin'])->group(function () {
        Route::get('/', [Controllers\AdminPanelController::class, 'index']);
        Route::resource('/carrusel', Controllers\CarruselController::class);

        Route::resource('/secciones', Controllers\SecctionsController::class);
        Route::post('/secciones/cambiar-orden', [Controllers\SecctionsController::class, 'cambiarOrden']);

        Route::resource('/productos', Controllers\ProductsController::class);
        Route::post('/productos/cambiar-orden', [Controllers\ProductsController::class, 'cambiarOrden']);

        Route::get('/pedidos', [Controllers\PedidoController::class, 'pedidosTodos']);
        Route::get('/nuevos-pedidos', [Controllers\PedidoController::class, 'pedidosNuevos']);
        
        Route::prefix('configuracion')->group(function () {
            Route::get('/', [Controllers\ConfiguracionController::class, 'index']);

            Route::post('/obtenerSuperUsuario', [Controllers\ConfiguracionController::class, 'obtenerSuperUsuario']);
            Route::post('/guardarSuperUsuario', [Controllers\ConfiguracionController::class, 'guardarSuperUsuario']);
            Route::post('/eliminarSuperUsuario', [Controllers\ConfiguracionController::class, 'eliminarSuperUsuario']);

            Route::post('/obtenerRangos', [Controllers\ConfiguracionController::class, 'obtenerRangos']);
            Route::post('/guardarRangos', [Controllers\ConfiguracionController::class, 'guardarRangos']);
            Route::post('/eliminarRangos', [Controllers\ConfiguracionController::class, 'eliminarRangos']);
        });
        
        // Route::get('/carrusel', function () {
        //     return view('carrusel');
        // });

    });
});

Route::get('/', [Controllers\WebsiteController::class, 'home']);
Route::get('/carta', [Controllers\WebsiteController::class, 'carta']);


Route::post('/obtenerSecciones', [Controllers\WebsiteController::class, 'obtenerSecciones']);
Route::post('/obtenerProducto', [Controllers\WebsiteController::class, 'obtenerProducto']);

/**
 * Rutas de carrito
 */
Route::prefix('/carrito')->group(function () {
    Route::post('/agregar', [Controllers\WebsiteController::class, 'agregarCarrito']);
    Route::post('/eliminar', [Controllers\WebsiteController::class, 'eliminarCarrito']);
    Route::post('/obtener', [Controllers\WebsiteController::class, 'obtenerCarrito']);
});

/**
 * Rutas de Accesso y registro
 */
// Route::get('/acceso', [Controllers\AutenticacionController::class, 'login']);
// Route::post('/autenticacion', [Controllers\AutenticacionController::class, 'autenticacion']);
// Route::get('/registro', [Controllers\AutenticacionController::class, 'register']);
// Route::post('/guardarUsuario', [Controllers\AutenticacionController::class, 'guardarUsuario']);
// Route::post('/logout', [Controllers\AutenticacionController::class, 'logout'])->name('logOut');



/**
 * Rutas de checkout
 */
Route::get('/resumen', [Controllers\WebsiteController::class, 'resumen'])->middleware(['cartNotEmpty']);
Route::get('/datos-personales', [Controllers\WebsiteController::class, 'datosPersonales'])->middleware(['cartNotEmpty']);
Route::post('/datos-personales', [Controllers\WebsiteController::class, 'setDatosPersonales'])->middleware(['cartNotEmpty']);
Route::get('/checkout', [Controllers\WebsiteController::class, 'checkout'])->middleware(['cartNotEmpty']);
// Route::get('/resultado', [Controllers\WebsiteController::class, 'resultado']);



// Route::get('/run-migrations', function () {
//     return Artisan::call('migrate', [
//         '--force' => true,
//         '--seed' => true
//     ]);
// });

// Route::get('/rollback', function () {
//     return Artisan::call('migrate:rollback');
// });

