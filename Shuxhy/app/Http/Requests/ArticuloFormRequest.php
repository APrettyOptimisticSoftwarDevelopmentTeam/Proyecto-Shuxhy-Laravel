<?php

namespace Shuxhy\Http\Requests;

use Shuxhy\Http\Requests\Request;

class ArticuloFormRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() // aqui puedo poner las reglas de validacion de mi formulario o pagina
    {
        return [
            'nombre'=>'required|max:50',
            'descripcion'=>'max:256',
            'precioVenta'=>'max:10',

        ];
    }
}
