<?php

namespace Shuxhy;

use Illuminate\Database\Eloquent\Model;

class Produccion extends Model
{
    protected $table='produccion';

    protected $primaryKey='IdProduccion';

    public $timestamps=false;


    protected $fillable =[
    	'IdPedido',
      	'Estatus',
        'Fecha'
   
        
        
    	
    ];

    protected $guarded =[

    ];
}
