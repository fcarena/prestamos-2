<?php

namespace sisVentas;

use Illuminate\Database\Eloquent\Model;

class Contratos extends Model
{
 protected $table = 'contratos';

    protected $primaryKey='id';

    public $timestamps=false;


    protected $fillable = [
            'codigo',
            'dni',
            'nombre',
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
    	$consulta = Contratos::join('contratos_detalles', 'contratos_detalles.contratos_codigo', '=', 'contratos.codigo' )
    	->select ('contratos.*', 'contratos_detalles.*')
    	->get();
    	 
    	return $consulta;
    }
    
    // Obtener Contrato por Buscaquedas varias
    public function getContratosxPalabrasClaves($palabra) {
    	
    	if (empty($palabra)) {
    		$consulta = Contratos::join('contratos_detalles', 'contratos_detalles.contratos_codigo', '=', 'contratos.codigo' )
            ->where('contratos.estatus','!=','Cancelado')
    		->select ('contratos_detalles.*', 'contratos.*')
            ->orderBy('contratos.id','decs')
    		->paginate(5);
    		
    		return $consulta;
    	}
    	
    	$consulta = Contratos::join('contratos_detalles', 'contratos_detalles.contratos_codigo', '=', 'contratos.codigo' )
    	->where('contratos.codigo', 'LIKE', '%'.$palabra.'%')
    	->orWhere('contratos_detalles.descripcion', 'LIKE', '%'.$palabra.'%')
    	->select ('contratos.*', 'contratos_detalles.*')
    	->paginate(5);
    	
    	return $consulta;
    }
    
    // Obtener Detalles de Contrato
    public function getContatoyDetallesContrato($id) {
        
    	$consulta = Contratos::where('contratos.id', $id)
    	->join ('contratos_detalles', 'contratos_detalles.contratos_codigo', '=', 'contratos.codigo')
    	->join ('personas', 'personas.dni', '=', 'contratos.dni')
    	->join ('tiendas', 'tiendas.id', '=', 'contratos.tiendas_id')
    	->select ('contratos_detalles.*', 'contratos.*', 
    			'personas.nombre', 'personas.apellido',
    			'tiendas.nombre as tiendas_nombre')
    	->first();
    	
    	return $consulta;
    }
    
}
