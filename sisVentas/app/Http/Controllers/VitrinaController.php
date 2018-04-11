<?php

namespace sisVentas\Http\Controllers;

use Illuminate\Http\Request;
use sisVentas\Http\Requests;

use DB;
use Carbon\Carbon;
use sisVentas\Contratos;
use sisVentas\ContratosDetalles;
use sisVentas\ContratosRenovaciones;
use sisVentas\ContratosVitrinas;


class VitrinaController extends Controller
{
	protected $contratos;
	protected $contratos_detalles;
	protected $contratos_renovaciones;
	
	public function __construct()
	{
		// Verificar Autenticacion del Usuario
		//$this->middleware('auth');
		
		// Modelo Contratos
		$this->contratos = new Contratos();

		// Modelo ContratosDetalles
		$this->contratos_detalles = new ContratosDetalles();

		// Modelo ContratosRenovaciones
		$this->contratos_renovaciones = new ContratosRenovaciones();
	}
	
    public function index(Request $request)
    {
		$texto = trim($request->get('searchText'));
		$contrato = $this->contratos->getContratosxPalabrasClaves($texto);
		
		return view('vitrina.nuevo.index', compact('texto', 'contrato'));
    }

    public function edit($codigo)
    {

    	// Consultar Contrato
		$contrato = $this->contratos_detalles->getContatoyDetallesContrato($codigo)->last();

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
		//$total_interes = $this->calcularInteres($dias_transcurridos, $contrato);
		//$total_mora = $this->calcularMora($dias_transcurridos, $contrato);

		return view('vitrina.nuevo.create', compact('contrato', 'contrato_renovacion', 'fechas', 'dias_transcurridos', 'total_interes', 'total_mora'));
    }

    public function store(Request $request)
    {

    	$contratos_vitrinas = new ContratosVitrinas();
		$contratos_vitrinas->create($request->all());

		// Actualizar Estatus del Contrato
		$this->contratos->where('id', $request->contratos_id)->update(['estatus' => 'Vitrina']);

		return redirect('vitrina');
    }

    public function calcularDias($fecha_mayor, $fecha_menor) 
	{
		if ($fecha_mayor > $fecha_menor) {
			$dias_transcurridos = $fecha_mayor->diffInDays($fecha_menor);
		}else $dias_transcurridos = 0;
		
		return $dias_transcurridos;
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
