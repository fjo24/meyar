<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contenido_empresa extends Model
{
    protected $table    = "catalogos";
    protected $fillable = [
        'nombre', 'descripcion', 'contenido', 'contenido2', 'imagen', 'video'
    ];
}