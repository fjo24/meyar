<?php

namespace App\Http\Controllers;

use App\Categoria;
use App\Contenido_home;
use App\Contenido_calidad;
use App\Pregunta;
use App\User;
use App\Dato;
use App\Banner;
use App\Calidad;
use App\Destacado_home;
use App\Destacado_mantenimiento;
use App\Contenido_empresa;
use App\Rubro;
use App\Tiempo;
use App\Novedad;
use App\Video;
use App\Producto_relacionado;
use App\Metadato;
use App\Producto;
use App\Servicio;   
use App\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Valor_agregado;

class PaginasController extends Controller
{
    public function home()
    {
        $activo    = 'home';

        $sliders   = Slider::orderBy('orden', 'ASC')->Where('seccion', 'home')->get();
        $productos = Producto::OrderBy('orden', 'ASC')->take(4)->get();
        $banner = Banner::first();
        $servicios = Servicio::OrderBy('orden', 'ASC')->get();
    /*    $bloque1   = Destacado_home::find(1);
        $bloque2   = Destacado_home::find(2);
        $bloque3   = Destacado_home::find(3);
        $bloque4   = Destacado_home::find(4);
        $contenido = Contenido_home::find(1);
        $contenido2 = Contenido_home::find(2); */
        return view('pages.home', compact('sliders', 'activo', 'productos', 'banner', 'servicios'/* , 'servicios', 'banner', 'contenido', 'activo', 'bloque1', 'bloque2', 'bloque3', 'bloque4', 'contenido2' */));
    }

    public function categorias()
    {
        $activo    = 'productos';
        $categorias = Categoria::OrderBy('orden', 'asc')->Where('categoria_id', null)->get();
        return view('pages.categorias', compact('categorias', 'activo'));
    }

    public function cat_productos($id)
    {
        $activo    = 'productos';
        $categoria = Categoria::find($id);
        $ready = 0;
        $productos = Producto::OrderBy('orden', 'asc')
        ->Where('categoria_id', $id)
        /* ->where('visible', '<>', 'privado') */->get();
        $categorias = Categoria::OrderBy('orden', 'asc')->Where('categoria_id', null)->get();
        return view('pages.cat_productos', compact('productos', 'categoria', 'ready', 'categorias', 'id', 'activo'));
    }

    public function subcat_productos($id)
    {
        $activo    = 'productos';
        $subcat = Categoria::find($id);
        $categoria = Categoria::find($subcat->categoria_id);
        $ready = 0;
        $productos = Producto::OrderBy('orden', 'asc')
        ->Where('categoria_id', $id)
        /* ->where('visible', '<>', 'privado') */->get();
        $categorias = Categoria::OrderBy('orden', 'asc')->Where('categoria_id', null)->get();
        return view('pages.subcat_productos', compact('productos', 'subcat', 'categoria', 'ready', 'categorias', 'id', 'activo'));
    }
    
    public function productoinfo($id)
    {
        $activo    = 'productos';
        $producto = Producto::find($id);
        $categoria = Categoria::find($producto->categoria_id);
        $categorias = Categoria::OrderBy('orden', 'asc')->Where('categoria_id', null)->get();
        /* dd($categoria->categoria_id); */
        if (!is_null($categoria->categoria_id)) {
            $subcat = $categoria;
            $categoria = Categoria::find($categoria->categoria_id);
            $id = $subcat->id;
        }else{
            $subcat = null;
            $id = $categoria->id;
        }
        $relacionados = Producto::OrderBy('orden', 'asc')->take(3)->Where('categoria_id', $id)->get();
        $productos = Producto::OrderBy('orden', 'asc')
        ->Where('categoria_id', $id)
        /* ->where('visible', '<>', 'privado') */->get();
        /* $categorias = Categoria::OrderBy('orden', 'asc')->Where('categoria_id', null)->get(); */
        return view('pages.productoinfo', compact('relacionados', 'categoria', 'activo', 'subcat', 'productos', 'categorias', 'producto'));
    }

    public function downloadficha($id)
    {
        $producto = Producto::find($id);
        $path     = public_path();
        $url      = $path . '/' . $producto->ficha;
        return response()->download($url);
        /* return redirect()->route('pages.productoinfo'); */
    }

    public function contacto()
    {
        $activo = 'contacto';
        return view('pages.contacto', compact('activo'));
    }
    public function enviarmailcontacto(Request $request)
    {
        $activo   = 'contacto';
        $dato     = Dato::first();
        $nombre   = $request->nombre;
        $telefono = $request->telefono;
        $apellido  = $request->apellido;
        $email    = $request->email;
        $mensaje  = $request->mensaje;
       //     dd($producto);
        Mail::send('pages.emails.contactomail', ['nombre' => $nombre, 'telefono' => $telefono, 'apellido' => $apellido, 'email' => $email, 'mensaje' => $mensaje], function ($message){
            $dato = Dato::first();
            $message->from('ventas@meyargroup.com.ar', 'Contacto | Meyar');
            $message->to($dato->email);
            //Add a subject
            $message->subject('Consulta desde web');
        });
        if (Mail::failures()) {
            return view('pages.contacto', compact('activo'));
        }
        return back();
    }

    public function ofertas()
    {
        $activo = 'ofertas';
        $productos = Producto::OrderBy('orden', 'ASC')->Where('promocion', '<>', 'ninguna')->get();
        return view('pages.ofertas', compact('productos', 'activo'));
    }

    public function presupuesto()
    {
        $activo = 'presupuesto';
        return view('pages.presupuesto', compact('activo'));
    }

    public function enviarpresupuesto(Request $request)
    {
        $activo = 'presupuesto';
        $sliders   = Slider::orderBy('id', 'ASC')->Where('seccion', 'presupuesto')->get();
        $nombre    = $request->nombre;
        $mail      = $request->mail;
        $localidad = $request->localidad;
        $tel       = $request->tel;
        $detalle   = $request->detalle;
        $medida    = $request->medida;

        $newid = producto::all()->max('id');
        $newid++;

        if ($request->hasFile('archivo')) {
            if ($request->file('archivo')->isValid()) {
                $file = $request->file('archivo');
                $path = public_path('img/archivos/');
                $request->file('archivo')->move($path, $newid . '_' . $file->getClientOriginalName());
                $archivo = 'img/archivos/' . $newid . '_' . $file->getClientOriginalName();

            }
        }

        Mail::send('pages.emails.presupuesto', ['nombre' => $nombre, 'tel' => $tel, 'mail' => $mail, 'localidad' => $localidad, 'detalle' => $detalle, 'medida' => $medida], function ($message) use ($archivo) {

            $dato = Dato::first();
            $message->from('ventas@meyargroup.com.ar', 'Meyar');

            $message->to($dato->email);

            //Attach file
            $message->attach($archivo);

            //Add a subject
            $message->subject("Presupuesto");

        });
        if (Mail::failures()) {
            $mensaje = 'Ha ocurrido un error al enviar el correo';
            return view('pages.presupuesto', compact('activo', 'mensaje'));
        }else{
            $mensaje = 'Solicitud enviada correctamente!!'; 
            return view('pages.presupuesto', compact('activo', 'mensaje'));
        }
    }

    public function empresa()
    {
        $activo = 'empresa';
        $valores = Valor_agregado::OrderBy('id', 'ASC')->get();
        $empresa = Contenido_empresa::first();
        return view('pages.empresa', compact('empresa', 'activo', 'valores'));
    }

}
