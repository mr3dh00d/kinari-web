<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models;

class WebsiteController extends Controller
{
    public function building(){
        return view('building');
    }

    public function home(){
        $carruseles = Models\Carrusel::all();
        $productos_destacados = Models\Producto::where('destacado', true)->get();
        if($carruseles->isEmpty()){
            return $this->building();
        }

        return view('website.home', [
            'carruseles' => $carruseles,
            'destacados' => $productos_destacados
        ]);
    }

    public function carta(){
        $secciones = Models\Seccion::has('productos')
                        ->with(['productos' => function ($query){
                            $query->orderBy('orden')->get();
                        }])
                        ->orderBy('orden')
                        ->get();
        if($secciones->isEmpty()){
           return $this->building(); 
        }
        return view('website.carta', [
            'secciones' => $secciones
        ]);
    }

    public function obtenerSecciones(){
        return Models\Seccion::has('productos')
            // ->with(['productos' => function ($query){
            //     $query->with('imagen')->orderBy('orden')->get();
            // }])
            ->orderBy('orden')
            ->get();
    }

    public function resumen(){
        return view('website.pago.resumen');
    }
    public function seleccionarDireccion(){
        return view('website.pago.direccion');
    }
    public function checkout(){
        return view('website.pago.checkout');
    }
    public function resultado(){
        return view('website.pago.resultado');
    }
}
