<?php

namespace sisVentas;

use Illuminate\Database\Eloquent\Model;

class Personas extends Model
{
    protected $table='personas';

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

    ]; //
}
