<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models;

class AutenticacionController extends Controller
{
    public function login(){
        if(Auth::check())
        {
            return redirect('/');
        }
        return view('website.ingresar.login');
    }
    public function autenticacion(Request $request){
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        if (Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->intended('/');
        }

        return back()->withErrors([
            'email' => 'Correo o contraseña incorrecto.',
        ])->onlyInput('email');
    }

    public function register(){
        if(Auth::check())
        {
            return redirect('/');
        }
        return view('website.ingresar.register');
    }
    public function guardarUsuario(Request $request){
        $request -> validate([
            'name'=> 'required',
            'telefono'=> ['required', 'regex:/9[0-9]{8}/i'],
            'email'=> 'required',
            'password'=> 'required|confirmed|min:6'
        ],
        [
            'name.required' => 'El nombre es requerido.',
            'telefono.required' => 'El teléfono es requerido.',
            'telefono.regex' => 'El teléfono no tiene el formato correcto.',
            'email.required' => 'El correo es requerido.',
            'password.required' => 'La contraseña es requerida.',
            'password.confirmed' => 'Las contraseñas no coinciden.',
            'password.min' => 'La conteaseña debe tener al menos :min caracteres.'
        ]);

        $cliente = new Models\Cliente;
        $cliente->name = $request->get('name');
        $cliente->phone_number = $request->get('telefono');
        $cliente->email = $request->get('email');
        $cliente->password = Hash::make('password');

        $cliente->save();
        return view('website.ingresar.register', ['mensaje' => 'Se ha registrado con exito']);
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/acceso');
    }
}
