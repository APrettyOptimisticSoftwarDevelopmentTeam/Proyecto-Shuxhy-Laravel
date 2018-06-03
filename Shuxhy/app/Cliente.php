<?php

namespace Shuxhy;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table='cliente';

    protected $primaryKey='IdCliente';

    public $timestamps=false;


    protected $fillable =[ 
    	'Nombre',
    	'Apellido',
    	'Descripcion',
        'Direccion',
    	'Telefono',
        'FechaIngreso',
    	'Usuario'
    ];

    protected $guarded =[

    ];


}
