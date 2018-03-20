<?php

namespace sisVentas\Http\Controllers;

use Illuminate\Http\Request;

use sisVentas\Http\Requests;


use sisVentas\Http\Controllers\Controller;
//use App\user;
//use App\Pais;
use sisVentas\tienda;

class PDFTiendaController extends Controller
{
    public function index()
    {
        return view("reportes.tiendas.index");
    }


      public function crearPDF($tienda,$vistaurl,$tipo)
    {

        $tienda = $tienda;
        $date = date('Y-m-d');
        $view =  \View::make($vistaurl, compact('tienda', 'date'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        
        if($tipo==1){return $pdf->stream('reporte');}
        if($tipo==2){return $pdf->download('reporte.pdf'); }
    }


    public function crear_reporte($tipo){

     $vistaurl="reportes.tiendas.reportetienda";
     $tienda=tienda::all();
     
     return $this->crearPDF($tienda, $vistaurl,$tipo);




    }



}
