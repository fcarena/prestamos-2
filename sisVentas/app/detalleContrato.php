<?php

namespace sisVentas;

use Illuminate\Database\Eloquent\Model;

class detalleContrato extends Model
{
    protected $table='detalle_contrato';

    protected $primaryKey='id';

    public $timestamps=false;


    protected $fillable =[
    	

            
            'descripcion',
            'marca',
            'modelo',
            'serial',
            'tazacion',
            'obsv',
            'cover',
            'interes',
            'subtotal',
            'total',
            
    ];

    protected $guarded =[

    ];   //
}
