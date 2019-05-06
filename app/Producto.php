<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table    = "productos";
    protected $fillable = [
        'codigo', 'descripcion', 'imagen', 'ancho_total', 'largo_total',
        'alto', 'peso', 'contenido', 'orden', 'promocion',
        'categoria_id', 'precio', 'ficha', 'cantidad'
    ];

    public function categorias()
    {
        return $this->belongsTo('App\Categoria');
    }
}