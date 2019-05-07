<?php

namespace App\Http\Controllers\Adm;

use App\Modelo;
use App\Rubro;
use App\Categoria;
use App\Aplicacion;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductosRequest;
use App\Imgproducto;
use App\Categoria_pregunta;
use App\Producto;
use App\Producto_relacionado;

class ProductosController extends Controller
{
    //'nombre', 'ventajas', 'descripcion', 'contenido', 'categoria_id', 'caracteristicas', 'manual', 'despiece', 'visible', 'orden', 'presentacion', 'imagen_presentacion', 'precio', 'rubro_id', 'modelo_id', 

    public function index()
    {
        $productos = producto::orderBy('codigo', 'ASC')->get();
        return view('adm.productos.index', compact('productos'));
    }

    public function create()
    {
        $relacionados = Producto::orderBy('descripcion', 'ASC')->pluck('descripcion', 'id')->all();
        $categorias = Categoria::orderBy('nombre', 'ASC')->pluck('nombre', 'id')->all();
        return view('adm.productos.create', compact('categorias', 'relacionados'));
    }

    public function store(Request $request)
    {
        $producto                    = new Producto();
        $producto->codigo            = $request->codigo;
        $producto->descripcion          = $request->descripcion;
        $producto->ancho_total         = $request->ancho_total;
        $producto->largo_total      = $request->largo_total;
        $producto->alto   = $request->alto;
        $producto->peso           = $request->peso;
        $producto->contenido= $request->contenido;
        $producto->orden             = $request->orden;
        $producto->promocion             = $request->promocion;
        $producto->categoria_id             = $request->categoria_id;
        $producto->precio      = $request->precio;
        $id              = Producto::all()->max('id');
        $id++;
        /*foreach ($request->relacionados as $rela) {
            $relacionado = new Producto_relacionado();
            $relacionado->producto_a = $id;
            $relacionado->producto_b = 0;
            $relacionado->producto_id = $request->producto->id;
            $relacionado->save();
        }*/
        if ($request->hasFile('ficha')) {
            if ($request->file('ficha')->isValid()) {
                $file = $request->file('ficha');
                $path = public_path('img/producto/ficha/');
                $request->file('ficha')->move($path, $id . '_' . $file->getClientOriginalName());
                $producto->ficha = 'img/producto/ficha/' . $id . '_' . $file->getClientOriginalName();
            }
        }
        if ($request->hasFile('imagen')) {
            if ($request->file('imagen')->isValid()) {
                $file = $request->file('imagen');
                $path = public_path('img/producto/imagen/');
                $request->file('imagen')->move($path, $id . '_' . $file->getClientOriginalName());
                $producto->imagen = 'img/producto/imagen/' . $id . '_' . $file->getClientOriginalName();
            }
        }
        $producto->save();

        return redirect()->route('productos.index');
    }

    //admin de imagenes
    public function imagenes($id)
    {
        $imagenes = Imgproducto::orderBy('id', 'ASC')->Where('producto_id', $id)->get();
        $producto = producto::find($id);
        return view('adm.productos.imagenes')->with(compact('imagenes', 'producto'));
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $producto = Producto::find($id);
        $relacionados = Producto::orderBy('descripcion', 'ASC')->pluck('descripcion', 'id')->all();
        $categorias = Categoria::orderBy('nombre', 'ASC')->pluck('nombre', 'id')->all();
        return view('adm.productos.edit', compact('categorias', 'producto', 'relacionados'));
    }

    public function update(Request $request, $id)
    {
        $producto = Producto::find($id);

        $producto->codigo            = $request->codigo;
        $producto->descripcion          = $request->descripcion;
        $producto->ancho_total         = $request->ancho_total;
        $producto->largo_total      = $request->largo_total;
        $producto->alto   = $request->alto;
        $producto->peso           = $request->peso;
        $producto->contenido= $request->contenido;
        $producto->orden             = $request->orden;
        $producto->promocion             = $request->promocion;
        $producto->categoria_id             = $request->categoria_id;
        $producto->precio      = $request->precio;
        $id              = $producto->id;
        /*foreach ($request->relacionados as $rela) {
            $relacionado = new Producto_relacionado();
            $relacionado->producto_a = $id;
            $relacionado->producto_b = 0;
            $relacionado->producto_id = $request->producto->id;
            $relacionado->save();
        }*/
        if ($request->hasFile('ficha')) {
            if ($request->file('ficha')->isValid()) {
                $file = $request->file('ficha');
                $path = public_path('img/producto/ficha/');
                $request->file('ficha')->move($path, $id . '_' . $file->getClientOriginalName());
                $producto->ficha = 'img/producto/ficha/' . $id . '_' . $file->getClientOriginalName();
            }
        }
        if ($request->hasFile('imagen')) {
            if ($request->file('imagen')->isValid()) {
                $file = $request->file('imagen');
                $path = public_path('img/producto/imagen/');
                $request->file('imagen')->move($path, $id . '_' . $file->getClientOriginalName());
                $producto->imagen = 'img/producto/imagen/' . $id . '_' . $file->getClientOriginalName();
            }
        }
        $producto->update();

        return redirect()->route('productos.index');
    }

    public function destroy($id)
    {
        $producto = producto::find($id);
        $producto->delete();
        return redirect()->route('productos.index');
    }

    public function nuevaimagen(Request $request, $id)
    {
        if ($request->HasFile('file')) {
            foreach ($request->file as $file) {
                $filename = $file->getClientOriginalName();
                $path     = public_path('img/producto/');
                $file->move($path, $id . '_' . $file->getClientOriginalName());
                $imagen              = new Imgproducto;
                $imagen->imagen   = 'img/producto/' . $id . '_' . $file->getClientOriginalName();
                $imagen->producto_id = $id;
                $imagen->save();
            }
        }
        $imagenes = Imgproducto::orderBy('id', 'ASC')->Where('producto_id', $id)->get();

        $producto = producto::find($id);
        return view('adm.productos.imagenes')->with(compact('imagenes', 'producto'));
    }

    public function destroyimg($id)
    {
        $imagen = Imgproducto::find($id);
        $idpro  = $imagen->producto_id;
        $imagen->delete();
        $imagenes = Imgproducto::orderBy('id', 'ASC')->Where('producto_id', $idpro)->get();

        $producto = producto::find($idpro);
        return view('adm.productos.imagenes')->with(compact('imagenes', 'producto'));
    }
}
