<?php

namespace sisVentas\Http\Requests;

use sisVentas\Http\Requests\Request;

class UsuarioFormRequest extends Request
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|unique:users|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ];
    }
}
