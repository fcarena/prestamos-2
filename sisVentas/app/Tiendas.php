<?php

namespace sisVentas;

use Illuminate\Database\Eloquent\Model;

class Tiendas extends Model
{
    protected $table='tiendas';

    protected $primaryKey='id';

    public $timestamps=false;


    protected $fillable =[
            'nombre',
            'letrae',
            'letrao',
    ];

    protected $guarded =[

    ];//
}
