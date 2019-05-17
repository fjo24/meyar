<?php

namespace App\Http\Controllers\Adm;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Valor_agregado;

class AgregadosController extends Controller
{
    public function index()
    {
        $agregados = Valor_agregado::orderBy('id', 'ASC')->get();
        return view('adm.valor_agregados.index', compact('agregados'));
    }

    public function create()
    {
        return view('adm.valor_agregados.create');
    }

    public function store(Request $request)
    {
        $agregado          = new Valor_agregado();
        $agregado->descripcion   = $request->descripcion;
        $id              = Valor_agregado::all()->max('id');
        $id++;
        if ($request->hasFile('imagen')) {
            if ($request->file('imagen')->isValid()) {
                $file = $request->file('imagen');
                $path = public_path('img/agregado/');
                $request->file('imagen')->move($path, $id . '_' . $file->getClientOriginalName());
                $agregado->imagen = 'img/agregado/' . $id . '_' . $file->getClientOriginalName();
            }
        }
        $agregado->save();

        return redirect()->route('valor_agregados.index');

    }
    public function edit($id)
    {
        $agregado = Valor_agregado::find($id);
        return view('adm.valor_agregados.edit')
            ->with('agregado', $agregado);
    }

    public function update(Request $request, $id)
    {
        $id              = Valor_agregado::all()->max('id');
        $agregado          = Valor_agregado::find($id);
        $agregado->descripcion   = $request->descripcion;
        $id++;

        if ($request->hasFile('imagen')) {
            if ($request->file('imagen')->isValid()) {
                $file = $request->file('imagen');
                $path = public_path('img/agregado/');
                $request->file('imagen')->move($path, $id . '_' . $file->getClientOriginalName());
                $agregado->imagen = 'img/agregado/' . $id . '_' . $file->getClientOriginalName();
            }
        }

        $agregado->update();
        return redirect()->route('valor_agregados.index');
    }

    public function destroy($id)
    {
        $agregado = Valor_agregado::find($id);
        $agregado->delete();
        return redirect()->route('valor_agregados.index');
    }
}
