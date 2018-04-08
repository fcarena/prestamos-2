<?php

namespace sisVentas;

use Illuminate\Database\Eloquent\Model;

class CajaIngresos extends Model
{
    protected $table='caja_ingresos';

    protected $primaryKey='id';

    protected $fillable =[
            'id',
            'contratos_codigo',
            'tipo_movimiento',
            'tiendas_id',
            'monto',
    ];
    
    protected $guarded =[

    ];
}
