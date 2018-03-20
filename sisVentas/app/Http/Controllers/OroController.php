<?php

namespace sisVentas\Http\Controllers;

use Illuminate\Http\Request;

use sisVentas\Http\Requests;

use sisVentas\oro;
use sisVentas\detalleoro;
use Illuminate\Support\Facades\Redirect;
use sisVentas\Http\Requests\OroFormRequest;
use DB;
use Carbon\Carbon;

class OroController extends Controller
{
   public function __construct()
    {

    }
    public function index(Request $request)
    {
        if ($request)
        {
            $query=trim($request->get('searchText'));
            $oro=DB::table('oro as o')
            ->join('detalle_oro as do','do.codigo','=','o.codigo')
            ->select('o.codigo','o.nombre','do.descripcion','do.tazacion','o.estatus','o.id','o.dni','do.peso_neto','do.interes','do.total')
            ->where('o.codigo','LIKE','%'.$query.'%')
            ->orderBy('o.id','decs')
            ->paginate(5);
            return view('contrato.oro.index',["oro"=>$oro,"searchText"=>$query]);
        }
    }
    public function create()
    {
        $contrato=DB::table('contrato')->get();
        $persona=DB::table('persona as per')
		->select('per.nombre','per.dni','per.tipo_dni')
        ->get();
        $now = Carbon::now('America/Lima');
        $categoria=DB::table('categoria as cat')
        ->select('cat.nombre','cat.interes')
        ->get();
        $tienda=DB::table('tienda as ti')
        ->select('ti.nombre')
        ->get();
        return view("contrato.oro.create",["categoria"=>$categoria, "now"=>$now, "tienda"=>$tienda, "contrato"=>$contrato, "persona"=>$persona]);

    }

 public function store (OroFormRequest $request)
    {
 
try {
    
    DB::beginTransaction();

         $oro= new oro;
        $oro->codigo=$request->get('codigo');
        $oro->dni=$request->get('dni');
        $oro->nombre=$request->get('nombre');
        $oro->tienda=$request->get('tienda');
        $oro->fecha_inicio=$request->get('fecha_inicio');
        $oro->fecha_mes=$request->get('fecha_mes');
        $oro->fecha_final=$request->get('fecha_final');
        $oro->estatus='Activo';
        $oro->save();

        $descripcion=$request->get('descripcion');
        $obsv=$request->get('obsv');
        $cover=$request->get('cover');
        $interes=$request->get('interes');
        $tazacion=$request->get('tazacion');
        $peso_neto=$request->get('peso_neto');
        $peso_bruto=$request->get('peso_bruto');
        $monto_calculo=$request->get('monto_calculo');
        $porcentaje_calculo=$request->get('porcentaje_calculo');
        $total=$request->get('total');
        $mora='0';

        $mora='0';

        $contc=0;
        while ( $contc <= 0 ){

        $detalle= new detalleoro();
        $detalle->codigo=$oro->codigo;
        $detalle->descripcion=$descripcion[$contc];
        $detalle->obsv=$obsv[$contc];
        $detalle->cover=$cover[$contc];
        $detalle->interes=$interes[$contc];
        $detalle->tazacion=$tazacion[$contc];
        $detalle->peso_neto=$peso_neto[$contc];
        $detalle->peso_bruto=$peso_bruto[$contc];
        $detalle->monto_calculo=$monto_calculo[$contc];
        $detalle->porcentaje_calculo=$porcentaje_calculo[$contc];
        $detalle->total=$total[$contc];
        $detalle->save();
         $contc=$contc+1;


}


    DB::commit();

}

catch (Exception $e) {
    
  DB::rollback();
           
    }
    return Redirect::to('contrato/oro');
}

     public function show($id)
    {
        
            $detalle=DB::table('contrato as co')
            ->join('persona as per','per.dni','=','co.dni')
            ->join('categoria as cat','cat.nombre','=','co.categoria')
            ->join('detalle_contrato as dc','dc.codigo','=','co.codigo')
            ->select('co.codigo','co.nombre','dc.descripcion','dc.tazacion','co.estatus','co.id')
            ->where('co.codigo','=',$id)->first();

            $detalled=DB::table('detalle_contrato as dc')
            ->join('contrato as co','dc.codigo','=','co.codigo')
            ->select('co.codigo','co.nombre','dc.descripcion','dc.tazacion','co.estatus','dc.id')
            ->where('dc.codigo','=',$id)->get();

            return view("contrato.nuevo.show",["detalle"=>$detalle,"detalled"=>$detalled]);
    }


}
