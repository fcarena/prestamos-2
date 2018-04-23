<?php

namespace sisVentas;

use Illuminate\Database\Eloquent\Model;

class caja_egresos extends Model
{
     protected $table='caja_egresos';

    protected $primaryKey='id';

    public $timestamps=true;


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
