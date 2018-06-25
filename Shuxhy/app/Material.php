<?php

namespace Shuxhy;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
     protected $table='material';

    protected $primaryKey='IdMaterial';

    public $timestamps=false;


    protected $fillable =[
    	'Nombre',
        'Descripcion',
        'Costo',
    	'PesoBase',
        'Unidad',
        'Imagen',
        'Condicion'
    	
    ];

    protected $guarded =[

    ];
}
