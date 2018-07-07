<?php

namespace Shuxhy;

use Illuminate\Database\Eloquent\Model;

class DetalleFactura extends Model
{
     protected $table='detallefactura';

    protected $primaryKey='IdDetalleFactura';

    public $timestamps=false;


    protected $fillable =[
    	'IdFactura',
        'Cantidad',
        'Subtotal',
    	'TotalFacturado',
        'Precio',
    	'Comentario'
        
        
    	
    ];

    protected $guarded =[

    ];
}
