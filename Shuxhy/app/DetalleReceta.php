<?php

namespace Shuxhy;

use Illuminate\Database\Eloquent\Model;

class DetalleReceta extends Model
{
    protected $table='detallereceta';

    protected $primaryKey='IdDetalleReceta';

    public $timestamps=false;


    protected $fillable =[
    	'IdReceta',
        'IdMaterial',
    	'Cantidad',
        'Unidad',
        'CostoPorMaterial'
    	
    	
    ];

    protected $guarded =[

    ];
}
