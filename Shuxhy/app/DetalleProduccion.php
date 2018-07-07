<?php

namespace Shuxhy;

use Illuminate\Database\Eloquent\Model;

class DetalleProduccion extends Model
{
    protected $table='detalleproduccion';

    protected $primaryKey='IdDetalleProduccion';

    public $timestamps=false;


    protected $fillable =[
    	'IdProduccion',
        'IdReceta',
        'CantidadProducir',
        'CantidadProducida',
        'CantidadFaltante'
    	
    ];

    protected $guarded =[

    ];
}
