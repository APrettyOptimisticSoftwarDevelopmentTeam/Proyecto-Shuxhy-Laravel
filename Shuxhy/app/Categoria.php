<?php

namespace Shuxhy;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table='categoria';

    protected $primaryKey='idcategoria';

    public $timestamps=false;


    protected $fillable =[
    	'nombre',
    	'descripcion',
        'precio',
    	'condicion'
    ];

    protected $guarded =[

    ];

}
