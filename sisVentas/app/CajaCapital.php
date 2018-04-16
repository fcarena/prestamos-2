<?php

namespace sisVentas;

use Illuminate\Database\Eloquent\Model;

class CajaCapital extends Model
{
  protected $table='caja_Capital';

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

