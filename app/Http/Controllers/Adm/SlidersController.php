<?php

namespace App\Http\Controllers\Adm;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Slider;
use Illuminate\Support\Facades\Storage;

class SlidersController extends Controller
{
    public function page()
    {
        return view('adm.sliders.index');
    }

    public function index(Request $request)
    {
        $sliders = Slider::orderBy('id', 'DESC')->get();

        return [
            'sliders' => $sliders 
        ];
    }

    public function store(Request $request)
    {
        $slider = new Slider();
        $slider->texto = $request->texto;
        $slider->texto2 = $request->texto2;
        $slider->link = $request->link;
        $slider->orden = $request->orden;
        $slider->seccion = $request->seccion;
        $id              = Slider::all()->max('id');
        $id++;


   /*      if ($request->imagen) {
            $logo = $request->logo;  //Se obtienen los datos de la imagen desde la solicitud.
            $ext = explode(";", $logo); // Se dividen los datos, en este caso se obtiene la informacion antes del ";" "data:image/jpeg;".
            $ext = str_replace('data:image/', '', $ext); // Se reemplazan los datos "data:image/" por vacio para generar una nueva cadena y obtener la extension de la imagen "jpeg".
            $ext = $ext[0]; // En este punto $ext es un arreglo de datos, por lo tanto la extension de la imagen se encuentra en la primera posicion "0".
            $logo = str_replace('data:image/'. $ext .';base64,', '', $logo); // Se elimina la data inicial de la imagen para luego ser decodificada.
            $logo = base64_decode($logo); //Se decodifica la data de la imagen recibida.
            $logoName = str_random(20).'.'. $ext; // Se asigna un nombre a la imagen recibida.
            Storage::disk('uploads')->put($logoName, $logo); // Se almacena la imagen en public/uploads/image.ext
            $request->logo = $logoName;
            $slider->imagen = $logoName;
        } */

        if ($request->imagen) {
            $imagen = $request->imagen;  //Se obtienen los datos de la imagen desde la solicitud.
            $ext = explode(";", $imagen); // Se dividen los datos, en este caso se obtiene la informacion antes del ";" "data:image/jpeg;".
            $ext = str_replace('data:image/', '', $ext); // Se reemplazan los datos "data:image/" por vacio para generar una nueva cadena y obtener la extension de la imagen "jpeg".
            $ext = $ext[0]; // En este punto $ext es un arreglo de datos, por lo tanto la extension de la imagen se encuentra en la primera posicion "0".
            $imagen = str_replace('data:image/'. $ext .';base64,', '', $imagen); // Se elimina la data inicial de la imagen para luego ser decodificada.
            $imagen = base64_decode($imagen); //Se decodifica la data de la imagen recibida.
            $imagenName = str_random(20).'.'. $ext; // Se asigna un nombre a la imagen recibida.
            Storage::disk('uploads')->put($imagenName, $imagen); // Se almacena la imagen en public/uploads/image.ext
            $request->imagen = $imagenName;
        }
        else {
            $request->imagen = "default-user.png";
        }

        $slider->save();
        return;
    }

    public function edit(Slider $slider)
    {
        return $slider;
    }

    public function update(Request $request, $id)
    {
        /* $this->validate($request, [
            'email' => 'required|email',
            'direccion' => 'required',
            'telefono' => 'required'
        ]); */
        $slider = Slider::find($id)->update($request->all());
        return;
    }

    public function destroy(Slider $alider)
    {
        $alider->delete();
    }
}
