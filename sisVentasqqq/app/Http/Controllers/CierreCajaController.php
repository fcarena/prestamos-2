<?php

namespace sisVentas\Http\Controllers;

use Illuminate\Http\Request;

use sisVentas\Http\Requests;
use sisVentas\caja_ingresos;
use sisVentas\caja_egresos;
use sisVentas\cierrecaja;
use Illuminate\Support\Facades\Redirect;
use sisVentas\Http\Requests\caja_cierreFormRequest;
use DB;

class CierreCajaController extends Controller
{
   public function __construct()
    {

    }
    public function index(Request $request)
    {
        if ($request)
        {
    
            $caja_cierre=DB::table('Cierre_Caja as cc')
            ->join('caja_ingresos as ci','ci.created_at','=','cc.created_at')
            ->join('caja_egresos as ce','ce.id','=','cc.id')
           ->select('ci.tipo_movimiento as cid','ci.contratos_codigo as cic','ce.contrato_codigo as cec','ce.created_at as cef','cc.id','ci.monto as mci','ce.monto as mce','ce.tipo_movimiento as ced','ci.tipo_movimiento')
            ->get();
                        
            return view('caja.cierre.index',["caja_cierre"=>$caja_cierre]);
        }
    }
    
    public function create()
    {
        return view("caja.egresos.create");
    }
    public function store (caja_egresosFormRequest $request)
    {
        $egresos=new caja_egresos;
        $egresos->contrato_codigo=$request->get('contrato_codigo');
        $egresos->tipo_movimiento=$request->get('tipo_movimiento');
        $egresos->tienda=$request->get('tienda');
        $egresos->monto=$request->get('monto');
        $egresos->save();
        return Redirect::to('caja/egresos');

    }
    public function show($id)
    {
        return view("caja.egresos.show",["egresos"=>egresos::findOrFail($id)]);
    }
    public function edit($id)
    {
        return view("caja.egresos.edit",["caja_egresos"=>caja_egresos::findOrFail($id)]);
    }
    public function update(caja_EgresosFormRequest $request,$id)
    {
        $caja_egresos=caja_egresos::findOrFail($id);
        $caja_egresos->contrato_codigo=$request->get('contrato_codigo');
        $caja_egresos->tipo_movimiento=$request->get('tipo_movimiento');
        $caja_egresos->tienda=$request->get('tienda');
        $caja_egresos->monto=$request->get('monto');
        $caja_egresos->update();
        return Redirect::to('caja/egresos');
    }
    public function destroy($id)
    {
        $caja_egresos = DB::table('caja_egresos')->where('id', '=', $id)->delete();
        return Redirect::to('caja/egresos');
    }

}
