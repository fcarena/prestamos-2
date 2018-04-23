<?php

namespace sisVentas;

use Illuminate\Database\Eloquent\Model;

class Contratos extends Model
{
 protected $table = 'contratos';

    protected $primaryKey='id';

    protected $fillable = [
            'codigo',
            'dni',
            'tiendas_id',
            'fecha_inicio',
            'fecha_mes',
            'fecha_final',
            'categorias_id',
            'estatus',
    ];

    protected $guarded = [

    ];
    
    // Obtener Todos los Contrato
    public function getContratos() {
    	$consulta = Contratos::join('personas', 'personas.dni', '=', 'contratos.dni')
	    	->join('tiendas', 'tiendas.id', '=', 'contratos.tiendas_id')
	    	->join('categorias', 'categorias.id', '=', 'contratos.categorias_id')
	    	->select('tiendas.nombre as tiendas_nombre',
    				'categorias.nombre as categorias_nombre', 'categorias.descripcion as categorias_descripcion',
    				'categorias.interes as categorias_interes', 'categorias.mora as categorias_mora',
	    			'personas.*', 'contratos.*')
    		->paginate(10);
    	 
    	return $consulta;
    }
    
    // Obtener Contrato por Buscaquedas varias
    public function getContratosxPalabrasClaves($palabra) {
    	
    	if (empty($palabra)) {
    		$consulta = Contratos::join('personas', 'personas.dni', '=', 'contratos.dni')
	    	->join('tiendas', 'tiendas.id', '=', 'contratos.tiendas_id')
	    	->join('categorias', 'categorias.id', '=', 'contratos.categorias_id')
	    	->select('tiendas.nombre as tiendas_nombre',
    				'categorias.nombre as categorias_nombre', 'categorias.descripcion as categorias_descripcion',
    				'categorias.interes as categorias_interes', 'categorias.mora as categorias_mora',
	    			'personas.*', 'contratos.*')
    		->paginate(10);
    		
    		return $consulta;
    	}
    	
    	$consulta = Contratos::join('personas', 'personas.dni', '=', 'contratos.dni')
    	->join('tiendas', 'tiendas.id', '=', 'contratos.tiendas_id')
    	->join('categorias', 'categorias.id', '=', 'contratos.categorias_id')
    	->select('tiendas.nombre as tiendas_nombre',
    			'categorias.nombre as categorias_nombre', 'categorias.descripcion as categorias_descripcion',
    			'categorias.interes as categorias_interes', 'categorias.mora as categorias_mora',
	    		'personas.*', 'contratos.*')
    	->where('contratos.codigo', 'LIKE', '%'.$palabra.'%')
    	->orWhere('contratos.dni', 'LIKE', '%'.$palabra.'%')
    	->orWhere('contratos.fecha_inicio', 'LIKE', '%'.$palabra.'%')
    	->orWhere('contratos.fecha_mes', 'LIKE', '%'.$palabra.'%')
    	->orWhere('contratos.estatus', 'LIKE', '%'.$palabra.'%')
    	->orWhere('personas.nombre', 'LIKE', '%'.$palabra.'%')
    	->orWhere('personas.apellido', 'LIKE', '%'.$palabra.'%')
    	->orWhere('tiendas.nombre', 'LIKE', '%'.$palabra.'%')
    	->orWhere('categorias.nombre', 'LIKE', '%'.$palabra.'%')
    	->orWhere('categorias.descripcion', 'LIKE', '%'.$palabra.'%')
   		->paginate(10);
    	
    	return $consulta;
    }
    
}
