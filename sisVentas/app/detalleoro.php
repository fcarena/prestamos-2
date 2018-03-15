<?php

namespace sisVentas;

use Illuminate\Database\Eloquent\Model;

class detalleoro extends Model
{
    protected $table='detalle_oro';

    protected $primaryKey='id';

    public $timestamps=false;


    protected $fillable =[
    	

            
            'descripcion',
            'peso',
            'tipo',
            'tazacion',
            'obsv',
            'cover',
            'interes',
            'mora',
            'subtotal',
            'total',


    ];
}
