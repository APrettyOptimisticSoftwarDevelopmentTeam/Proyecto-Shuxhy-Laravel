<?php

namespace Shuxhy;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
     protected $table='pedido';

    protected $primaryKey='IdPedido';

    public $timestamps=false;


    protected $fillable =[ 
    	'IdCliente',
    	'EntregaPedido',
    	'DireccionEntrega',
        'FechaRealizado',
    	'FechaEntrega',
    	'Comentario',
        'Condicion'

    ];

    protected $guarded =[

    ];
}
