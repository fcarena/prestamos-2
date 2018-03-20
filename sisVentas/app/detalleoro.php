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
            'obsv',
            'cover',
            'peso_bruto',
            'peso_neto',
            'tazacion',
            'monto_calculo',
            'porcentaje_calculo',
            'interes',
            'mora',
 ];

    protected $guarded =[

    ];
}
