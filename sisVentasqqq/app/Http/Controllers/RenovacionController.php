<?php

namespace sisVentas\Http\Controllers;

use Illuminate\Http\Request;

use sisVentas\Http\Requests;


use sisVentas\Contratos;
use sisVentas\CajaIngresos;
use sisVentas\ContratosRenovaciones;
use sisVentas\ContratosDetalles;
use sisVentas\ContratosAbonos;
use DB;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class RenovacionController extends Controller
{
   protected $contratos;
	protected $contratos_renovaciones;
	protected $contratos_abonos;
	protected $contratos_detalles;
	
	public function __construct()
	{
		// Verificar Autenticacion del Usuario
		//$this->middleware('auth');
		
		// Modelo Contratos
		$this->contratos = new Contratos();
		
		// Modelo Contratos
		$this->contratos_detalles = new ContratosDetalles();
		
		// Modelo ContratosRenovaciones
		$this->contratos_renovaciones = new ContratosRenovaciones();
		
		// Modelo ContratosAbonos
		$this->contratos_abonos = new ContratosAbonos();
	}
	
	public function index(Request $request) 
	{
		$now = Carbon::now ( 'America/Lima' );
		
		if ($request) {
			$contrato = $this->contratos->getContratos()->last();
			
			return view ( 'detalles.renovacion.index', compatc('contrato', 'now'));
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
		
		// Fecha Actual
		$fecha_actual = Carbon::now();
		
		// Consultar Contrato
		$contrato = $this->contratos_detalles->getContatoyDetallesContrato($request->contratos_codigo)->last();
		
		if ($contrato->estatus != 'Cancelado') {
			
			if ($request->btn_renovar == 1) {

				if ($request->dias > 0 &&  $request->dias < 65) {
					$data = [
							'fecha_renovacion' 	=> Carbon::parse($request->fecha_renovacion)->addDays(30)->format('Y-m-d'),
							'fecha_mes' 		=> Carbon::parse($request->fecha_renovacion)->addDays(60)->format('Y-m-d'),
							'fecha_final' 		=> Carbon::parse($request->fecha_renovacion)->addDays(65)->format('Y-m-d'),
					];
						
					$renovacion = $this->registrarRenovacion($request, $data);
					
				}elseif ($request->dias == 0){
					// Mensaje
					return redirect("contrato/renovacion/$request->contratos_codigo")
					->withErrors("No se realizaron correctamente los cambios solictados. Verifique e intente nuevamente.");
				}
			}
			
			if ($request->btn_cancelar == 1) {
				
				$data = [
						'fecha_renovacion' 	=> Carbon::parse($request->fecha_renovacion),
						'fecha_mes' 		=> Carbon::parse($request->fecha_mes),
						'fecha_final' 		=> Carbon::parse($request->fecha_final),
				];
				
				DB::transaction(function() use ($request, $data)
				{
					// Registrar Cancelación de Contrato
					$this->registrarRenovacion($request, $data);
			
					// Actualizar Estatus del Contrato
					$this->contratos->where('id', $request->contratos_id)->update(['estatus' => 'Cancelado']);
				});
			}
			
		}else{
			// Mensaje
			return redirect("contrato/renovacion/$request->contratos_codigo")
			->withErrors("El presente contrato fue CANCELADO por el Contratante.");
		}
		
		return redirect("contrato/renovacion/$request->contratos_codigo");
	}
	
	public function edit($id)
	{
		
		// Consddultar Contrato
		
		$contrato = $this->contratos_detalles->getContatoyDetallesContrato($id)->last();
	
		// Consultar Renovaciones
		$contrato_renovacion = $this->contratos_renovaciones->getRenovacionesxContrato($contrato->contratos_codigo);
	
		// Fecha Actual
		$fecha_actual = Carbon::now();
	
		if ($contrato_renovacion->count() == 0) {
			$fechas = [
					'fecha_actual' 	=> $fecha_actual->format('Y-m-d'),
					'fecha_inicio' 	=> $contrato->fecha_inicio,
					'fecha_mes' 	=> $contrato->fecha_mes,
					'fecha_final' 	=> $contrato->fecha_final
			];
	
			$fecha_inicio = Carbon::parse($fechas['fecha_inicio']);
	
		}else{
	
			$fechas = [
					'fecha_actual' 	=> $fecha_actual->format('Y-m-d'),
					'fecha_inicio' 	=> Carbon::parse($contrato_renovacion->last()->fecha_renovacion)->format('Y-m-d'),
					'fecha_mes' 	=> $contrato_renovacion->last()->fecha_mes,
					'fecha_final' 	=> $contrato_renovacion->last()->fecha_final
			];
	
			$fecha_inicio = Carbon::parse($fechas['fecha_inicio']);
		}
	
		$dias_transcurridos = $this->calcularDias($fecha_actual, $fecha_inicio);
		$total_interes = $this->calcularInteres($dias_transcurridos, $contrato);
		$total_mora = $this->calcularMora($dias_transcurridos, $contrato);
	
		return view ('detalles.renovacion.index', compact('contrato', 'contrato_renovacion', 'fechas', 'dias_transcurridos', 'total_interes', 'total_mora'));
	}
	
	public function registrarRenovacion($request, $data = array())
	{
		
		$contratos_renovaciones = new ContratosRenovaciones();
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
		// Registrar Movimientos de Caja
		$caja_ingreso = new CajaIngresos();
		$caja_ingreso->contratos_codigo = $request->get('contratos_codigo');
		$caja_ingreso->tipo_movimiento = 'Ingresos Por Electro';
		$caja_ingreso->tiendas_id = $request->get('tiendas_id');
		$caja_ingreso->monto = $request->get('total_pagado');
		$caja_ingreso->save();
		
		return $renovacion;
	}
	
	public function storeCapital(Request $request)
	{
		
		// Consultar Contrato
		$contrato = $this->contratos_detalles->getContatoyDetallesContrato($request->contratos_codigo)->last();

		
		if ($request->total_pagado < $contrato->tazacion) {
				
			$data = [
					'fecha_renovacion' 	=> Carbon::parse($request->fecha_renovacion),
					'fecha_mes' 		=> Carbon::parse($request->fecha_mes),
					'fecha_final' 		=> Carbon::parse($request->fecha_final),
			];
				
			DB::transaction(function() use ($request, $contrato, $data)
			{
				// Registrar Cancelación de Contrato
				$abono_capital = $this->registrarAbonoCapital($request, $data);
					
				// Registrar Detalles Contrato
				$this->duplicarDetallesContrato($contrato, $abono_capital);
			});
				
			return redirect("contrato/abonar/$contrato->contratos_codigo");
			
		}else {
			// Mensaje
			return redirect("contrato/abonar/$contrato->contratos_codigo")
			->withErrors("El monto a cancelar debe ser menor al monto de la tazacion.");
		}
	}
	
	public function registrarAbonoCapital($request, $data = array())
	{

		$contratos_abonos = new ContratosAbonos();
		$abonos = $contratos_abonos->create([
				'contratos_codigo'	=>	$request->contratos_codigo,
				'fecha_renovacion'	=>	$data['fecha_renovacion'],
				'fecha_mes'			=>	$data['fecha_mes'],
				'fecha_final'		=>	$data['fecha_final'],
				'dias'				=>	$request->dias,
				'total_interes'		=>	$request->total_interes,
				'total_mora'		=>	$request->total_mora,
				'total_pagado'		=>	$request->total_pagado,
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
	
	public function duplicarDetallesContrato($detalles_contrato, $abono_capital)
	{
		
		$nuevos_totales = $this->calcularTotales($detalles_contrato, $abono_capital);
		
		$contratos_detalles = new ContratosDetalles();
		$nuevos_detalles_contratos = $contratos_detalles->create([
				'contratos_codigo'	=>	$detalles_contrato->contratos_codigo,
				'descripcion'		=>	$detalles_contrato->descripcion,
				'marca'				=>	$detalles_contrato->marca,
				'modelo'			=>	$detalles_contrato->modelo,
				'serial'			=>	$detalles_contrato->serial,
				'obsv'				=>	$detalles_contrato->obsv,
				'cover'				=>	$detalles_contrato->cover,
				'tazacion'			=>	$nuevos_totales['tazacion'],
				'interes'			=>	$nuevos_totales['interes'],
				'subtotal'			=>	$nuevos_totales['subtotal'],
				'total'				=>	$nuevos_totales['total'],
				
		]);
	
		// Registrar Movimientos de Caja
		$caja_ingreso = new CajaIngresos();
		$caja_ingreso->contratos_codigo = $detalles_contrato->contratos_codigo;
		$caja_ingreso->tipo_movimiento = 'Ingresos Por Electro';
		$caja_ingreso->tiendas_id = $detalles_contrato->tiendas_id;
		$caja_ingreso->monto = $abono_capital->total_pagado;
		$caja_ingreso->save();
	
		return $nuevos_detalles_contratos;
	}
	
	public function editCapital($id)
	{
		
		// Consultar Contrato
		$contrato = $this->contratos_detalles->getContatoyDetallesContrato($id)->last();
		
		// Consultar Renovaciones
		$contrato_abonos = $this->contratos_abonos->getAbonosCapitalxContrato($contrato->contratos_codigo);
		
		// Consultar Renovaciones
		$contrato_renovacion = $this->contratos_renovaciones->getRenovacionesxContrato($contrato->contratos_codigo);
	
		// Fecha Actual
		$fecha_actual = Carbon::now();
		
		if ($contrato->estatus != 'Cancelado') {
			if ($contrato_renovacion->count() == 0) {
				$fechas = [
						'fecha_actual' 	=> $fecha_actual->format('Y-m-d'),
						'fecha_inicio' 	=> $contrato->fecha_inicio,
						'fecha_mes' 	=> $contrato->fecha_mes,
						'fecha_final' 	=> $contrato->fecha_final
				];
			
				$fecha_inicio = Carbon::parse($fechas['fecha_inicio']);
			
			}else{
			
				$fechas = [
						'fecha_actual' 	=> $fecha_actual->format('Y-m-d'),
						'fecha_inicio' 	=> Carbon::parse($contrato_renovacion->last()->fecha_renovacion)->format('Y-m-d'),
						'fecha_mes' 	=> $contrato_renovacion->last()->fecha_mes,
						'fecha_final' 	=> $contrato_renovacion->last()->fecha_final
				];
			
				$fecha_inicio = Carbon::parse($fechas['fecha_inicio']);
			}
			
			$dias_transcurridos = $this->calcularDias($fecha_actual, $fecha_inicio);
			$total_interes = $this->calcularInteres($dias_transcurridos, $contrato);
			$total_mora = $this->calcularMora($dias_transcurridos, $contrato);
			
			if ($total_interes == 0 && $total_mora == 0) {
				return view ('detalles.renovacion.index_capital', compact('contrato', 'contrato_renovacion', 'contrato_abonos', 'fechas', 'dias_transcurridos', 'total_interes', 'total_mora'));
			}else {
				// Mensaje
				return redirect("contrato/renovacion/$contrato->contratos_codigo")
				->withErrors("El presente tiene interes y/o mora por cancelar.");
			}
		}
		
		// Mensaje
		return redirect("contrato");
		
	}
	
	public function calcularTotales($detalles_contrato, $abono_capital)
	{
		if ($detalles_contrato->tazacion >= $abono_capital->total_pagado){
				
			$tazacion = $detalles_contrato->tazacion - $abono_capital->total_pagado;
			$interes = ($tazacion * $detalles_contrato->categorias_interes) / 100;
			$subtotal = $tazacion + $interes;
			$total = $subtotal;
				
			$totales = ([
					'tazacion' => $tazacion,
					'interes' => $interes,
					'subtotal' => $subtotal,
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
		
		if ($dias > 0 && $dias <= 35) {
			$total_interes = $detalles_contrato->interes;
		}
		
		if ($dias > 35 && $dias <= 65) {
			$interes_diario = ($detalles_contrato->interes*2);
			$total_interes = $interes_diario ;
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
			$total_mora = $detalles_contrato->interes * 0.50;
		}
		
		return $total_mora;
	}
	
}