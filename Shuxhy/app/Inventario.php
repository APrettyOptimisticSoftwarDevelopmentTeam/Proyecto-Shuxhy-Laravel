<?php

namespace Shuxhy;

use Illuminate\Database\Eloquent\Model;

class Inventario extends Model
{
    protected $table='inventario';

    protected $primaryKey='IdInventario';

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
