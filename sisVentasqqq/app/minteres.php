<?php

namespace sisVentas;

use Illuminate\Database\Eloquent\Model;

class minteres extends Model
{
 protected $table='detalle_contrato';

    protected $primaryKey='idcontrato';

    public $timestamps=false;


    protected $fillable =[
    	

            'interes',
            
    ];

    protected $guarded =[

    ];   //
}