<?php

namespace sisVentas\Http\Controllers;

use Illuminate\Http\Request;

use sisVentas\Http\Requests;
use sisVentas\articulos;
use Illuminate\Support\Facades\Redirect;
use sisVentas\Http\Requests\ArticulosFormRequest;
use DB;


class ArticulosController extends Controller
{
    public function __construct()
    {

    }
    public function index(Request $request)
    {
        if ($request)
        {
            $query=trim($request->get('searchText'));
            $articulo=DB::table('articulo as a')
            ->join('categoria as c','a.idcategoria','=','c.id')
            ->join('tienda as t','a.idtienda','=','t.id')
            ->select('c.id','a.idcategoria','c.nombre as cat','t.nombre as tien','a.codigo','a.nombre','a.marca','a.modelo','a.obsv','a.serial','a.precio','a.precioweb','a.vitrina')
            ->where('a.nombre','LIKE','%'.$query.'%')->orwhere('a.codigo','LIKE','%'.$query.'%')
            ->paginate(5);
            return view('almacen.articulos.index',["articulo"=>$articulo,"searchText"=>$query]);
        }
    }
    public function create()
    {
        $categorias=DB::table('categoria')->get();
        $tienda=DB::table('tienda')->get();
        return view("almacen.articulos.create",["categorias"=>$categorias],["tienda"=>$tienda]);
    }
    public function store (ArticulosFormRequest $request)
    {
        $articulo= new articulos;
        $articulo->idcategoria=$request->get('idcategoria');
        $articulo->idtienda=$request->get('idtienda');
        $articulo->codigo=$request->get('codigo');
        $articulo->nombre=$request->get('nombre');
        $articulo->marca=$request->get('marca');
        $articulo->modelo=$request->get('modelo');
        $articulo->obsv=$request->get('obsv');
        $articulo->serial=$request->get('serial');
        $articulo->precio=$request->get('precio');
        $articulo->precioweb=$request->get('precioweb');
        $articulo->vitrina=$request->get('vitrina');
        $articulo->save();
        return Redirect::to('almacen/articulos');

    }
    public function show($id)
    {
        return view("almacen.articulos.index");
    }
    public function edit($id)
    {
        $articulo=articulos::findOrFail($id);
        $categorias=DB::table('categoria')->get();
        $tienda=DB::table('tienda')->get();
        return view("almacen.articulos.edit",["articulo"=>$articulo,"categoria"=>$categorias, "tienda"=>$tienda]);
    }
    public function update(ArticulosFormRequest $request,$id)
    {
        $articulo=articulos::findOrFail($id);
         $articulo->idcategoria=$request->get('idcategoria');
        $articulo->idtienda=$request->get('idtienda');
        $articulo->codigo=$request->get('codigo');
        $articulo->nombre=$request->get('nombre');
        $articulo->marca=$request->get('marca');
        $articulo->modelo=$request->get('modelo');
        $articulo->obsv=$request->get('obsv');
        $articulo->serial=$request->get('serial');
        $articulo->precio=$request->get('precio');
        $articulo->precioweb=$request->get('precioweb');
        $articulo->vitrina=$request->get('vitrina');
        $articulo->update();
        return Redirect::to('almacen/articulos');
    }
    public function destroy($id)
    {
        $categoria = DB::table('articulo')->where('id', '=', $id)->delete();
        return Redirect::to('almacen/articulos');
    }





}
