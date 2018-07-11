<?php

namespace Shuxhy;

use Illuminate\Database\Eloquent\Model;

class Combo extends Model
{
    protected $table='combo';

    protected $primaryKey='IdCombo';

    public $timestamps=false;


    protected $fillable =[
    	'Nombre',
    	'Descripcion',
        'Subtotal',
        'Total',
        'Imagen',
        'Condicion'
    	
    ];

    protected $guarded =[

    ];
}
