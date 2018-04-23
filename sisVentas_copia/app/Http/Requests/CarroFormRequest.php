<?php

namespace sisVentas\Http\Requests;

use sisVentas\Http\Requests\Request;

class CarroFormRequest extends Request
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
        return [
           '
           tipo_dni'=>'required|max:11',
            'dni'=>'required|unique:persona|max:9|min:7',
            'nombre'=>'required|max:100',
            'apellido'=>'required|max:500',
            'telefono1'=>'required|max:15',
            'telefono2'=>'max:20',
            'distrito'=>'required|max:100',
            'direccion'=>'required|max:900',
            'correo'=>'email|max:900',
            'cactado'=>'max:900',
            'categoria'=>'required|max:300',
            'fecha'=>'required|max:50',
        ];
    }
}
