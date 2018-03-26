<?php

namespace sisVentas\Http\Controllers;

use Illuminate\Http\Request;

use sisVentas\Http\Requests;
use sisVentas\ContratosDetalles;
use Illuminate\Support\Facades\Redirect;
use sisVentas\Http\Requests\ContratoFormRequest;
use DB;
use Carbon\Carbon;
use sisVentas\Contratos;
use sisVentas\Personas;
use sisVentas\Categorias;
use sisVentas\Tiendas;
use Illuminate\Database\Eloquent\Model;

class ContratoController extends Controller
{
	protected $contratos;
	
	public function __construct()
	{
		// Verificar Autenticacion del Usuario
		//$this->middleware('auth');
		
		// Modelo Contratos
		$this->contratos = new Contratos();
	}
    
    public function index(Request $request)
    {
    	
		$texto = trim($request->get('searchText'));
		
		$contrato = $this->contratos->getContratosxPalabrasClaves($texto);
		
		return view('contrato.nuevo.index', compact('texto', 'contrato'));
    }
    
    public function create()
    {
        $now = Carbon::now('America/Lima');
        
        $personas = Personas::all();
        
        $categorias = Categorias::all();
        
        $tiendas = Tiendas::all();
       
        return view("contrato.nuevo.create", compact('now', 'personas', 'categorias', 'tiendas'));

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
	    });

		return redirect('contrato');
	}
	
	public function show($id) {
		$detalle = DB::table ( 'contrato as co' )->join ( 'persona as per', 'per.dni', '=', 'co.dni' )->join ( 'categoria as cat', 'cat.nombre', '=', 'co.categoria' )->join ( 'detalle_contrato as dc', 'dc.codigo', '=', 'co.codigo' )->select ( 'co.codigo', 'co.nombre', 'dc.descripcion', 'dc.tazacion', 'co.estatus', 'co.id' )->where ( 'co.codigo', '=', $id )->first ();
		
		$detalled = DB::table ( 'detalle_contrato as dc' )->join ( 'contrato as co', 'dc.codigo','=','co.codigo')
            ->select('co.codigo','co.nombre','dc.descripcion','dc.tazacion','co.estatus','dc.id')
            ->where('dc.codigo','=',$id)->get();

            return view("contrato.nuevo.show",["detalle"=>$detalle,"detalled"=>$detalled]);
    }
  
}
