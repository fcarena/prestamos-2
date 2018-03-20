<?php

namespace sisVentas;

use Illuminate\Database\Eloquent\Model;

class oro extends Model
{
     protected $table='oro';

    protected $primaryKey='id';

    public $timestamps=false;


    protected $fillable =[
    	

             'codigo',
            'dni',
            'nombre',
            'tienda',
            'fecha_inicio',
            'fecha_mes',
            'fecha_final',
            'estatus',


    ];

    protected $guarded =[
}
