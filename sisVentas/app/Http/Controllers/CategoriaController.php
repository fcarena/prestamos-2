<?php

namespace sisVentas\Http\Controllers;

use Illuminate\Http\Request;

use sisVentas\Http\Requests;
use sisVentas\Categorias;
use Illuminate\Support\Facades\Redirect;
use sisVentas\Http\Requests\CategoriaFormRequest;
use DB;


class CategoriaController extends Controller
{
    public function __construct()
    {

    }
    public function index(Request $request)
    {
        if ($request)
        {
            $query=trim($request->get('searchText'));
            $categorias=DB::table('categorias')->where('nombre','LIKE','%'.$query.'%')
            ->paginate(5);
            return view('almacen.categoria.index',["categorias"=>$categorias,"searchText"=>$query]);
        }
    }
     
    public function create()
    {
        return view("almacen.categoria.create");
    }
    public function store (Request $request)
    {
        $categorias=new Categorias();
        $categorias->create($request->all());
        return Redirect::to('almacen/categoria');

    }
    public function show($id)
    {
        return view("almacen.categoria.show",["categorias"=>categorias::findOrFail($id)]);
    }
    public function edit($id)
    {
        return view("almacen.categoria.edit",["categorias"=>Categorias::findOrFail($id)]);
    }
    public function update(Request $request,$id)
    {
        $categorias=Categorias::findOrFail($id);
        $categorias->fill($request->all());
        $categorias->update();
        return Redirect::to('almacen/categoria');
    }
    public function destroy($id)
    {
        $categoria = DB::table('categorias')->where('id', '=', $id)->delete();
        return Redirect::to('almacen/categoria');
    }





}
