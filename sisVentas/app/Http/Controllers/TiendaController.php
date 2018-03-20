<?php

namespace sisVentas\Http\Controllers;

use Illuminate\Http\Request;

use sisVentas\Http\Requests;
use sisVentas\tienda;
use Illuminate\Support\Facades\Redirect;
use sisVentas\Http\Requests\TiendaFormRequest;
use DB;

class TiendaController extends Controller
{
    public function __construct()
    {

    }
    public function index(Request $request)
    {
        if ($request)
        {
            $query=trim($request->get('searchText'));
            $tienda=DB::table('tienda')->where('nombre','LIKE','%'.$query.'%')
            ->paginate(10);
            return view('almacen.tienda.index',["tienda"=>$tienda,"searchText"=>$query]);
        }
    }
    
    public function create()
    {
        return view("almacen.tienda.create");
    }
    public function store (TiendaFormRequest $request)
    {
        $tienda=new tienda;
        $tienda->nombre=$request->get('nombre');
        $tienda->letrae=$request->get('letrae');
        $tienda->letrao=$request->get('letrao');
        $tienda->save();
        return Redirect::to('almacen/tienda');

    }
    public function show($id)
    {
        return view("almacen.tienda.show",["tienda"=>tienda::findOrFail($id)]);
    }
    public function edit($id)
    {
        return view("almacen.tienda.edit",["tienda"=>tienda::findOrFail($id)]);
    }
    public function update(TiendaFormRequest $request,$id)
    {
        $tienda=tienda::findOrFail($id);
        $tienda->nombre=$request->get('nombre');
        $tienda->letrae=$request->get('letrae');
        $tienda->letrao=$request->get('letrao');
        $tienda->update();
        return Redirect::to('almacen/tienda');
    }
    public function destroy($id)
    {
        $tienda = DB::table('tienda')->where('id', '=', $id)->delete();
        return Redirect::to('almacen/tienda');
    }





}
