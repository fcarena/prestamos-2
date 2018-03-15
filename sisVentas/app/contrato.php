<?php

namespace sisVentas;

use Illuminate\Database\Eloquent\Model;

class contrato extends Model
{
 protected $table='contrato';

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
            'categoria',
            'estatus',
            
    ];

    protected $guarded =[

    ];   //
}
