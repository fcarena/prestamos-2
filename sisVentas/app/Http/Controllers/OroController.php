<?php

namespace sisVentas\Http\Controllers;

use Illuminate\Http\Request;

use sisVentas\Http\Requests;

use sisVentas\oro;
use sisVentas\config\app;
use sisVentas\detalleoro;
use sisVentas\caja_egresos;
use sisVentas\ContratoRenovacionOro;
use Illuminate\Support\Facades\Redirect;
use sisVentas\Http\Requests\OroFormRequest;
use DB;
use Carbon\Carbon;

class OroController extends Controller
{

    protected $oro;
    protected $contratos_renovacionesoro;
   public function __construct()
    {

        // Verificar Autenticacion del Usuario
        //$this->middleware('auth');
        
        // Modelo Contratos
        $this->oro = new oro();
        
        // Modelo ContratosRenovaciones
        $this->contratos_renovacionesoro = new ContratoRenovacionOro();
    
    }
    public function index(Request $request)
    {
        if ($request)
        {
            $query=trim($request->get('searchText'));
            $oro=DB::table('oro as o')
            ->join('detalle_oro as do','do.codigo','=','o.codigo')
            ->where('o.estatus','!=','Cancelado')
            ->select('o.codigo','o.nombre','do.descripcion','do.tazacion','o.estatus','o.id','o.dni','do.peso_neto','do.interes','do.total')
            ->where('o.codigo','LIKE','%'.$query.'%')

            ->orderBy('o.id','decs')
            ->paginate(5);
            
            return view('contrato.oro.index',["oro"=>$oro,"searchText"=>$query]);
        }
    }
    public function create()
    {
        $persona=DB::table('personas as per')
		->select('per.nombre','per.dni','per.tipo_dni')
        ->get();
        $now = Carbon::now('America/Lima');
        $categoria=DB::table('categorias as cat')
        ->select('cat.nombre','cat.interes')
        ->get();
        $tienda=DB::table('tiendas as ti')
        ->select('ti.nombre')
        ->get();
        return view("contrato.oro.create",["categorias"=>$categoria, "now"=>$now, "tiendas"=>$tienda, "personas"=>$persona]);

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
        

      
        $caja_egresos= new caja_egresos;
        $caja_egresos->contrato_codigo=$request->get('codigo');
        $caja_egresos->tienda=$request->get('tienda');
        $caja_egresos->tipo_movimiento='Egresos Por Oro';
        $caja_egresos->monto=$tazacion[0];
        $caja_egresos->save();
       


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
        
            $detalle=DB::table('oro as o')
            ->join('personas as per','per.dni','=','o.dni')
            ->join('detalle_oro as do','do.codigo','=','o.codigo')
            ->select('do.interes','do.obsv','per.telefono1','per.tipo_dni','per.direccion','per.distrito','per.apellido','o.dni','o.fecha_final','o.fecha_inicio','o.codigo as coo','o.nombre','do.descripcion','do.tazacion','o.estatus','o.id')
            ->first();

            return view("contrato.oro.show",["detalle"=>$detalle]);

    }
        public function impre($id)
    {

    $data = $this->getData();
     $date = date('Y-m-d');
      $invoice = "2222";
    $vista="reportes.oro.index";
    $view = \View::make($vista, compact('data', 'date', 'invoice'))->render();      
    $pdf= \App::make('dompdf.wrapper');
    $pdf->loadHTML($view);
    return $pdf->stream('arch.pdf');

    }
 public function getData() 
    {
        $data =  [
            'quantity'      => '1' ,
            'description'   => 'some ramdom text',
            'price'   => '500',
            'total'     => '500'
        ];
        return $data;
    }

public function edit($id)
{

{
        // Consultar Contrato
        $oro = $this->oro->getContatoyDetallesContratooro($id);
        
        // Consultar Renovaciones
        $contratos_renovacionesoro = $this->contratos_renovacionesoro->getRenovacionesxContratooro($oro->codigo);
        
        // Fecha Actual
        $fecha_actual = Carbon::now();
        
        if ($contratos_renovacionesoro->count() == 0) {
            $fechas = [
                    'fecha_actual'  => $fecha_actual->format('Y-m-d'),
                    'fecha_inicio'  => $oro->fecha_inicio,
                    'fecha_mes'     => $oro->fecha_mes,
                    'fecha_final'   => $oro->fecha_final
            ];
            
            $fecha_inicio = Carbon::parse($fechas['fecha_inicio']);
            
        }else{
            
            $fechas = [
                    'fecha_actual'  => $fecha_actual->format('Y-m-d'),
                    'fecha_inicio'  => Carbon::parse($contratos_renovacionesoro->last()->fecha_renovacion)->format('Y-m-d'),
                    'fecha_mes'     => $contratos_renovacionesoro->last()->fecha_mes,
                    'fecha_final'   => $contrato_renovacionesoro->last()->fecha_final
            ];
            
            $fecha_inicio = Carbon::parse($fechas['fecha_inicio']);
        }
        
        $dias_transcurridos = $this->calcularDias($fecha_actual, $fecha_inicio);
        $total_interes = $this->calcularInteres($dias_transcurridos, $oro);
        
        $total_mora = $this->calcularMora($dias_transcurridos, $oro);
        
        return view ('detalles.renovacion_oro.index', compact('oro', 'contratos_renovacionesoro', 'fechas', 'dias_transcurridos', 'total_interes', 'total_mora'));
    }

}

public function calcularDias($fecha_mayor, $fecha_menor) 
    {
        if ($fecha_mayor > $fecha_menor) {
            $dias_transcurridos = $fecha_mayor->diffInDays($fecha_menor);
        }else $dias_transcurridos = 0;
        
        return $dias_transcurridos;
    }
    public function adicionarDias($fecha, $dias)
    {
        $fecha_con_dias_adicionales = $fecha->addDays($dias);
    
        return $fecha_con_dias_adicionales;
    }
    
    public function calcularInteres($dias, $detalles_contrato) 
    {
       
        $total_interes = 0;
        
        if ($dias >= 1 && $dias <= 35) {
            $total_interes = $detalles_contrato->interes;
        }
        
        if ($dias > 35 && $dias <= 65) {
            $interes_diario = ($detalles_contrato->interes)/ 30;
            $total_interes = $interes_diario * $dias;
        }
        
        return $total_interes;
    }
    
    public function calcularMora($dias, $detalles_contrato) 
    {
        $total_mora = 0;
        
        if ($dias > 35 && $dias <= 60) {
            $total_mora = $detalles_contrato->interes * 0.30;
        }
    
        if ($dias > 60 && $dias <= 65) {
            $total_mora = $detalles_contrato->interes * 1;


        }
        if ($dias > 66) {
            
        }
        return $total_mora;
    }
}
