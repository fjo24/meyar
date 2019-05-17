<?php

namespace App\Http\Controllers\Adm;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Banner;
class BannerController extends Controller
{
    //EDITAR BANNER

    public function index()
    {
        $banner = Banner::all()->first();
        return redirect()->route('banner.edit', $banner->id);
    }

    public function edit($id)
    {
        $banner = Banner::find($id);
        return view('adm.banner.edit')
            ->with('banner', $banner);
    }

    public function update(Request $request, $id)
    {
        $dato         = Banner::find($id);
        $dato->texto  = $request->texto;
        $dato->texto2  = $request->texto2;
        $id++;

        if ($request->hasFile('imagen')) {
            if ($request->file('imagen')->isValid()) {
                $file = $request->file('imagen');
                $path = public_path('img/banner/');
                $request->file('imagen')->move($path, 'banner.jpg');
                $dato->imagen = 'img/banner/banner.jpg';
            }
        }
        $dato->update();

        return view('adm.dashboard');
    }
}
