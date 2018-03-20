<?php

namespace sisVentas\Http\Requests;

use sisVentas\Http\Requests\Request;

class OroFormRequest extends Request
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
            
            'codigo'=>'required|unique:contrato|max:20',
            'dni'=>'required|max:500',
            'nombre'=>'required|max:900',
            'tienda'=>'required|max:500',
            'fecha_inicio'=>'required|max:50',
            'fecha_mes'=>'required|max:50',
            'fecha_final'=>'required|max:50',
            'estatus'=>'max:500',
            'descripcion'=>'required|max:500',
            'peso'=>'required|max:500',
            'tipo'=>'required|max:500',
            'tazacion'=>'required|max:50',
            'obsv'=>'max:500',
            'cover'=>'max:500',
            'interes'=>'required|max:500',
            'mora'=>'required|max:500',
            'subtotal'=>'required|max:500',
            'total'=>'required|max:500',
        ];
    }
}
