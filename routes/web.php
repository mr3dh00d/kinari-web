<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\AdminLoginController;
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
        Route::resource('/productos', Controllers\ProductsController::class);
        Route::post('/productos/cambiar-orden', [Controllers\ProductsController::class, 'cambiarOrden']);
        Route::resource('/secciones', Controllers\SecctionsController::class);
        Route::post('/secciones/cambiar-orden', [Controllers\SecctionsController::class, 'cambiarOrden']);
        
        // Route::get('/settings', function () {
        //     return view('building-prueba');
        // });
        
        // Route::get('/carrusel', function () {
        //     return view('carrusel');
        // });

    });
});

Route::get('/', [Controllers\WebsiteController::class, 'home']);
Route::get('/carta', [Controllers\WebsiteController::class, 'carta']);

Route::get('/resumen', [Controllers\WebsiteController::class, 'resumen']);
Route::get('/seleccionar-direccion', [Controllers\WebsiteController::class, 'seleccionarDireccion']);
Route::get('/checkout', [Controllers\WebsiteController::class, 'checkout']);
Route::get('/resultado', [Controllers\WebsiteController::class, 'resultado']);

Route::post('/obtenerSecciones', [Controllers\WebsiteController::class, 'obtenerSecciones']);

// Route::get('/run-migrations', function () {
//     return Artisan::call('migrate', [
//         '--force' => true,
//         '--seed' => true
//     ]);
// });

// Route::get('/rollback', function () {
//     return Artisan::call('migrate:rollback');
// });

