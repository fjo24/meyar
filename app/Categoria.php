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

    public function categoria()
    {
        return $this->belongsTo('App\Categoria');
    }
    public function categorias()
    {
        return $this->hasMany('App\Categoria');
    }
}
