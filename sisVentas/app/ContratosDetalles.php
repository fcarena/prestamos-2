<?php

namespace sisVentas;

use Illuminate\Database\Eloquent\Model;

class ContratosDetalles extends Model
{
    protected $table='contratos_detalles';

    protected $primaryKey='id';

    protected $fillable =[
    		'contratos_codigo',
            'descripcion',
            'marca',
            'modelo',
            'serial',
    		'obsv',
    		'cover',
            'tazacion',
    		'interes',
            'subtotal',
            'total',
    ];

    protected $guarded =[

    ];
    
    // Obtener Detalles de Contrato
    public function getContatoyDetallesContrato($codigo) {
    	$consulta = ContratosDetalles::where('contratos_detalles.contratos_codigo', $codigo)
    	->join('contratos', 'contratos.codigo', '=', 'contratos_detalles.contratos_codigo')
    	->join('personas', 'personas.dni', '=', 'contratos.dni')
    	->join('tiendas', 'tiendas.id', '=', 'contratos.tiendas_id')
    	->join('categorias', 'categorias.id', '=', 'contratos.categorias_id')
    	->select('personas.nombre', 'personas.apellido',
    			'tiendas.nombre as tiendas_nombre',
    			'categorias.nombre as categorias_nombre',
    			'categorias.interes as categorias_interes',
    			'categorias.mora as categorias_mora',
    			'contratos_detalles.*', 'contratos.*')
    	->get();
    	 
    	return $consulta;
    }
}
