<?php

namespace sisVentas;

use Illuminate\Database\Eloquent\Model;

class carro extends Model
{
     protected $table='persona';

    protected $primaryKey='id';

    public $timestamps=false;


    protected $fillable =[
    	
			
            'tipo_dni',
            'dni',
            'nombre',
            'apellido',
            'telefono1',
            'telefono2',
            'distrito',
            'direccion',
            'correo',
            'cactado',
            'categoria',
            'fecha',

    ];

    protected $guarded =[
}
