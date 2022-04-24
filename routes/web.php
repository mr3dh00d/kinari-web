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
    Route::get('/logout', [Controllers\AdminLoginController::class, 'logOut'])->name('logout');
    Route::middleware(['is_admin'])->group(function () {
        // Route::get('/', function(Request $request) {
        //     return view('building-prueba');
        // });
        // Route::get('/products', function(Request $request) {
        //     return view('lista');
        // });

        Route::resource('/productos', Controllers\ProductsController::class);
        Route::resource('/secciones', Controllers\SecctionsController::class);
        
        Route::get('/settings', function () {
            return view('building-prueba');
        });
        
        Route::get('/carrusel', function () {
            return view('carrusel');
        });

    });
});

Route::get('/', function () {
    return view('pagina');
});

Route::get('/carta', function () {
    return view('carta');
});

