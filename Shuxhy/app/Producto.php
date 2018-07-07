<?php

namespace Shuxhy;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table='producto';

    protected $primaryKey='IdProducto';

    public $timestamps=false;


    protected $fillable =[
    	'Nombre',
        'CostoProduccion',
    	'Descripcion',
        'Precio',
    	'Peso',
        'Unidad',
        'Imagen',
        'Forma',
        'Relleno',
        'Sabor',
        'Topping',
        'Condicion'
    	
    ];

    protected $guarded =[

    ];
}
