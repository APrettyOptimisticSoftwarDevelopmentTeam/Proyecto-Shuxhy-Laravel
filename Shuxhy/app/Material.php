<?php

namespace Shuxhy;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
     protected $table='Material';

    protected $primaryKey='IdMaterial';

    public $timestamps=false;


    protected $fillable =[
    	'Nombre',
        'Descripcion',
        'Costo',
    	'PesoBase',
        'Unidad',
        'Condicion'
    	
    ];

    protected $guarded =[

    ];
}
