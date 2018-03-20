<?php

namespace sisVentas\Http\Controllers;

use Illuminate\Http\Request;

use sisVentas\Http\Requests;
use sisVentas\contrato;
use sisVentas\detalleContrato;
use Illuminate\Support\Facades\Redirect;
use sisVentas\Http\Requests\ContratoFormRequest;
use DB;
use Carbon\Carbon;





class ContratoController extends Controller
{
	public function __construct()
    {

    }
    public function index(Request $request)
    {
        if ($request)
        {
            $query=trim($request->get('searchText'));
            $contrato=DB::table('contrato as co')
            ->join('detalle_contrato as dc','dc.codigo','=','co.codigo')
            ->select('co.codigo','co.nombre','dc.descripcion','dc.tazacion','co.estatus','co.id','co.dni')
            ->where('co.codigo','LIKE','%'.$query.'%')
            ->orderBy('co.codigo','decs')
            ->paginate(5);
            return view('contrato.nuevo.index',["contrato"=>$contrato,"searchText"=>$query]);
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
        return view("contrato.nuevo.create",["categoria"=>$categoria, "now"=>$now, "tienda"=>$tienda, "contrato"=>$contrato, "persona"=>$persona]);

    }

 public function store (ContratoFormRequest $request)
    {
 
try {
    
    DB::beginTransaction();

         $contrato= new contrato;
        $contrato->codigo=$request->get('codigo');
        $contrato->dni=$request->get('dni');
        $contrato->nombre=$request->get('nombre');
        $contrato->tienda=$request->get('tienda');
        $contrato->fecha_inicio=$request->get('fecha_inicio');
        $contrato->fecha_mes=$request->get('fecha_mes');
        $contrato->fecha_final=$request->get('fecha_final');
        $contrato->categoria=$request->get('categoria');
        $contrato->estatus='Activo';
        $contrato->cantida='2';
        $contrato->save();

        $descripcion=$request->get('descripcion');
        $marca=$request->get('marca');
        $modelo=$request->get('modelo');
        $serial=$request->get('serial');
        $tazacion=$request->get('tazacion');
        $obsv=$request->get('obsv');
        $cover=$request->get('cover');
        $interes=$request->get('interes');
        $mora='0';
        $subtotal=$request->get('subtotal');
        $total=$request->get('total');

        $cont=0;
        while ( $cont <= 0 ){

        $detalle= new detalleContrato();
        $detalle->codigo=$contrato->codigo;
        $detalle->descripcion=$descripcion[$cont];
        $detalle->marca=$marca[$cont];
        $detalle->modelo=$modelo[$cont];
        $detalle->serial=$serial[$cont];
        $detalle->tazacion=$tazacion[$cont];
        $detalle->obsv=$obsv[$cont];
        $detalle->cover=$cover[$cont];
        $detalle->interes=$interes[$cont];
        $detalle->interes=$interes[$cont];
        $detalle->subtotal=$subtotal[$cont];
        $detalle->total=$total[$cont];
        $detalle->save();
         $cont=$cont+1;


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
