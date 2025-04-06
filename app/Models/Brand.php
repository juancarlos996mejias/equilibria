<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    // Opcionalmente podés definir la tabla si el nombre no es "brands"
    // protected $table = 'mi_tabla';

    protected $fillable = ['nombre', 'descripcion', 'imagen', 'precio'];
}

