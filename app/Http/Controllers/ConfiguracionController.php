<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models;

class ConfiguracionController extends Controller
{
    public function index(){
        return view('admin.settings.index');
    }
    public function obtenerSuperUsuario(Request $request){
        $request->validate([
            'user-type' => 'required'
        ]);
        if($request->get('user-type') == 'administrador')
            return Models\Administrador::all();
        elseif($request->get('user-type') == 'cajero')
            return Models\Cajero::all();
        return back()->with('error', 'Tipo de usuario no especificado');
    }
    public function guardarSuperUsuario(Request $request){
        $request->validate([
            'user-type' => 'required',
            'nombre' => 'required',
            'correo' => 'required|email',
            'password' => 'required|confirmed|min:6',
        ],[
            'nombre.required' => 'Necesita un nombre',
            'correo.required' => 'Necesita un correo',
            'correo.email' => 'El formato del correo no es correcto',
            'password.required' => 'Se necesita una contraseña',
            'password.confirmed' => 'Las contraseñas no coinciden',
            'password.min' => 'La contraseña debe ser de al menos :min caracteres',
        ]);

        $id = $request->get('id');
        if(is_null($id)){
            $request->validate([
                'correo' => 'unique:users,email'
            ],[
                'correo.unique' => 'El correo ya esta registrado'
            ]);
        }
        $userType = $request->get('user-type');
        if($userType == 'administrador'){
            $superUser =  !is_null($id) ? Models\Administrador::findOrFail($id) : new Models\Administrador();
        }elseif($userType == 'cajero'){
            $superUser =  !is_null($id) ? Models\Cajero::findOrFail($id) : new Models\Cajero();
        }

        $superUser->name = $request->get('nombre');
        $superUser->email = $request->get('correo');
        $superUser->password = Hash::make($request->get('password'));

        $superUser->save();
        
        return ['message' => 'Se ha guardado el administrador con éxito'];

    }
    public function eliminarSuperUsuario(Request $request){
        $request->validate([
            'user-type' => 'required',
            'id' => 'required'
        ]);
        $id = $request->get('id');
        $userType = $request->get('user-type');
        if($userType == 'administrador'){
            $superUser =  Models\Administrador::findOrFail($id);
        }elseif($userType == 'cajero'){
            $superUser =  Models\Cajero::findOrFail($id);
        }
        if(Auth::user()->id == $superUser->id){
            return [
                'message' => 'No se puede eliminiar el usuario ya que eres tú',
                'errors' => true
            ];
        }

        $superUser->delete();
        return ['message' => 'Se ha eliminado el usuario con éxito'];

    }
    public function obtenerRangos(Request $request){
        return Models\RangoDistancia::orderBy('distancia')->get();
    }
    public function guardarRangos(Request $request){
        $validate = $request->validate([
            'distancia' => 'required|int',
            'costo' => 'required|int',
        ], [
            'distancia.required' => 'Necesita una distancia',
            'distancia.unique' => 'Esa distancia ya está configurada',
            'costo.required' => 'Necesita un costo'
        ]);
        $update = Models\RangoDistancia::where('distancia', $validate['distancia'])->first();
        if(!is_null($update)){
            $update->update($validate);
            return ['message' => 'Se ha actualizado un rango con éxito'];
        }
        Models\RangoDistancia::create($validate);
        return ['message' => 'Se ha creado un rango con éxito'];
    }
    public function eliminarRangos(Request $request){
        $validate = $request->validate([
            'id' => 'required'
        ]);
        Models\RangoDistancia::findOrFail($request->get('id'))->delete();
        return [
            'message' => 'Se ha eliminado el rango de distancia con éxito'
        ];
    } 
}
