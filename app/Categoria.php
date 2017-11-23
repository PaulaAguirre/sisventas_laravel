<?php

namespace sisVentas;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = 'categoria';
    protected $primaryKey = "idcategoria";
    public $timestamps = false; //laravel crea dos columnas que contienen informacion de cuando un registro se creó y se actualizó

    protected $fillable = [ //asigna los campos de la tabla de BD
        'nombre',
        'descripcion',
        'condicion'
    ];

    protected $guarded = [ //campos que no se quieren incluir

    ];
}