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
    public function page()
    {
        return view('adm.datos.index');
    }

    public function index(Request $request)
    {
        $datos = Dato::orderBy('id', 'DESC')->get();

        return [
            'datos' => $datos 
        ];
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'keep' => 'required'
        ]);

        Dato::create($request->all());

        return;
    }

    public function edit(Dato $Dato)
    {
        return $Dato;
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'direccion' => 'required',
            'telefono' => 'required'
        ]);
        $Dato = Dato::find($id)->update($request->all());
        return;
    }

    public function destroy(Dato $Dato)
    {
        $Dato->delete();
    }
}
