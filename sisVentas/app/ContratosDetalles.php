<?php

namespace sisVentas;

use Illuminate\Database\Eloquent\Model;

class ContratosDetalles extends Model
{
    protected $table='contratos_detalles';

    protected $primaryKey='id';

    public $timestamps=false;


    protected $fillable =[
    		'contratos_codigo',
            'descripcion',
            'marca',
            'modelo',
            'serial',
    		'obsv',
    		'cover',
            'tazacion',
    		'interes',
            'subtotal',
            'total',
    ];

    protected $guarded =[

    ];   //
}
