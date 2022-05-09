<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return redirect('/secciones');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request->validate([
            'seccion' => 'required'
        ]);

        return view('admin.products.create', [
            'seccion' => Models\Seccion::findOrFail($request->get('seccion'))
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Guardar los datos del producto
        $request->validate([
            'seccion' => 'required|integer',
            'nombre' => 'required',
            'imagen' => 'required|image',
            'imagen_desc' => 'required',
            'precio' => 'required|integer',
            'palab_clave' => 'required',
            'descripcion' => 'required'
        ], [
            'nombre.required' => 'El nombre es requerido',
            'imagen.required' => 'La imagen es requerida',
            'imagen.image' => 'El archivo debe de ser una imagen',
            'imagen_desc.required' => 'La imagen debe llevar descripcion',
            'precio.required' => 'El precio es requerido',
            'precio.number' => 'El precio debe ser un número',
            'palab_clave.required' => 'Las palabras claves son requeridas',
            'descripcion.required' => 'La descripcion es requerida'
        ]);

        $producto = new Models\Producto();
        $destacado = false;
        if($request->get('destacado') !== null){
            $destacado = true;
        }
        $producto->destacado = $destacado;
        $producto->orden = count(Models\Seccion::findOrFail($request->get('seccion'))->productos);
        $producto->nombre = $request->get('nombre');
        $producto->palabras_claves = json_encode(explode(', ', $request->get('palab_clave')));
        $producto->descripcion = $request->get('descripcion');
        $producto->precio = $request->get('precio');
        $producto->seccion_id = $request->get('seccion');
        $producto->save();

        $file = $request->file('imagen');
        $filename = $file->getClientOriginalName();
        Storage::disk('productos')->put($filename, \File::get($file));

        $imagen = new Models\Imagen();
        $imagen->nombre = $filename;
        $imagen->descripcion = $request->get('imagen_desc');
        $imagen->ruta = Storage::disk('productos')->url($filename);
        $imagen->producto_id = $producto->id;
        $imagen->save();

        return redirect('/secciones/'.$request->get('seccion'));
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $producto = Models\Producto::findOrFail($id);
        return redirect('/secciones/'.$producto->seccion->id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.products.edit', [
            'producto' => Models\Producto::findOrFail($id)
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
        //Guardar los cambios del producto
        $request->validate([
            'nombre' => 'required',
            'imagen_desc' => 'required',
            'precio' => 'required|integer',
            'palab_clave' => 'required',
            'descripcion' => 'required'
        ], [
            'nombre.required' => 'El nombre es requerido',
            'imagen.required' => 'La imagen es requerida',
            'imagen_desc.required' => 'La imagen debe llevar descripcion',
            'precio.required' => 'El precio es requerido',
            'precio.number' => 'El precio debe ser un número',
            'palab_clave.required' => 'Las palabras claves son requeridas',
            'descripcion.required' => 'La descripcion es requerida'
        ]);

        $producto = Models\Producto::findOrFail($id);
        $imagen = $producto->imagen;

        if($request->file('imagen') !== null){
            $request->validate([
                'imagen' => 'required|image',
            ],[
                'imagen.image' => 'El archivo debe de ser una imagen',
            ]);

            //eliminar imagen antigua
            if(count(Models\Imagen::where('nombre', $imagen->nombre)->get()) < 2){
                Storage::disk('productos')->delete($imagen->nombre);
            }

            //Subir nueva imagen
            $file = $request->file('imagen');
            $filename = $file->getClientOriginalName();
            Storage::disk('productos')->put($filename, \File::get($file));

            //Editar imagen
            $imagen->nombre = $filename;
            $imagen->ruta = Storage::disk('productos')->url($filename);
        }

        $destacado = false;
        if($request->get('destacado') !== null){
            $destacado = true;
        }
        $producto->destacado = $destacado;
        $producto->nombre = $request->get('nombre');
        $producto->palabras_claves = json_encode(explode(',', $request->get('palab_clave')));
        $producto->descripcion = $request->get('descripcion');
        $producto->precio = $request->get('precio');

        $imagen->descripcion = $request->get('imagen_desc');


        $producto->save();
        $imagen->save();

        return redirect('/secciones/'.$producto->seccion->id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Eliminar producto
        $producto = Models\Producto::findOrFail($id);
        $id = $producto->seccion->id;
        $imagen = $producto->imagen;
        if(count(Models\Imagen::where('nombre', $imagen->nombre)->get()) < 2){
            Storage::disk('productos')->delete($imagen->nombre);
        }
        $imagen->delete();
        $producto->delete();
        return redirect('/secciones/'.$id);
    }

    public function cambiarOrden(Request $request){
        $request->validate([
            'orden' => 'required'
        ]);
        $i = 0;
        foreach ($request->get('orden') as $orden) {
            $producto = Models\Producto::find($orden);
            if(isset($producto)){
                $producto->orden = $i;
                $producto->save();
                $i++;
            }
        }
        return [
            'respuesta' => 'OK'
        ];
    }
}
