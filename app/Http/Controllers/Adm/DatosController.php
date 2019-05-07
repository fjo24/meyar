<?php

namespace App\Http\Controllers\Adm;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Dato;

class DatosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos = Dato::orderBy('telefono', 'ASC')->get();
        return view('adm.datos.index', compact('datos'));
    }

    public function edit($id)
    {
        $dato = Dato::find($id);
        return view('adm.datos.edit', compact('dato'));
    }

    public function update(Request $request, $id)
    {
        $dato = Dato::find($id);
        $dato->direccion = $request->direccion;
        $dato->email  = $request->email;
        $dato->telefono  = $request->telefono;
        $dato->save();
        return redirect()->route('datos.index');
    }
}
