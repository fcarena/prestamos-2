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
use sisVentas\caja_egresos;
use Illuminate\Database\Eloquent\Model;

class VitrinaController extends Controller
{
    public function index(Request $request)
    {
    	
		$texto = trim($request->get('searchText'));
		
		
		
		return view('vitrina.nuevo.index', compact('texto'));
    }
}
