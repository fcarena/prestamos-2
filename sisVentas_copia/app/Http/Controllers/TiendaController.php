<?php

namespace sisVentas\Http\Controllers;

use Illuminate\Http\Request;

use sisVentas\Http\Requests;
use sisVentas\tiendas;
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
            $tienda=DB::table('tiendas')
            ->where('nombre','LIKE','%'.$query.'%')
            ->paginate(10);
            return view('almacen.tienda.index',["tienda"=>$tienda,"searchText"=>$query]);
        }
    }
    
    public function create()
    {
        return view("almacen.tienda.create");
    }
    public function store (Request $request)
    {
         $tiendas= new tiendas();
        $tiendas->create($request->all());
        return Redirect::to('almacen/tienda');


    }
    public function show($id)
    {
        return view("almacen.tienda.show",["tienda"=>tienda::findOrFail($id)]);
    }
    public function edit($id)
    {
        return view("almacen.tienda.edit",["tienda"=>tiendas::findOrFail($id)]);
    }
    public function update(Request $request,$id)
    {
        $tienda=tiendas::findOrFail($id);
        $tienda->fill($request->all());
        $tienda->update();
        return Redirect::to('almacen/tienda');
    }
    public function destroy($id)
    {
        $tienda = DB::table('tiendas')->where('id', '=', $id)->delete();
        return Redirect::to('almacen/tienda');
    }





}
