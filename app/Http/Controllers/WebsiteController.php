<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models;

class WebsiteController extends Controller
{
    public function home(){
        $carruseles = Models\Carrusel::all();
        if(count($carruseles) > 0){
            return view('website.home', [
                'carruseles' => Models\Carrusel::all(),
                'destacados' => Models\Producto::where('destacado', true)->get()
            ]);
        }
        return view('building');

    }

    public function carta(){
        if(count(Models\Producto::all()) > 0){
            return view('website.carta', [
                'secciones' => Models\Seccion::all()
            ]);
        }
        return view('building');
    }
}
