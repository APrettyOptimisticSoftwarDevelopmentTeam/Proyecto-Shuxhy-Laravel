<?php

namespace Shuxhy;

use Illuminate\Database\Eloquent\Model;

class Receta extends Model
{
    protected $table='receta';

    protected $primaryKey='IdReceta';

    public $timestamps=false;


    protected $fillable =[
    	'Nombre',
        'Cantidad',
    	'Unidad',
        'CantidaEnOnzas'
    	
    	
    ];

    protected $guarded =[

    ];
}
