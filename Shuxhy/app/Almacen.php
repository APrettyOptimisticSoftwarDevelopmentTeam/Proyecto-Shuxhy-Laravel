<?php

namespace Shuxhy;

use Illuminate\Database\Eloquent\Model;

class Almacen extends Model
{
    //

    protected $table ='almacen'; // tabla que se usara

    protected $primaryKey='idAlmacen'; // primary key de referencia para la tabla

    public $timestamps=false;

    protected $fillable =[ // los campos de la tabla que se usaran para crear eliminar borrrar

    	'totalComprado',
    	'totalVendido'

    ];

    protected $guarded =[

    ];
}
