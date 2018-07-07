<?php

namespace Shuxhy\Http\Requests;

use Shuxhy\Http\Requests\Request;

class ToppingFormRequest extends Request
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
    public function rules()
    {
<<<<<<< HEAD
        return ['nombre' => 'required|max:255|unique:topping',
                'abreviatura' => 'required|max:5|unique:topping',
               ];
    }
}
=======
        return [
            //
        ];
    }
}
>>>>>>> 173bb7ffc094f04cc27d35538d39f23540eae0b1
