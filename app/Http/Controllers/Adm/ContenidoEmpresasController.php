<?php

namespace App\Http\Controllers\Adm;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contenido_empresa;

class ContenidoEmpresasController extends Controller
{
    public function index()
    {
        $contenido_empresas = Contenido_empresa::orderBy('nombre', 'ASC')->get();
        return view('adm.contenido_empresas.index')->with('contenido_empresas', $contenido_empresas);
    }

    public function create()
    {
        return view('adm.contenido_empresas.create');
    }

    public function store(Request $request)
    {
        $contenido_empresas              = new Contenido_empresa();
        $contenido_empresas->nombre      = $request->nombre;
        $contenido_empresas->descripcion = $request->descripcion;
        $contenido_empresas->contenido   = $request->contenido;
        $contenido_empresas->contenido2   = $request->contenido2;
        $contenido_empresas->video        = $request->video;
        $id                  = Contenido_empresa::all()->max('id');
        $id++;
        if ($request->hasFile('imagen')) {
            if ($request->file('imagen')->isValid()) {
                $file = $request->file('imagen');
                $path = public_path('img/contenido_empresa/');
                $request->file('imagen')->move($path, $id . '_' . $file->getClientOriginalName());
                $contenido_empresas->imagen = 'img/contenido_empresa/' . $id . '_' . $file->getClientOriginalName();
            }
        }
        $contenido_empresas->save();
        
        return view('adm.dashboard');
    }
    
    public function edit($id)
    {
        $contenido_empresas  = Contenido_empresa::find($id);
        return view('adm.contenido_empresas.edit')
        ->with('contenido_empresas', $contenido_empresas);
    }
    
    public function update(Request $request, $id)
    {
        $contenido_empresas              = Contenido_empresa::find($id);
        $contenido_empresas->nombre      = $request->nombre;
        $contenido_empresas->descripcion = $request->descripcion;
        $contenido_empresas->contenido   = $request->contenido;
        $contenido_empresas->contenido2   = $request->contenido2;
        $contenido_empresas->video        = $request->video;
        
        if ($request->hasFile('imagen')) {
            if ($request->file('imagen')->isValid()) {
                $file = $request->file('imagen');
                $path = public_path('img/contenido_empresa/');
                $request->file('imagen')->move($path, $id . '_' . $file->getClientOriginalName());
                $contenido_empresas->imagen = 'img/contenido_empresa/' . $id . '_' . $file->getClientOriginalName();
            }
        }
        $contenido_empresas->update();

        return view('adm.dashboard');
    }
}
