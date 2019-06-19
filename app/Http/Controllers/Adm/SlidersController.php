<?php

namespace App\Http\Controllers\Adm;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Slider;
use App\Http\Requests\SliderRequest;

class SlidersController extends Controller
{
    public function index()
    {
        $sliders = Slider::orderBy('seccion', 'ASC')->get();
        return view('adm.sliders.index', compact('sliders'));
    }

    public function create()
    {
        return view('adm.sliders.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'seccion' => 'link'
        ]);
        $slider          = new Slider();
        $slider->texto   = $request->texto;
        $slider->texto2  = $request->texto2;
        $slider->link    = $request->link;
        $slider->orden   = $request->orden;
        $slider->seccion = $request->seccion;
        $id              = Slider::all()->max('id');
        $id++;
        if ($request->hasFile('imagen')) {
            if ($request->file('imagen')->isValid()) {
                $file = $request->file('imagen');
                $path = public_path('img/slider/');
                $request->file('imagen')->move($path, $id . '_' . $file->getClientOriginalName());
                $slider->imagen = 'img/slider/' . $id . '_' . $file->getClientOriginalName();
            }
        }
        $slider->save();

        return redirect()->route('sliders.index');

    }
    public function edit($id)
    {
        $slider = Slider::find($id);
        return view('adm.sliders.edit')
            ->with('slider', $slider);
    }
    
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'seccion' => 'required'
        ]);

        $slider          = Slider::find($id);
        $id              = Slider::all()->max('id');
        $slider->texto   = $request->texto;
        $slider->texto2  = $request->texto2;
        $slider->link    = $request->link;
        $slider->orden   = $request->orden;
        $slider->seccion = $request->seccion;
        $id++;

        if ($request->hasFile('imagen')) {
            if ($request->file('imagen')->isValid()) {
                $file = $request->file('imagen');
                $path = public_path('img/slider/');
                $request->file('imagen')->move($path, $id . '_' . $file->getClientOriginalName());
                $slider->imagen = 'img/slider/' . $id . '_' . $file->getClientOriginalName();
            }
        }

        $slider->update();
        return redirect()->route('sliders.index');
    }

    public function destroy($id)
    {
        $slider = Slider::find($id);
        $slider->delete();
        return redirect()->route('sliders.index');
    }
}
