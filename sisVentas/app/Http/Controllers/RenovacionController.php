<?php

namespace sisVentas\Http\Controllers;

use Illuminate\Http\Request;
use sisVentas\Contratos;
use sisVentas\ContratosRenovaciones;
use DB;
use Carbon\Carbon;

class RenovacionController extends Controller {
	
	protected $contratos;
	protected $contratos_renovaciones;
	
	public function __construct()
	{
		// Verificar Autenticacion del Usuario
		//$this->middleware('auth');
		
		// Modelo Contratos
		$this->contratos = new Contratos();
		
		// Modelo ContratosRenovaciones
		$this->contratos_renovaciones = new ContratosRenovaciones();
	}
	
	public function index(Request $request) 
	{
		$now = Carbon::now ( 'America/Lima' );
		
		if ($request) {
			$contrato = $this->contratos->getContratos();
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
		if ($request->dias > 0 &&  $request->dias < 35) {
			$data = [
					'fecha_renovacion' 	=> Carbon::parse($request->fecha_renovacion)->addDays(30)->format('Y-m-d'),
					'fecha_mes' 		=> Carbon::parse($request->fecha_renovacion)->addDays(60)->format('Y-m-d'),
					'fecha_final' 		=> Carbon::parse($request->fecha_renovacion)->addDays(65)->format('Y-m-d'),
			];
			
			$renovacion = $this->registrarRenovacion($request, $data);
		}elseif ($request->dias == 0){
			// Mensaje
			return redirect("contrato/renovacion/$request->contratos_id")
			->withErrors("No se realizaron correctamente los cambios solictados. Verifique e intente nuevamente.");
		}
		
		return redirect("contrato");
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
		
		return $renovacion;
	}
	
	public function edit($id) 
	{
		// Consultar Contrato
		$contrato = $this->contratos->getContatoyDetallesContrato($id);
		
		// Consultar Reovaciones
		$contrato_renovacion = $this->contratos_renovaciones->getRenovacionesxContrato($contrato->contratos_codigo);
		
		// Fecha Actual
		$fecha_actual = Carbon::now();
		
		if (is_null($contrato_renovacion)) {
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
					'fecha_inicio' 	=> $contrato_renovacion->fecha_renovacion,
					'fecha_mes' 	=> $contrato_renovacion->fecha_mes,
					'fecha_final' 	=> $contrato_renovacion->fecha_final
			];
			
			$fecha_inicio = Carbon::parse($fechas['fecha_inicio']);
		}
		
		$dias_transcurridos = $this->calcularDias($fecha_actual, $fecha_inicio);
		$total_interes = $this->calcularInteres($dias_transcurridos, $contrato);
		$total_mora = $this->calcularMora($dias_transcurridos, $contrato);
		
		return view ('detalles.renovacion.index', compact('contrato', 'fechas', 'dias_transcurridos', 'total_interes', 'total_mora'));
	}
	
	public function calcularDias($fecha_mayor, $fecha_menor) 
	{
		$dias_transcurridos = $fecha_mayor->diffInDays($fecha_menor);
	
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
		
		if ($dias <= 30) {
			$total_interes = $detalles_contrato->interes;
		}
		
		if ($dias > 30 && $dias <= 35) {
			$interes_diario = $detalles_contrato->interes / 30;
			$total_interes = $interes_diario * $dias;
		}
		
		if ($dias > 35 && $dias <= 65) {
			$interes_diario = ($detalles_contrato->interes * 2)/ 30;
			$total_interes = $interes_diario * $dias;
		}
		
		return $total_interes;
	}
	
	public function calcularMora($dias, $detalles_contrato) 
	{
		$total_mora = 0;
		
		if ($dias > 35 && $dias <= 60) {
			$total_mora = $detalles_contrato->interes * 0.25;
		}
	
		if ($dias > 60 && $dias <= 65) {
			$total_mora = $detalles_contrato->interes * 0.50;
		}
	
		return $total_mora;
	}
	
}
