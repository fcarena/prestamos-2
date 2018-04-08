<?php

namespace sisVentas\Http\Controllers;

use Illuminate\Http\Request;

use sisVentas\Http\Requests;
use sisVentas\caja_ingresos;
use Illuminate\Support\Facades\Redirect;
use sisVentas\Http\Requests\caja_IngresosFormRequest;
use DB;

class CajaIngresosController extends Controller
{
   public function __construct()
    {

    }
    public function index(Request $request)
    {
        if ($request)
        {
            $query=trim($request->get('searchText'));
            $ingresos=DB::table('caja_ingresos')
            ->where('contratos_codigo','LIKE','%'.$query.'%')
            ->orderBy('id','desc')
            ->paginate(10);
            return view('caja.ingresos.index',["ingresos"=>$ingresos,"searchText"=>$query]);
        }
    }
    
    public function create()
    {
        return view("caja.ingresos.create");
    }
    public function store (Caja_IngresosFormRequest $request)
    {
        $ingresos=new caja_ingresos;
        $ingresos->contrato_codigo=$request->get('contrato_codigo');
        $ingresos->tipo_movimiento=$request->get('tipo_movimiento');
        $ingresos->tienda=$request->get('tienda');
        $ingresos->monto=$request->get('monto');
        $ingresos->save();
        return Redirect::to('caja/ingresos');

    }
    public function show($id)
    {
        return view("caja.ingresos.show",["ingresos"=>ingresos::findOrFail($id)]);
    }
    public function edit($id)
    {
        return view("caja.ingresos.edit",["caja_ingresos"=>caja_ingresos::findOrFail($id)]);
    }
    public function update(caja_IngresosFormRequest $request,$id)
    {
        $caja_ingresos=caja_ingresos::findOrFail($id);
        $caja_ingresos->contrato_codigo=$request->get('contrato_codigo');
        $caja_ingresos->tipo_movimiento=$request->get('tipo_movimiento');
        $caja_ingresos->tienda=$request->get('tienda');
        $caja_ingresos->monto=$request->get('monto');
        $caja_ingresos->update();
        return Redirect::to('caja/ingresos');
    }
    public function destroy($id)
    {
        $caja_ingresos = DB::table('caja_ingresos')->where('id', '=', $id)->delete();
        return Redirect::to('caja/ingresos');
    }

}
