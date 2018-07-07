<?php

namespace Shuxhy;

use Illuminate\Database\Eloquent\Model;

class Unidad extends Model
{
    protected $table='unidad';

    protected $primaryKey='IdUnidad';

    public $timestamps=false;


    protected $fillable =[
    	'Nombre',
        'Abreviatura',
        'Condicion'
    	
    ];

    protected $guarded =[

    ];
}
