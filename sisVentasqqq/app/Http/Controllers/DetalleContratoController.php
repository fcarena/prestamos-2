<?php

namespace sisVentas\Http\Controllers;

use Illuminate\Http\Request;

use sisVentas\Http\Requests;
use sisVentas\contrato;
use DB;
use Carbon\Carbon;
class DetalleContratoController extends Controller
{
    public function index(Request $request)
    {
        if ($request)
        {
			        
         	 $contrato=DB::table('contrato as co','detalle_contrato')
            ->join('detalle_contrato as dc','dc.codigo','=','co.codigo')
            ->select('co.codigo','co.dni','co.nombre','co.tienda','co.estatus','co.fecha_inicio','co.fecha_mes','co.fecha_final','dc.tazacion','dc.descripcion','dc.interes','dc.total','dc.obsv','dc.cover','dc.mora')->get();
            $now = Carbon::now('America/Lima');
           
            
              
            return view('detalles.nuevo.index',["contrato"=>$contrato,"now"=>$now]);
        }
   
  }

  public function cdia(Request $fecha)
  {
$fecha= Carbon::parse($request->input('fecha'));
$fecha_dia = Carbon::now();

$dias = $fecha->diffInDays($fecha_dia);

return view('detalles.nuevo.index',compact('$dia'));
  }

}
