<?php

namespace sisVentas;

use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    protected $table = 'articulo';
    protected $primaryKey = "idarticulo";
    public $timestamps = false; //laravel crea dos columnas que contienen informacion de cuando un registro se creó y se actualizó

    protected $fillable = [ //asigna los campos de la tabla de BD
        'idcategoria',
        'codigo',
        'nombre',
        'stock',
        'imagen',
        'estado'
    ];

    protected $guarded = [ //campos que no se quieren incluir

    ];
}
