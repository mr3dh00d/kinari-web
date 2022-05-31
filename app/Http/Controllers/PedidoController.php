<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PedidoController extends Controller
{
    public function pedidosTodos(Request $request){
        return view('admin.pedidos.todos');
    }

    public function pedidosNuevos(Request $request){
        return view('admin.pedidos.nuevos');
    }
}
