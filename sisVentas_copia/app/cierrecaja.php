<?php

namespace sisVentas;

use Illuminate\Database\Eloquent\Model;

class cierrecaja extends Model
{
   protected $table='caja_cierre';

    protected $primaryKey='id';

    public $timestamps=false;


    protected $fillable =[
    	
			
            'id',
            'create_at',
            'amanece',
            'ingresos',
            'egresos',
            'cierre',
        

    ];
    protected $guarded =[

    ];

 }
