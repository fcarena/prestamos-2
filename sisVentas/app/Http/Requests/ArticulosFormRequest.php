<?php

namespace sisVentas\Http\Requests;

use sisVentas\Http\Requests\Request;

class ArticulosFormRequest extends Request
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
           
            'idcategoria'=>'required|max:256',
            'idtienda'=>'required|max:256',
            'codigo'=>'required|unique:articulo|max:500',
            'nombre'=>'required|max:500',
            'marca'=>'required|max:500',
            'modelo'=>'max:500',
            'obsv'=>'max:500',
            'serial'=>'max:500',
            'precio'=>'required|numeric',
            'precioweb'=>'required|numeric',
            'vitrina'=>'max:599',
            
        ];
    }
}
