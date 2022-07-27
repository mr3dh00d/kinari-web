<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models;
use Darryldecode\Cart\Facades\CartFacade as Cart;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request as GuzzleRequest;

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
        Cart::remove($request->get('id'));
        return ['status' => 'success'];
    }
    
    public function obtenerCarrito(Request $request) {
        return ['contenido' => Cart::getContent(), 'subtotal' => Cart::getSubTotal()];
    }
    
    public function resumen(){
        return view('website.pago.resumen', [
            'carrito' => Cart::class
        ]);
    }

    public function datosPersonales(){
        return view('website.pago.datos-personales');
    }

    public function setDatosPersonales(Request $request){
        $cliente = $request->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'correo' => 'required',
            'celular' => 'required'
        ]);
        $direccion = $request->validate([
            'calle' => 'required',
            'numero' => 'required',
            'comuna' => 'required'
        ]);
        try {
            $queryDestino = join(" ", $direccion);
            $destino = $this->getPlaceSearch("https://maps.googleapis.com/maps/api/place/textsearch/json?query=$queryDestino");
            $direccion = join(", ", array_slice(explode(", ", $destino['address']), 0, 2));
            $destinoLocation = $destino['location'];
            $queryOrigen = env('LOCAL_ADDRESS', '');
            $origen = $this->getPlaceSearch("https://maps.googleapis.com/maps/api/place/textsearch/json?query=$queryOrigen")['location'];
            $distancia = $this->getDistance("https://maps.googleapis.com/maps/api/distancematrix/json?destinations=$destinoLocation&origins=$origen");
        } catch (\Throwable $th) {
            return back()->withInput()->withErrors([
                'message' => 'No fue posible encontrar la dirección indicada',
            ]);
        }
        $request->session()->put('personal-data', [
            'cliente' => $cliente,
            'direccion' => $direccion,
            'distancia' => $distancia
        ]);
        return redirect('/checkout');
    }

    public function checkout(Request $request){
        if (!$request->session()->has('personal-data')) {
            return redirect()->back();
        }
        return view('website.pago.checkout');
    }
    
    public function resultado(){
        return view('website.pago.resultado');
    }

    private function getPlaceSearch($endpoint){
        $key = env('GOOGLE_MAPS_API_KEY', '');
        $endpoint = "$endpoint&key=$key";
        $client = new Client();
        $guzzleRequest = new GuzzleRequest('GET', $endpoint);
        $promise = $client->sendAsync($guzzleRequest)
            ->then(function ($response) {
                $body = json_decode($response->getBody()->getContents(), true);
                return [
                    'address' => $body["results"][0]["formatted_address"],
                    'location' => join(",",$body["results"][0]["geometry"]["location"])
                ];
            });
        return $promise->wait();
    }

    private function getDistance($endpoint){
        $key = env('GOOGLE_MAPS_API_KEY', '');
        $endpoint = "$endpoint&key=$key";
        $client = new Client();
        $guzzleRequest = new GuzzleRequest('GET', $endpoint);
        $promise = $client->sendAsync($guzzleRequest)
            ->then(function ($response) {
                $body = json_decode($response->getBody()->getContents(), true);
                 return $body["rows"][0]["elements"][0]["distance"]["value"];
            });
        return $promise->wait();
    }
}

