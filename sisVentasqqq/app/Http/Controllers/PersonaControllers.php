<?php

namespace sisVentas\Http\Controllers;

use Illuminate\Http\Request;

use sisVentas\Http\Requests;
use sisVentas\Personas;
use Illuminate\Support\Facades\Redirect;
use sisVentas\Http\Requests\PersonaFromRequest;
use DB;
use Illuminate\Database\Eloquent\Model;

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
            $persona=DB::table('personas as per')
            ->where('per.nombre','LIKE','%'.$query.'%')->orwhere('per.dni','LIKE','%'.$query.'%')
            ->paginate(5);
            return view('almacen.persona.index',["persona"=>$persona,"searchText"=>$query]);
        }
	}
        
    public function create()
    {
        return view("almacen.persona.create");
    }
    
    public function store (Request $request)
    {
    	
        $persona = new Personas();
        $persona->create($request->all());
        
        return redirect('almacen/persona');

    }
    
    public function show($id)
    {
        return view("almacen.persona.show",["persona"=>Personas::findOrFail($id)]);
    }
    
    public function edit($id)
    {
    	$persona = Personas::findOrFail($id);
    	
        return view("almacen.persona.edit", compact('persona'));
    }
    
    public function update(Request $request, $id)
    {
        $persona = Personas::findOrFail($id);
        $persona->fill($request->all());
        $persona->update();
        
        return redirect('almacen/persona');
    }
    
    public function destroy($id)
    {
      $persona= DB::table('personas')->where('id', '=', $id)->delete();
        return Redirect::to('almacen/persona');
    }
 //
}
