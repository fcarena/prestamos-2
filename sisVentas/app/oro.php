<?php

namespace sisVentas;

use Illuminate\Database\Eloquent\Model;

class oro extends Model
{
     protected $table='oro';

    protected $primaryKey='id';

    public $timestamps=false;


    protected $fillable =[
    	

             'codigo',
            'dni',
            'nombre',
            'tienda',
            'fecha_inicio',
            'fecha_mes',
            'fecha_final',
            'estatus',


    ];

    protected $guarded =[
 ];   
  // Obtener Todos los Contrato
    public function getContratosoro() {
        $consulta = oro::join('detalle_oro', 'detalle_oro.codigo', '=', 'oro.codigo' )
        ->select ('oro.*', 'detalle_oro.*')
        ->get();
         
        return $consulta;
    }
    
    // Obtener Contrato por Buscaquedas varias
    public function getContratosxPalabrasClaves($palabra) {
        
        if (empty($palabra)) {
            $consulta = Contratos::join('contratos_detalles', 'contratos_detalles.contratos_codigo', '=', 'contratos.codigo' )
            ->select ('contratos_detalles.*', 'contratos.*')
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
    
    // Obtener Detalles de Contrato_oro
    public function getContatoyDetallesContratooro($id) {
        $consulta = oro::where('oro.id', $id)
        ->join ('detalle_oro', 'detalle_oro.codigo', '=', 'oro.codigo')
        ->join ('personas', 'personas.dni', '=', 'oro.dni')
        ->join ('tiendas', 'tiendas.nombre', '=', 'oro.tienda')
        ->select ('detalle_oro.*', 'oro.*', 
                'personas.nombre', 'personas.apellido',
                'tiendas.nombre as tiendas_nombre')
        ->first();
        
        return $consulta;
    }
}
