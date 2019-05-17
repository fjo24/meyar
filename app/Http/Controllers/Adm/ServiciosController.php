<?php

namespace App\Http\Controllers\adm;

use App\Http\Controllers\Controller;
use App\Http\Requests\ServicioRequest;
use Illuminate\Http\Request;
use App\Servicio;

class ServiciosController extends Controller
{
    public function index()
    {
        $servicios = servicio::orderBy('id', 'ASC')->get();
        return view('adm.servicios.index')
            ->with('servicios', $servicios);
    }

    public function edit($id)
    {
        $servicio = Servicio::find($id);
        return view('adm.servicios.edit')
            ->with('servicio', $servicio);
    }

    public function update(Request $request, $id)
    {
        $servicio        = servicio::find($id);
        $servicio->texto = $request->texto;
        $servicio->link  = $request->link;
        $servicio->orden = $request->orden;
        if ($request->hasFile('imagen')) {
            if ($request->file('imagen')->isValid()) {
                $file = $request->file('imagen');
                $path = public_path('img/servicio/');
                $request->file('imagen')->move($path, $id . '_' . $file->getClientOriginalName());
                $servicio->imagen = 'img/servicio/' . $id . '_' . $file->getClientOriginalName();
            }
        }

        $servicio->save();

        return redirect()->route('servicios.index');
    }
}