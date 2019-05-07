<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contenido_empresa extends Model
{
    protected $table    = "contenido_empresas";
    protected $fillable = [
        'nombre', 'descripcion', 'contenido', 'contenido2', 'imagen', 'video'
    ];
}