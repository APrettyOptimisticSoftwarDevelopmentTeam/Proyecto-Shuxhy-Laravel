<?php

namespace Shuxhy;

use Illuminate\Database\Eloquent\Model;

class Forma extends Model
{
    protected $table='forma';

    protected $primaryKey='IdForma';

    public $timestamps=false;


<<<<<<< HEAD
    protected $fillable =[ 
    	'Nombre',
    	'Abreviatura',
    	'Condicion'

=======
    protected $fillable =[
    	'Nombre',
        'Abreviatura',
        'Condicion'
    	
>>>>>>> 173bb7ffc094f04cc27d35538d39f23540eae0b1
    ];

    protected $guarded =[

    ];
<<<<<<< HEAD


}
=======
}
>>>>>>> 173bb7ffc094f04cc27d35538d39f23540eae0b1
