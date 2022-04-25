<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models;

class CarruselController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.carrusel.index', [
            'carruseles' => Models\Carrusel::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.carrusel.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'descripcion' => 'required',
            'imagen' => 'required|image'
        ],[
            'descripcion.required' => 'La descripcion es requerida',
            'imagen.required' => 'La imagen es requerida',
            'imagen.image' => 'El archivo debe ser una imagen',
        ]);

        $carrusel = new Models\Carrusel();
        
        $file = $request->file('imagen');
        $filename = $file->getClientOriginalName();
        Storage::disk('carrusel')->put($filename, \File::get($file));

        $carrusel->nombre = $filename;
        $carrusel->ruta = Storage::disk('carrusel')->url($filename);
        $carrusel->descripcion = $request->get('descripcion');
        $carrusel->save();

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return redirect('/carrusel/'.$id.'/edit');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        return view('admin.carrusel.edit', [
            'carrusel' => Models\Carrusel::findOrFail($id)
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
            'descripcion' => 'required',
        ],[
            'descripcion.required' => 'La descripcion es requerida',
        ]);

        $carrusel = Models\Carrusel::findOrFail($id);
        if($request->file('imagen') !== null){
            $request->validate([
                'imagen' => 'required|image',
            ],[
                'imagen.image' => 'El archivo debe de ser una imagen',
            ]);
             //eliminar imagen antigua
             if(count(Models\Carrusel::where('nombre', $carrusel->nombre)->get()) < 2){
                Storage::disk('carrusel')->delete($carrusel->nombre);
            }

             //Subir nueva imagen
             $file = $request->file('imagen');
             $filename = $file->getClientOriginalName();
             Storage::disk('carrusel')->put($filename, \File::get($file));
 
             //Editar imagen
             $carrusel->nombre = $filename;
             $carrusel->ruta = Storage::disk('carrusel')->url($filename);
        }

        $carrusel->descripcion = $request->get('descripcion');
        $carrusel->save();

        return redirect('/carrusel');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $carrusel = Models\Carrusel::findOrFail($id);
        if(count(Models\Carrusel::where('nombre', $carrusel->nombre)->get()) < 2){
            Storage::disk('carrusel')->delete($carrusel->nombre);
        }
        $carrusel->delete();
        return redirect('/carrusel');

    }
}
