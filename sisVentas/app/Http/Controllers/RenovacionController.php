<?php

namespace sisVentas\Http\Controllers;

use Illuminate\Http\Request;

use sisVentas\Http\Requests;
use sisVentas\contrato;
use sisVentas\minteres;
use sisVentas\Http\Requests\MinteresFormRequest;
use DB;
use Carbon\Carbon;

class RenovacionController extends Controller
{
     public function index(Request $request)
    {
        if ($request)
        {
			        
         	 $contrato=DB::table('contrato as co','detalle_contrato')
            ->join('detalle_contrato as dc','dc.codigo','=','co.codigo')
            ->select('co.codigo','co.dni','co.nombre','co.tienda','co.estatus','co.fecha_inicio','co.fecha_mes','co.fecha_final','dc.tazacion','dc.descripcion','dc.interes','dc.total','dc.obsv','dc.cover','dc.mora')->get();
            $now = Carbon::now('America/Lima');
           
            
              
            return view('detalles.renovacion.index',["contrato"=>$contrato,"now"=>$now]);
        }
   
  }

  public function cdia(Request $fecha)
  {
$fecha= Carbon::parse($request->input('fecha'));
$fecha_dia = Carbon::now();

$dias = $fecha->diffInDays($fecha_dia);

return view('detalles.renovacion.index',compact('$dia'));
  }
  public function create()
    {
  

    }

 public function edit ($id)
    {

       $contrato=contrato::findOrFail($id);
        $contrato=DB::table('detalle_contrato as dc')
        ->select('dc.interes');
        return view("detalles.renovacion.edit",["contrato"=>$contrato]);


}

}
