<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table    = "categorias";
    protected $fillable = [
        'nombre', 'descripcion', 'categoria_id', 'orden', 'imagen',
    ];

    public function producto()
    {
        return $this->hasMany('App\Producto');
    }

    public function categorias()
    {
        return $this->belongsTo('App\Categoria');
    }
}
