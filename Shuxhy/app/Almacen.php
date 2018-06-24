<?php

namespace Shuxhy;

use Illuminate\Database\Eloquent\Model;

class Almacen extends Model
{
     protected $table='almacen';

    protected $primaryKey='IdAlmacen';

    public $timestamps=false;


    protected $fillable =[ 
    	'IdProducto',
    	'IdMaterial',
    	'Cantidad',
        'IdUnidad',
    	'PesoPorUnidad',
    	'PesoTotal',
        'Condicion'

    ];

    protected $guarded =[

    ];
}
