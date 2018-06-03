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
    	'Cantidad',
    	'Descripcion',
        'Precioporunidad',
    	'Unidad_entero',
    	'Unidad_medida',
    	'Unidad_Onzas',
        'condicion'
    	
    ];

    protected $guarded =[

    ];
}
