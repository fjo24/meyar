<?php

namespace App\Http\Controllers\Adm;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Pedido;

class PedidosController extends Controller
{
    public function index()
    {
        $pedidos = Pedido::OrderBy('id', 'ASC')->get();
        return view('adm.pedidos.index', compact('pedidos'));
    }

    public function show($id)
    {
        $pedido = Pedido::find($id);
        return view('adm.pedidos.show', compact('pedido'));
    }
}