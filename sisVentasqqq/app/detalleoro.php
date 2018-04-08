<?php

namespace sisVentas;

use Illuminate\Database\Eloquent\Model;

class detalleoro extends Model
{
    protected $table='detalle_oro';

    protected $primaryKey='id';

    public $timestamps=true;


    protected $fillable =[
    	

            'codigo',
            'descripcion',
            'obsv',
            'cover',
            'peso_bruto',
            'peso_neto',
            'tazacion',
            'monto_calculo',
            'porcentaje_calculo',
            'interes',
            'mora',
            'total',
 ];

    protected $guarded =[

    ];

    // Obtener Detalles de Contrato
    public function getContatoyDetallesContratooro($codigo) {

        $consulta = detalleoro::where('detalle_oro.codigo', $codigo)
        ->join('oro', 'oro.codigo', '=', 'detalle_oro.codigo')
        ->join('personas', 'personas.dni', '=', 'oro.dni')
        ->join('tiendas', 'tiendas.nombre', '=', 'oro.tienda')
        ->select('personas.nombre', 'personas.apellido',
                'tiendas.nombre as tiendas_nombre',
                'detalle_oro.*', 'oro.*')
        ->get();
         
        return $consulta;

    }

}
