<?php

namespace sisVentas\Http\Controllers;

use Illuminate\Http\Request;

use sisVentas\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use DB;

use Carbon\Carbon;
use sisVentas\Contratos;
use sisVentas\ContratosDetalles;
use sisVentas\Personas;
use sisVentas\Categorias;
use sisVentas\Tiendas;
use sisVentas\caja_egresos;

class ContratoController extends Controller
{
	protected $contratos;
	
	public function __construct()
	{
		// Verificar Autenticacion del Usuario
		$this->middleware('auth');
		
		// Modelo Contratos
		$this->contratos = new Contratos();
	}
    
    public function index(Request $request)
    {
    	
		$texto = trim($request->get('searchText'));
		
		// Obtener Contratos
		$contrato = $this->contratos->getContratosElectro($texto);
		
		return view('contrato.nuevo.index', compact('texto', 'contrato'));
    }
    
    public function create()
    {
        $now = Carbon::now('America/Lima');

        // Usuario Autenticado
        $usuario = Auth::User();

        // Obtener codigo de contrato por tienda
        $codigo_contrato = $this->contratos->generarCodigoxTiendas($usuario->tiendas_id);
        
        $personas = Personas::all();
        
        $categorias = Categorias::all();
        
        $tiendas = Tiendas::all();

        return view("contrato.nuevo.create", compact('now', 'codigo_contrato', 'personas', 'categorias', 'tiendas'));

    }

	 public function store(Request $request)
	 {
	 	
	    DB::transaction(function() use ($request)
	    {

	    	$contrato = new Contratos();
	    	$contrato_creado = $contrato->create($request->all());
	    	

	    	$descripcion 	=	$request->get('descripcion');
	    	$marca			=	$request->get('marca');
	    	$modelo			=	$request->get('modelo');
	    	$serial			=	$request->get('serial');
	    	$obsv			=	$request->get('obsv');
	    	$cover			=	$request->get('cover');
	    	$tazacion		=	$request->get('tazacion');
	    	$interes		=	$request->get('interes');
	    	$subtotal		=	$request->get('subtotal');
	    	$total			=	$request->get('total');
			
	    	$cont=0;
	    	while ( $cont <= 0 ){
	    	
	    		$detalle = new ContratosDetalles();
	    		
	    		$detalle->contratos_codigo	=	$contrato_creado->codigo;
	    		$detalle->descripcion		=	$descripcion[$cont];
	    		$detalle->marca				=	$marca[$cont];
	    		$detalle->modelo			=	$modelo[$cont];
	    		$detalle->serial			=	$serial[$cont];
	    		$detalle->obsv				=	$obsv[$cont];
	    		$detalle->cover				=	$cover[$cont];
	    		$detalle->tazacion			=	$tazacion[$cont];
	    		$detalle->interes			=	$interes[$cont];
	    		$detalle->subtotal			=	$subtotal[$cont];
	    		$detalle->total				=	$total[$cont];
	    		$detalle->save ();
	    		
	    		$cont = $cont + 1;
	    	}
	    	
	    	// Registrar Movimientos de Caja
	    	$caja_egresos= new caja_egresos;
	    	$caja_egresos->contrato_codigo=$request->get('codigo');
	    	$caja_egresos->tienda=$request->get('tiendas_id');
	    	$caja_egresos->tipo_movimiento='Egresos Por Electro';
	    	$caja_egresos->monto=$tazacion[0];
	    	$caja_egresos->save();
	    	
	    });

		return redirect('contrato');
	}
	
}
