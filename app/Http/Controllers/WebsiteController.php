<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models;

class WebsiteController extends Controller
{
    public function home(){
        if(!Models\Carrusel::limit(1)->get()->isEmpty()){
            return view('website.home', [
                'carruseles' => Models\Carrusel::all(),
                'destacados' => Models\Producto::where('destacado', true)->get()
            ]);
        }
        return view('building');

    }

    public function carta(){
        if(!Models\Producto::limit(1)->get()->isEmpty()){
            return view('website.carta', [
                'secciones' => Models\Seccion::all()
            ]);
        }
        return view('building');
    }
}
