<?php

namespace sisVentas;

use Illuminate\Database\Eloquent\Model;

class caja_ingresos extends Model
{
    protected $table='caja_ingresos';

    protected $primaryKey='id';

    public $timestamps=false;


    protected $fillable =[
    	
			
            'id',
            'contrato_codigo',
            'tipo_movimiento',
            'tienda',
            'monto',
        

    ];
    protected $guarded =[

    ];
}
