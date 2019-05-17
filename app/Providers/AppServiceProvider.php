<?php

namespace App\Providers;
use App\Dato;
use App\Red;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        \Schema::defaultStringLength(191);

        $dato   = Dato::first();
        $facebook   = Red::where('descripcion', 'facebook')->first();
        $youtube    = Red::where('descripcion', 'youtube')->first();

        view()->share([
            'telefono'   => $dato->telefono,
            'direccion'  => $dato->direccion,
            'email'      => $dato->email,
            'facebook'   => $facebook,
            'youtube'    => $youtube,
        ]);
    }
}
