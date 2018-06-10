<?php

namespace Shuxhy;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table='producto';

    protected $primaryKey='idProducto';

    public $timestamps=false;


    protected $fillable =[
    	'Nombre',
    	'Cantidad',
    	'Descripcion',
        'Precioporunidad',
    	'Unidad_entero',
    	'Unidad_medida',
    	'Unidad_Onzas',
        'Imagen',
        'condicion'
    	
    ];

    protected $guarded =[

    ];
}
