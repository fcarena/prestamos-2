<?php

namespace sisVentas\Http\Controllers;

use Illuminate\Http\Request;

use sisVentas\Http\Requests;
use sisVentas\oro;
use sisVentas\detalleoro;
use sisVentas\caja_egresos;
use sisVentas\cajaIngresos;
use sisVentas\cajaCapital;
use sisVentas\ContratosAbonosOro;
use sisVentas\ContratoRenovacionOro;
use Illuminate\Support\Facades\Redirect;
use sisVentas\Http\Requests\OroFormRequest;
use DB;
use Carbon\Carbon;

class CancelarContratoOroController extends Controller
{
   
	protected $oro;
    protected $contratos_renovacionesoro;
    protected $contratos_abonosoro;
    protected $contratos_detallesoro;
   public function __construct()
    {

        // Verificar Autenticacion del Usuario
        //$this->middleware('auth');
        
        // Modelo Contratos
        $this->oro = new oro();
        // Modelo Contratos
        $this->contratos_detallesoro = new detalleoro();
        
        // Modelo ContratosRenovaciones
        $this->contratos_renovacionesoro = new ContratoRenovacionOro();
        // Modelo ContratosAbonos
        $this->contratos_abonosoro = new ContratosAbonosOro();
    
    }
	public function index(Request $request) 
	{
		$now = Carbon::now ( 'America/Lima' );
		
		if ($request) {
			$oro = $this->oro->getContratosoro();
			return view ( 'detalles.renovacion_oro.index', compatc('oro', 'now'));
		}
	}
	
	public function show($id)
	{
	}
	
	
	public function create() 
	{
	}
	
	public function store(Request $request)
	{
             
        

        // Consultar Contrato
        $oro = $this->contratos_detallesoro->getContatoyDetallesContratooro($request->codigo)->last();


        // Fecha Actual
        $fecha_actual = Carbon::now();
       
        
        if ($request->estatus != 'Cancelado') {
            
            if ($request->btn_renovar == 1) {
                if ($request->dias > 0 &&  $request->dias < 65) {
                    $data = [

                            'fecha_renovacion'  => Carbon::parse($request->fecha_renovacion)->addDays(30)->format('Y-m-d'),
                            'fecha_mes'         => Carbon::parse($request->fecha_renovacion)->addDays(60)->format('Y-m-d'),
                            'fecha_final'       => Carbon::parse($request->fecha_renovacion)->addDays(65)->format('Y-m-d'),

                    ];

                   DB::transaction(function() use ($request, $data)
                {
                    // Registrar Cancelación de Contrato
                    $this->registrarRenovacioncp($request, $data);
            
                    // Actualizar Estatus del Contrato
                    $this->oro->where('id', $request->contratos_id)->update(['estatus' => 'PreCancelado']);
                });
                    
                }
            }
         if ($request->btn_cancelar == 1) {
                
                $data = [
                        'fecha_renovacion'  => Carbon::parse($request->fecha_renovacion),
                        'fecha_mes'         => Carbon::parse($request->fecha_mes),
                        'fecha_final'       => Carbon::parse($request->fecha_final),
                ];
                
                DB::transaction(function() use ($request, $data)
                {
                    // Registrar Cancelación de Contrato
                    $this->registrarRenovacionc($request, $data);
            
                    // Actualizar Estatus del Contrato
                    $this->oro->where('id', $request->contratos_id)->update(['estatus' => 'Cancelado']);
                });
            }

            }else{
            // Mensaje
            return redirect("contrato/renovacion/$request->contratos_id")
            ->withErrors("No se realizaron correctamente los cambios solictados. Verifique e intente nuevamente.");
        }
        
        return redirect("/contrato/oro");
    }

       
public function registrarRenovacioncp($request, $data = array())
    {
        
        $contratos_renovaciones = new ContratoRenovacionoro();
        $renovacion = $contratos_renovaciones->create([
                'contratos_codigo'  =>  $request->contratos_codigo,
                'fecha_renovacion'  =>  $data['fecha_renovacion'],
                'fecha_mes'         =>  $data['fecha_mes'],
                'fecha_final'       =>  $data['fecha_final'],
                'dias'              =>  $request->dias,
                'total_interes'     =>  $request->total_interes,
                'total_mora'        =>  $request->total_mora,
                'total_pagado'      =>  $request->total_pagado,



        
        ]);
 $caja_ingreso= new CajaIngresos;
        $caja_ingreso->contratos_codigo=$request->get('contratos_codigo');
        
        $caja_ingreso->tipo_movimiento = 'Ingresos Por Oro  Cancelado';
        $caja_ingreso->monto = $request->get('total_pagado');
        $caja_ingreso->save();
        
        
        return $renovacion;
    }
	
	public function registrarRenovacionc($request, $data = array())
	{
		
		$contratos_renovaciones = new ContratoRenovacionoro();
		$renovacion = $contratos_renovaciones->create([
				'contratos_codigo'	=>	$request->contratos_codigo,
				'fecha_renovacion'	=>	$data['fecha_renovacion'],
				'fecha_mes'			=>	$data['fecha_mes'],
				'fecha_final'		=>	$data['fecha_final'],
				'dias'				=>	$request->dias,
				'total_interes'		=>	$request->total_interes,
				'total_mora'		=>	$request->total_mora,
				'total_pagado'		=>	$request->total_pagado,



		
		]);
 $caja_ingreso= new CajaCapital;
        $caja_ingreso->contratos_codigo=$request->get('contratos_codigo');
        
        $caja_ingreso->tipo_movimiento = 'Ingresos Por Oro  Cancelado';
        $caja_ingreso->monto = $request->get('total_pagado');
        $caja_ingreso->save();
        
		
		return $renovacion;
	}
	
	public function edit($id)
{

{
    
            // Consultar Contrato
        $oro = $this->contratos_detallesoro->getContatoyDetallesContratooro($id)->last();

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
                    'fecha_final'   => $contratos_renovacionesoro->last()->fecha_final
            ];
            
            $fecha_inicio = Carbon::parse($fechas['fecha_inicio']);
        }
        
        $dias_transcurridos = $this->calcularDias($fecha_actual, $fecha_inicio);
       
        $total_interes = $this->calcularInteres($dias_transcurridos, $oro);

        $total_mora = $this->calcularMora($dias_transcurridos, $oro);
        
        return view ('cancelar.oro.index', compact('oro', 'contratos_renovacionesoro', 'fechas', 'dias_transcurridos', 'total_interes', 'total_mora'));
    }

}
public function editCapital($id)
    {   

     $oro = $this->contratos_detallesoro->getContatoyDetallesContratooro($id)->last();

        // Consultar Renovaciones
        $contratos_abonosoro = $this->contratos_abonosoro->getAbonosCapitalxContratooro($oro->codigo);


          $contratos_renovacionesoro = $this->contratos_renovacionesoro->getRenovacionesxContratooro($oro->codigo);
        
   
        // Fecha Actual
        $fecha_actual = Carbon::now();
        
        if ($oro->estatus != 'Cancelado' && $oro->estatus != 'PreCancelado') {
            if ($contratos_renovacionesoro->count() == 0) {
                $fechas = [

                        'fecha_actual'  => $fecha_actual->format('Y-M-d'),
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
                        'fecha_final'   => $contratos_renovacionesoro->last()->fecha_final
                ];
            
                $fecha_inicio = Carbon::parse($fechas['fecha_inicio']);
            }
            
            $dias_transcurridos = $this->calcularDias($fecha_actual, $fecha_inicio);
            $total_interes = $this->calcularInteres($dias_transcurridos, $oro);
         
            $total_mora = $this->calcularMora($dias_transcurridos, $oro);

            if ($oro->estatus == 'Activo' && $dias_transcurridos==0 ) 
            {
                    return view ('cancelar.oro.index', compact('oro', 'contratos_renovacionesoro', 'contratos_abonosoro', 'fechas', 'dias_transcurridos', 'total_interes', 'total_mora'));
            }
            
            
            if ( $oro->estatus == 'PreCancelado') 
                { $fechas = [
                        'fecha_actual'  => $fecha_actual->format('Y-m-d'),
                        'fecha_inicio'  => Carbon::parse($contratos_renovacionesoro->last()->fecha_renovacion)->format('Y-m-d'),
                        'fecha_mes'     => $contratos_renovacionesoro->last()->fecha_mes,
                        'fecha_final'   => $contratos_renovacionesoro->last()->fecha_final
                ];
                $dias_transcurridos=0;
                $total_interes=0;
                $total_mora=0;
                return view ('cancelar.nuevo.index', compact('contrato', 'contrato_renovacion', 'contrato_abonos', 'fechas', 'dias_transcurridos', 'total_interes', 'total_mora'));
            }else {
              
                return redirect("cancelar/oroc/$oro->codigo")
                ->withErrors("El Presente Contrato Tiene interes y/o mora por cancelar.");
            }
        }
        
        // Mensaje
        return redirect("contrato");
        
    }
    public function storeCapital(Request $request)
    {
        dd("store");
        $oro = $this->contratos_detallesoro->getContatoyDetallesContratooro($request->contratos_codigo)->last();
       
        
        if ($request->total_pagado < $oro->tazacion) {
                
            $data = [
                    'fecha_renovacion'  => Carbon::parse($oro->fecha_renovacion),
                    'fecha_mes'         => Carbon::parse($oro->fecha_mes),
                    'fecha_final'       => Carbon::parse($oro->fecha_final),
            ];
                
            DB::transaction(function() use ($request, $oro, $data)
            {
                // Registrar Cancelación de Contrato
                $abono_capital = $this->registrarAbonoCapitaloro($request, $data);
                    
                // Registrar Detalles Contrato
                $this->duplicarDetallesContrato($oro, $abono_capital);
            });
                
            return redirect("contrato/abonaroro/$oro->codigo");
            
        }else {
            // Mensaje
            return redirect("contrato/abonaroro/$oro->codigo")
            ->withErrors("El monto a cancelar debe ser menor al monto de la tazacion.");
        }
    }
    public function registrarAbonoCapitaloro($request, $data = array())
    {
        $contratos_abonosoro = new ContratosAbonosOro();
        $abonos = $contratos_abonosoro->create([
                'contratos_codigo'  =>  $request->contratos_codigo,
                'fecha_renovacion'  =>  $data['fecha_renovacion'],
                'fecha_mes'         =>  $data['fecha_mes'],
                'fecha_final'       =>  $data['fecha_final'],
                'dias'              =>  $request->dias,
                'total_interes'     =>  $request->total_interes,
                'total_mora'        =>  $request->total_mora,
                'total_pagado'      =>  $request->total_pagado,
        ]);
    
        // Registrar Movimientos de Caja
        $caja_ingreso = new CajaIngresos();
        $caja_ingreso->contratos_codigo = $request->get('contratos_codigo');
        $caja_ingreso->tipo_movimiento = 'Ingresos Por Electro';
        $caja_ingreso->tiendas_id = $request->get('tiendas_id');
        $caja_ingreso->monto = $request->get('total_pagado');
        $caja_ingreso->save();
    
        return $abonos;
    }
    
    public function duplicarDetallesContrato($detalle_oro, $abono_capital)
    {
        
        $nuevos_totales = $this->calcularTotalesoro($detalle_oro, $abono_capital);
        
        $contratos_detallesoro = new detalleoro();

        $nuevos_detalles_contratos = $contratos_detallesoro->create([

                'codigo'            =>  $detalle_oro->codigo,
                'descripcion'       =>  $detalle_oro->descripcion,
                'obsv'              =>  $detalle_oro->obsv,
                'cover'             =>  $detalle_oro->cover,
                'peso_bruto'         => $detalle_oro->peso_bruto,
                'peso_neto'         => $detalle_oro->peso_neto,
                'tazacion'          =>  $nuevos_totales['tazacion'],
                'monto_calculo'     => $detalle_oro->monto_calculo,
                'porcentaje_calculo'=> $detalle_oro->porcentaje_calculo,
                'interes'           =>  $nuevos_totales['interes'],
                'mora'              => $detalle_oro->mora,
                'total'             =>  $nuevos_totales['total'],
             
       
           


        ]);
        // Registrar Movimientos de Caja
        $caja_ingreso = new CajaIngresos();
       
        $caja_ingreso->contratos_codigo = $detalle_oro->codigo;
        $caja_ingreso->tipo_movimiento = 'Ingresos Por Electro';
        //$caja_ingreso->tiendas_id = $detalles_contrato->tiendas_id;
        $caja_ingreso->monto = $abono_capital->total_pagado;
        $caja_ingreso->save();
     
        return $nuevos_detalles_contratos->codigo;

    }
    public function calcularTotalesoro($detalle_oro, $abono_capital)
    {

        if ($detalle_oro->tazacion >= $abono_capital->total_pagado){
                
            $tazacion = $detalle_oro->tazacion - $abono_capital->total_pagado;
            $interes = ($tazacion * 0.12);
            $total = $tazacion + $interes;
                
            $totales = ([
                    'tazacion' => $tazacion,
                    'interes' => $interes,
                    'total' => $total,
            ]);
        }
    
        return $totales;
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
        
        if ($dias > 0 && $dias <= 30) {
            $total_interes = $detalles_contrato->interes;
        }
        if ($dias > 30 && $dias <= 35) {
            $interes_diario = ($detalles_contrato->interes)/30;
            $total_interes = $interes_diario * $dias;
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
        
        return $total_mora;
    }
	public function vitrina($dias){

       

    }
}
