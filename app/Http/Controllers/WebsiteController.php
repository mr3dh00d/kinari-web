<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models;
use Darryldecode\Cart\Facades\CartFacade as Cart;

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

    // public function obtenerSecciones(){
    //     return Models\Seccion::has('productos')
    //         ->with(['productos' => function ($query){
    //             $query->with('imagen')->orderBy('orden')->get();
    //         }])
    //         ->orderBy('orden')
    //         ->get();
    // }
    public function obtenerSecciones(Request $request){
        return Models\Producto::whereJsonContains('palabras_claves', $request->get('query'))
            ->orWhere('descripcion', 'like', '%'.$request->get('query').'%')
            ->orWhere('nombre', 'like', '%'.$request->get('query').'%')
            ->with('imagen')->get();  
    }
    public function obtenerProducto(Request $request) {
        return Models\Producto::where('id', $request->get('id'))
            ->with('imagen')
            ->first();
    }


    public function agregarCarrito(Request $request) {
        $producto = Models\Producto::findOrFail($request->get('id'));
        $action = $request->get('action');
        if(!is_null(Cart::get($producto->id))){
            if ($action == 'add'){
                Cart::update($producto->id, array(
                    'quantity' => 1,
                ));
            }else if($action == 'delete'){
                Cart::update($producto->id, array(
                    'quantity' => -1,
                ));
            }
            return ['status' => 'actualice'];
        }else if(is_null(Cart::get($producto->id)) && $action == 'add'){
            Cart::add(array(
                'id' => $producto->id,
                'name' => $producto->nombre,
                'price' => $producto->precio,
                'quantity' => 1,
                'attributes' => array(),
                'associatedModel' => $producto
            ));
            return ['status' => 'añadí'];
        }
    }
    public function eliminarCarrito(Request $request) {
        // return [$request->get('id')];
        Cart::remove($request->get('id'));
        return ['status' => 'success'];
    }
    public function obtenerCarrito(Request $request) {
        // Cart::clear();
        return Cart::getContent();
    }
    




    // public function resumen(){
    //     return view('website.pago.resumen');
    // }
    // public function seleccionarDireccion(){
    //     return view('website.pago.direccion');
    // }
    // public function checkout(){
    //     return view('website.pago.checkout');
    // }
    // public function resultado(){
    //     return view('website.pago.resultado');
    // }
}

