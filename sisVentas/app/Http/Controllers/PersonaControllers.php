<?php

namespace sisVentas\Http\Controllers;

use Illuminate\Http\Request;

use sisVentas\Http\Requests;
use sisVentas\persona;
use Illuminate\Support\Facades\Redirect;
use sisVentas\Http\Requests\PersonaFromRequest;
use DB;



class PersonaControllers extends Controller
{
    public function __construct()
    {

    }
    public function index(Request $request)
    {
        if ($request)
        {
            $query=trim($request->get('searchText'));
            $persona=DB::table('persona as per')
            ->where('per.nombre','LIKE','%'.$query.'%')->orwhere('per.dni','LIKE','%'.$query.'%')
            ->paginate(5);
            return view('almacen.persona.index',["persona"=>$persona,"searchText"=>$query]);
        }
        }
         public function indexx(Request $request)
    {
        if ($request)
        {
            $query=trim($request->get('searchText'));
            $persona=DB::table('persona as per')
            ->where('per.nombre','LIKE','%'.$query.'%')->orwhere('per.dni','LIKE','%'.$query.'%')
            ->paginate(5);
            return view('consultas.personas.index',["persona"=>$persona,"searchText"=>$query]);
        }
        }
    public function create()
    {
        return view("almacen.persona.create");
    }
    public function store (PersonaFromRequest $request)
    {
        $persona=new persona;
        $persona->tipo_dni=$request->get('tipo_dni');
        $persona->dni=$request->get('dni');
        $persona->nombre=$request->get('nombre');
        $persona->apellido=$request->get('apellido');
        $persona->telefono1=$request->get('telefono1');
        $persona->telefono2=$request->get('telefono2');
        $persona->distrito=$request->get('distrito');
        $persona->direccion=$request->get('direccion');
        $persona->correo=$request->get('correo');
        $persona->cactado=$request->get('cactado');
        $persona->categoria=$request->get('categoria');
        $persona->fecha=$request->get('fecha');
        $persona->save();
        return Redirect::to('almacen/persona');

    }
    public function show($id)
    {
        return view("almacen.persona.show",["persona"=>persona::findOrFail($id)]);
    }
    public function edit($id)
    {
        return view("almacen.persona.edit",["persona"=>persona::findOrFail($id)]);
    }
    public function update(PersonaFromRequest $request,$id)
    {
        $persona=persona::findOrFail($id);
        $persona->tipo_dni=$request->get('tipo_dni');
        $persona->dni=$request->get('dni');
        $persona->nombre=$request->get('nombre');
        $persona->apellido=$request->get('apellido');
        $persona->telefono1=$request->get('telefono1');
        $persona->telefono2=$request->get('telefono2');
        $persona->distrito=$request->get('distrito');
        $persona->direccion=$request->get('direccion');
        $persona->correo=$request->get('correo');
        $persona->cactado=$request->get('cactado');
        $persona->categoria=$request->get('categoria');
        $persona->fecha=$request->get('fecha');
        $persona->update();
        return Redirect::to('almacen/persona');
    }
    public function destroy($id)
    {
      $persona= DB::table('persona')->where('id', '=', $id)->delete();
        return Redirect::to('almacen/persona');
    }
 //
}
