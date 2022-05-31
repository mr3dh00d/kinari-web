<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models;
use App\Models\Seccion;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class SecctionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //secctions->index
        return view('admin.secctions.index', [
            'secciones' => Seccion::orderBy('orden')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //products->index
        return view('admin.secctions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|unique:secciones,nombre'
        ], [
            'nombre.required' => 'El nombre es requerido',
            'nombre.unique' => 'El nombre ya esta en uso'
        ]);
        $seccion = new Seccion();
        $seccion->orden = count(Seccion::all());
        $seccion->nombre = $request->get('nombre');
        $seccion->save();
        return redirect('/secciones');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view("admin.products.index", [
            'seccion' => Seccion::findOrFail($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.secctions.edit', [
            'seccion' => Seccion::findOrFail($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|unique:secciones,nombre'
        ], [
            'nombre.required' => 'El nombre es requerido',
            'nombre.unique' => 'El nombre ya esta en uso'
        ]);

        $nombre = $request->get('nombre');
        $seccion = Seccion::findOrFail($id);
        $seccion->nombre = $nombre;
        $seccion->save();

        return redirect('/secciones');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        //dd("esto en aca?");
        $seccion = Seccion::findOrFail($id);
        foreach ($seccion->productos as $producto) {
            $imagen = $producto->imagen;
            if(count(Models\Imagen::where('nombre', $imagen->nombre)->get()) < 2){
                Storage::disk('productos')->delete($imagen->nombre);
            }
            $imagen->delete();
            $producto->delete();
        }
        $seccion->delete();
        return redirect('/secciones');
    }

    public function cambiarOrden(Request $request){
        $request->validate([
            'orden' => 'required'
        ]);
        $i = 0;
        foreach ($request->get('orden') as $orden) {
            $seccion = Seccion::find($orden);
            if(isset($seccion)){
                $seccion->orden = $i;
                $seccion->save();
                $i++;
            }
        }
        return [
            'respuesta' => 'OK'
        ];
    }
}
