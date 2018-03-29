<?php

namespace sisVentas;

use Illuminate\Database\Eloquent\Model;

class Categorias extends Model
{
    protected $table='categorias';

    protected $primaryKey='id';

    public $timestamps=true;


    protected $fillable =[
    	'nombre',
    	'descripcion',
    	'interes',
        'mora',
    ];

    protected $guarded =[

    ];

}
