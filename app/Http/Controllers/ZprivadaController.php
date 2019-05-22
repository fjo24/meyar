<?php

namespace App\Http\Controllers;

use App\Catalogo;
use App\Categoria;
use App\Dato;
use App\Descuento;
use App\Pedido;
use App\Producto;
/* use App\Modelo; */
use Carbon\Carbon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Gloudemans\Shoppingcart\Contracts\Buyable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;

class ZprivadaController extends Controller
{
    public function productos()
    {
        $activo    = 'pedidos';
        $descuentos  = Descuento::OrderBy('porcentaje', 'ASC')->get();
        $carrito   = Cart::content();
        $items     = $carrito->all();
        $ready     = 0;
        $total_items = 0;
        $diferencia = null;
        $carrito     = Cart::content();
        $config    = 4;
        $id_desc = 0;
        $desc = 0;
        $cont = 0;
        $shop      = 0;
        $productos = Producto::OrderBy('orden', 'ASC')/* ->where('visible', '<>', 'publico') */->get();
        $aux       = Producto::orderBy('orden', 'ASC')->get();
        $prod      = $aux->toJson();
        $categorias = Categoria::orderBy('nombre', 'ASC')->pluck('nombre', 'id')->all();
       // dd($modelo);
        // dd($carrito->all());
        if (count($carrito)>0) {
            # code...
        foreach (Cart::content() as $row) {
            if ($row->options->aplica_desc==1) {
                $total_items = $total_items + $row->qty;
            }
        }
    }
        //  dd($total_items);
        foreach ($descuentos as $descuento) {
            if ($total_items >= $descuento->minimo) {
                $desc    = $descuento->porcentaje;
                $id_desc = $descuento->id;
                $sw = 1;
            } else {
                if ($sw=1) {
                    break;
                }else{                    
                    $desc    = 20;
                    $id_desc = null;
                }
            }
        }
//ubicar la diferencia para proximo descuento str_replace(array(',','.','*','/')
        $max               = Descuento::all()->max('minimo');
        $maximo = Descuento::Where('minimo', $max)->first();
        //dd($maximo);
        $diferencia=null;
        if ($maximo->id==$id_desc) {
            $diferencia==null;
        }elseif($total_items>0){
        $proximo = Descuento::find($id_desc+1);
        $diferencia = $proximo->minimo-$total_items;
        }else{
            $proximo = Descuento::first();
            $diferencia = $proximo->minimo;
        }

        return view('privada.productos', compact('modelos', 'desc', 'diferencia', 'proximo', 'descuentos', 'categorias', 'shop', 'carrito', 'activo', 'productos', 'ready', 'prod', 'config', 'items', 'cont'));
    }
public function store(Request $request){
      //$expediente = Expediente::create($request->all()); //Obtengo todos los campos enviados desde el formulario y creo el expediente
      return "Expediente creado!!!";
    }

    public function add(/* $id,  */$cantidad, $producto)
    {
/*         dd($cantidad); */
  $descuentos  = Descuento::OrderBy('porcentaje', 'ASC')->get();
        $activo    = 'productos';
        $carrito   = Cart::content();
        $items     = $carrito->all();
        $ready     = 0;
        $config    = 4;
        $im        = 0;
        $existe = 0;
        $shop      = 0;
        $total_items = 0;
        $productos = Producto::OrderBy('orden', 'DESC')->get();
        $producto  = Producto::find($producto);
        //dd($request->medida);
        
        $imagen = $producto->imagen;
        
        foreach($items as $item){
            $existe = 0;
            if($item->options->producto_id==$producto){
                if ($item->qty > 0) {
                    $existe = 1;
                    $rowId =$item->rowId;
                    break;
                }
            }
        }
        /* $model = Modelo::find($modelo);
        $codigo = $model->codigo;
        $medida = $model->medida; */
        $categoria = $producto->categoria->nombre;
        $descripcion = $producto->descripcion;
        /* foreach ($producto->rubros as $rub) {
            $rubro = $rub->nombre;
            if ($im == 0) {
                break;
            }
        } */
        if(Auth::user()->nivel == 'ortopedia'){
            $precio = $producto->precio;
        }elseif(Auth::user()->nivel == 'obra_social'){
            $precio = $producto->precio*1.2;
        }else{
            $precio = $producto->precio*1.4; 
        }
        
        if ($existe == 0) {
            if ($cantidad > 0) {
                Cart::add([
                    'id' => $producto->id, 
                    'name' => $producto->codigo, 
                    'price' => $precio, 
                    'qty' => $cantidad, 'options' => ['imagen' => $imagen, 'categoria' => $categoria, 'descripcion' => $descripcion /* 'codigo' => $codigo, 'medida' => $medida, 'iva' => $producto->iva, 'aplica_desc' => $producto->aplica_desc, 'modelo_id' => $model->id */]]);
                //dd($categoria);
    //            dd($items);
                return redirect()->route('zproductos', compact('shop', 'medida', 'carrito', 'activo', 'productos', 'ready', 'prod', 'config', 'items', 'codigo', 'desc', 'iva'));
            } else {
                return back();
            }
        }else{
            Cart::update($rowId, $cantidad); // Will update the quantity
        }
    }

    /*public function add(Request $request)
    {
  $descuentos  = Descuento::OrderBy('porcentaje', 'ASC')->get();
        $activo    = 'productos';
        $carrito   = Cart::content();
        $items     = $carrito->all();
        $ready     = 0;
        $config    = 4;
        $im        = 0;
        $shop      = 0;
        $total_items = 0;
        $productos = Producto::OrderBy('orden', 'DESC')->get();
        $producto  = Producto::find($request->id);
        //dd($request->medida);
        foreach ($producto->imagenes as $img) {
            $imagen = $img->imagen;
            if ($im == 0) {
                break;
            }
        }
        
        $model = Modelo::find($request->modelo_id);
        $codigo = $model->codigo;
        $medida = $model->medida;
        $categoria = $producto->categoria->nombre;
        foreach ($producto->rubros as $rub) {
            $rubro = $rub->nombre;
            if ($im == 0) {
                break;
            }
        }
        

        if ($request->cantidad > 0) {
            Cart::add(['id' => $producto->id, 'name' => $producto->nombre, 'price' => $producto->precio, 'qty' => $request->cantidad, 'options' => ['orden' => $producto->orden, 'imagen' => $imagen, 'categoria' => $categoria, 'rubro' => $rubro, 'codigo' => $codigo, 'medida' => $medida, 'iva' => $producto->iva, 'aplica_desc' => $producto->aplica_desc]]);
            //dd($categoria);
//            dd($items);
            return redirect()->route('zproductos', compact('shop', 'medida', 'carrito', 'activo', 'productos', 'ready', 'prod', 'config', 'items', 'codigo', 'desc', 'iva'));
        } else {
            return back();
        }
    }*/

    public function carrito(Request $request)
    {

        $activo = 'carrito';
        $descuentos  = Descuento::OrderBy('porcentaje', 'ASC')->get();
        $total_items = 0;
        $subtotal    = Cart::Subtotal();
        $total       = Cart::Total();
        $carrito     = Cart::content();
        /* dd($carrito); */
        $total      = str_replace(',', '', $total);
        $subtotal   = str_replace(',', '', $subtotal);
        $diferencia = null;
        $id_desc = 0;
        $descuento_item = 0;
        $descuento_total = 0;
        $desc = 0;
        $total_iva = 0;

        if (count($carrito)>0) {
            # code...
        foreach (Cart::content() as $row) {
            /* if ($row->options->aplica_desc==1) { */
            $total_items = $total_items + $row->qty;
           /*  } */
        }
        //  dd($total_items);
        foreach ($descuentos as $descuento) {
            if ($total_items >= $descuento->minimo) {
             /*    dd($descuento); */
                $desc    = $descuento->porcentaje;
                $id_desc = $descuento->id;
                $sw = 1;
            } else {
                if ($sw=1) {
                    break;
                }else{                    
                    $desc    = 20;
                    $id_desc = null;
                }
            }
        }
//ubicar la diferencia para proximo descuento str_replace(array(',','.','*','/')
        $max               = Descuento::all()->max('minimo');
        $maximo = Descuento::Where('minimo', $max)->first();
        //dd($maximo);
        $diferencia=null;
        if ($maximo->id==$id_desc) {
            $diferencia==null;
        }elseif($total_items>0){
        $proximo = Descuento::find($id_desc+1);
        $diferencia = $proximo->minimo-$total_items;
        }else{
            $proximo = Descuento::first();
            $diferencia = $proximo->minimo;
        }

        if (count($carrito)>0) {
            foreach (Cart::content() as $row) {
                $constante = $desc/100;
                $costo_item = $row->price*$row->qty;
                $descuento_item = $costo_item*$constante;
                $r_iva=($costo_item-$descuento_item)*$row->options->iva;
                $iva_p = $r_iva/100;
                $total_iva = $total_iva + $iva_p;
                $descuento_total = $descuento_item + $descuento_total;
            }
        }
        $constante = $desc/100;

//dd($desc);
//descuento en pesos
        $descuento = $descuento_total;
//iva
        $subtotal_desc = $subtotal-$descuento;
        $iva = $total_iva;
//total
        $totales = ($subtotal-$descuento)+$iva;
      //  $descuento = $total;
        }

        $success = 'Pedido creado correctamente';
        $dato_iva = 0.21; 
        return view('privada.carrito', compact('activo', 'dato_iva', 'constante','desc', 'descuento', 'iva', 'totales', 'descuentos', 'diferencia', 'proximo', 'success'));
    }

    public function send(Request $request)
    {
        $fecha       = Carbon::now()->format('Y-m-d');
        $descuentos  = Descuento::OrderBy('porcentaje', 'ASC')->get();
        $activo      = 'carrito';
        $total_items = 0;
        $subtotal    = Cart::Subtotal();
        $total       = Cart::Total();
        $carrito     = Cart::content();
        $total_iva = $request->total_iva;
        $desc = 0;
        $id_desc = null;
        $total      = str_replace(',', '', $total);
        $subtotal   = str_replace(',', '', $subtotal);

        foreach (Cart::content() as $row) {
            if ($row->options->aplica_desc==1) {
            $total_items = $total_items + $row->qty;
            }
            $r_iva=($row->price*$row->qty)*$row->options->iva;
            $iva_p = $r_iva/100;
            $total_iva = $total_iva + $iva_p;
        }
        foreach ($descuentos as $descuento) {
            if ($total_items >= $descuento->minimo) {
                $desc    = $descuento->porcentaje;
                $id_desc = $descuento->id;
                $sw = 1;
            } else {
                if ($sw=1) {
                    break;
                }else{                    
                    $desc    = 20;
                    $id_desc = null;
                }
            }
        }
//descuento en pesos
        $constante = $desc/100;
        $descuento = $subtotal*$constante;
//iva
        $subtotal_desc = $subtotal-$descuento;
//total
        $descuento = $request->descuento;
       // dd($request->totales);
        $totales = $request->totales;
        $totales      = str_replace(',', '', $totales);
        $pedido               = new Pedido;
        $pedido->fecha        = $fecha;
        $pedido->total        = $totales;
        $pedido->subtotal     = $request->total_con_descuento;
        $total_iva            = number_format($request->total_iva, 2, '.', ',');
        $pedido->iva          = $total_iva;
        $pedido->fecha        = $fecha;
        $pedido->descuento    = $descuento;
        $pedido->user_id      = Auth()->user()->id;
        $pedidoid             = Pedido::all()->max('id');
        $pedidoid++;
        //dd($pedidoid);
        //dd(count($carrito));
        $pedido->save();


        foreach (Cart::content() as $row) {
            $producto = $row->name;
            $cantidad = $row->qty;  
            $precio   = $row->price;
            $costo = $row->price * $row->qty;
            $r_iva = $row->options->iva/100;
            $total_ivap = $costo*$r_iva;
            $total_costo = $total_ivap + $costo;
            //$idproducto = $row->rowId
            $total_items = $total_items + $row->qty;
           /* $pedido->productos()->attach($producto, ['cantidad' => $row->qty, 'pedido_id' => $pedidoid, 'producto_id' => $row->id, 'costo' => $row->price * $row->qty, 'iva' => $total_ivap, 'total' => $total_costo]);
           */
        }

        $carrito = Cart::content();
        $items   = $carrito->all();
        $mensaje = $request->input('mensaje');
        // dd($request->total);
        $nombre       = Auth()->user()->name;
        $apellido     = Auth()->user()->apellido;
        $emailcliente = Auth()->user()->email;
        $username     = Auth()->user()->username;
        $social       = Auth()->user()->social;
        $cuit         = Auth()->user()->cuit;
        $telefono     = Auth()->user()->telefono;
        $direccion    = Auth()->user()->direccion;
        //dd($descuento);
        
        Mail::send('privada.mailpedido', ['total' => $totales, 'username' => $username, 'nombre' => $nombre, 'apellido' => $apellido, 'social' => $social, 'cuit' => $cuit, 'telefono' => $telefono, 'direccion' => $direccion, 'emailcliente' => $emailcliente, 'items' => $items, 'row' => $row, 'subtotal' => $subtotal, 'mensaje' => $mensaje, 'iva' => $total_iva, 'descuento' => $descuento], function ($message) use ($nombre, $apellido) {
            $dato = Dato::first();
            $message->from('ventas@meyargroup.com.ar', 'Contacto | Meyar');
            $message->to($dato->email);
            //Add a subject
            $message->subject('Pedido de ' . $nombre . ' ' . $apellido);
        });
        if (count(Mail::failures()) > 0) {
            $failed = 'Ha ocurrido un error al enviar el correo';
        } else {
            $success = 'Pedido enviado correctamente';
        }
        Cart::destroy();

        return redirect()->route('carrito')->with('success', $success);
    }

    public function delete($id)
    {
        $activo = 'carrito';
        Cart::remove($id);
        return redirect()->route('carrito');
    }

    public function listadeprecios()
    {
        $activo   = 'catalogo';
        $catalogo = Catalogo::orderBy('created_at', 'ASC')->first();

        return view('privada.listadeprecios', compact('activo', 'catalogo'));
    }

    public function historico()
    {
        $activo   = 'historico';
        $pedidos = Pedido::orderBy('id', 'ASC')->Where('user_id', Auth()->user()->id)->get();

        return view('privada.historico', compact('activo', 'pedidos'));
    }

    public function detalle($id)
    {
        $activo   = 'historico';
        $cien = 100;
        $pedido = Pedido::find($id);
        $descuento = 0;
        if(isset($pedido->descuento->porcentaje)){
            $r = $pedido->subtotal*$pedido->descuento->porcentaje;
            $descuento = $r/100;
        }

        $iva= $pedido->iva;
        return view('privada.detalle', compact('activo', 'iva','pedido', 'descuento'));
    }

    public function downloadPdf2($id)
    {
        $catalogo = Catalogo::find($id);
        $path     = public_path();
        $url      = $path . '/' . $catalogo->pdf;
        return response()->download($url);
        return redirect()->route('catalogos.index');
    }

    public function ofertasynovedades()
    {
        $activo    = 'ofertasynovedades';
        $productos = Producto::OrderBy('orden', 'ASC')->orwhere('tipo', 'novedad')->orwhere('tipo', 'oferta')->get();
        $ready     = 0;

        return view('privada.ofertasynovedades', compact('productos', 'activo', 'ready'));
    }

}
