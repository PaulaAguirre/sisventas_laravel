<?php

namespace sisVentas;

use Illuminate\Database\Eloquent\Model;

class DetalleIngreso extends Model
{
    protected $table = 'detalle_ingreso';
    protected $primaryKey = "iddetalle_ingreso";
    public $timestamps = false; //laravel crea dos columnas que contienen informacion de cuando un registro se creó y se actualizó

    protected $fillable = [ //asigna los campos de la tabla de BD
        'idingreso',
        'idarticulo',
        'cantidad',
        'precio_compra',
        'precio_venta',
    ];

    protected $guarded = [ //campos que no se quieren incluir

    ];
}
