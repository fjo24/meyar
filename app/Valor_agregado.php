<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Valor_agregado extends Model
{
    protected $table    = "valor_agregados";
    protected $fillable = [
        'descripcion','imagen'
    ];
}
