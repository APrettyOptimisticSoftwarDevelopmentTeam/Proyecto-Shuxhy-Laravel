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
        'IdUnidad',
        'Imagen',
        'IdForma',
        'IdRelleno',
        'IdSabor',
        'IdTopping',
        'Condicion'
    	
    ];

    protected $guarded =[

    ];
}
