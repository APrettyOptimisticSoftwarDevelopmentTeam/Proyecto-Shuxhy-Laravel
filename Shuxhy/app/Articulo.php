<?php

namespace Shuxhy;

use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    //

     protected $table='articulo';

    protected $primaryKey='idArticulo';

    public $timestamps=false;


    protected $fillable =[
    	'nombre',
    	'descripcion',
        'precioCompra',
        'precioVenta',
    	'estado'
    ];

    protected $guarded =[

    ];
}
