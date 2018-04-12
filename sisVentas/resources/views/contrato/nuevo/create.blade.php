@extends ('layouts.admin') @section ('contenido')
<script src="{{asset('js/jQuery-2.1.4.min.js')}}"></script>
@stack('scripts')


<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<center><h1>Nuevo Contrato Electro</h1></center>

		@if (count($errors)>0)
		<div class="alert alert-danger">
			<ul>
				@foreach ($errors->all() as $error)
				<li>{{$error}}</li> @endforeach
			</ul>
		</div>
		@endif
	</div>
</div>

{!! Form::open(array('url'=>'contrato/nuevo','method'=>'POST','autocomplete'=>'off','files'=>'true')) !!} 
{{ Form::token() }}

<div class="panel-body panel panel-primary">
	<div class="row">
		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
			<div class="form-group">
				<label for="dni">DNI</label> <select name="dni" class="form-control selectpicker" id="bdni" data-live-search="true">
					@foreach ($personas as $persona)
					<option value="{{ $persona->dni }}_{{ $persona->nombre }}">
					{{ $persona->tipo_dni }}:{{ $persona->dni }}
					</option> 
					@endforeach
				</select>
			</div>
		</div>

		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
			<div class="form-group">
				<label for="nombre">Nombres</label> <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombres...">
			</div>
		</div>

		<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
			<div class="form-group">
				<label for="tiendas_id">Tienda</label> 
				<select name="tiendas_id" class="form-control selectpicker" id="tienda" data-live-search="true"> 
				@foreach ($tiendas as $tienda)
					<option value="{{ $tienda->id }}">{{ $tienda->nombre }}</option>
					@endforeach
				</select>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
			<div class="form-group">
				<label for="fecha_inicio">Fecha de Registro</label> 
				<input type="text" class="form-control" name="fecha_inicio" id="fecha_inicio" required value="{{old('fecha_inicio',$now->format('d - M - Y ' ))}}">
			</div>
		</div>
		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
			<div class="form-group">
				<label for="fecha_mes">Fecha de Pago</label> 
				<input type="text" class="form-control" name="fecha_mes" id="fecha_mes" value="{{old('fecha_mes',$now->addDay(30)->format('  d - M - Y'))}}">
			</div>
		</div>

		<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
			<div class="form-group">
				<label for="fecha_final">Fecha de Mora</label> 
				<input type="text" class="form-control" name="fecha_final" id="fecha_final" value="{{old('fecha_final',$now->addDay(5)->format(' d - M - Y'))}}">
			</div>
		</div>
	</div>
</div>

<div class="panel-body panel panel-primary">
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="categoria">CATEGORIA</label> 
				<select name="categorias_id" class="form-control selectpicker" id="categoria" data-live-search="true"> 
					@foreach ($categorias as $categoria)
					<option value="{{ $categoria->id}}_{{$categoria->interes}}">
					{{ $categoria->nombre }}
					</option> 
					@endforeach
				</select>
			</div>
		</div>
	
		<div class="col-lg-6 col-md-6 col-sm-6 col-6 xs-12">
			<div class="form-group">
				<label for="interes">INTERES</label> 
				<input type="float" name="interes" id="interes" class="form-control" placeholder="Impuesto...">
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
			<label for="codigo">C.CONTRATO</label> 
			<input type="text" name="codigo" id="codigo" class="form-control" placeholder="Codigo...">
		</div>

		<div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
			<div class="form-group">
				<label for="descripcion">DESCRIPCION</label> 
				<input type="text" name="descripcion" id="descripcion" class="form-control" placeholder="Descripcion...">
			</div>
		</div>

		<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
			<label for="marca">MARCA</label> 
			<input type="text" name="marca" id="marca" class="form-control" placeholder="Marca...">
		</div>

		<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
			<div class="form-group">
				<label for="modelo">MODELO</label> <input type="text" name="modelo"
					id="modelo" class="form-control" placeholder="Modelo...">
			</div>
		</div>

		<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
			<div class="form-group">
				<label for="serial">SERIAL</label> 
				<input type="text" name="serial" id="serial" class="form-control" placeholder="Serial...">
			</div>
		</div>
		<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
			<div class="form-group">
				<label for="tazacion">TAZACION</label> 
				<input type="number" name="tazacion" id="tazacion" class="form-control" placeholder="Precio...">
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
			<div class="form-group">
				<label for="obsv">OBSERVACION</label> 
				<input type="text" name="obsv" id="obsv" class="form-control" placeholder="Observacion...">
			</div>
		</div>
		<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
			<div class="form-group">
				<label for="cover">COVER</label> 
				<input type="text" name="cover" id="cover" class="form-control" placeholder="Cover...">
			</div>
		</div>
	</div>

	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="form-group">
			<button type="button" id="bt" name="bt" class="btn btn-primary">Agregar</button>
		</div>

	</div>

	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<table id="detalles"
			class="table table-striped table-bordered table-hover dataTable">
			<thead style="background-color: #A9D0F5">
				<th>Opciones</th>
				<th>Descripcion</th>
				<th>Modelo</th>
				<th>Marca</th>
				<th>Serial</th>
				<th>OBSV</th>
				<th>Cover</th>
				<th>Tazacion</th>
				<th>Interes</th>
				<th>Subtotal</th>
				<th>Total</th>
			</thead>
			<tfoot>
				<th></th>
				<th></th>
				<th></th>
				<th></th>
				<th></th>
				<th></th>
				<th></th>
				<th></th>
				<th></th>
				<th></th>
				<th><h4 id="total"></h4></th>
			</tfoot>
			<tbody>

			</tbody>
		</table>
	</div>

</div>

<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" id="guardar">
	<div class="form-group">
		<input name="_token" value="{{ csrf_token() }}" type="hidden"></input>
		<input name="estatus" value="Activo" type="hidden"></input>
		<button class="btn btn-primary" type="submit">Guardar</button>
		<button class="btn btn-danger" type="reset">Limpiar</button>
	</div>
</div>

@push ('scripts')
<script>
      $(document).ready(function(){
            $('#bt').click(function(){
                  agregar();
            });
      });

var cont=0;
total=0;
int=0;
baja=10;
var cal=parseInt(cal);
subtotal=[];
$("#guardar").hide();
$("#bdni").change(mostarvalores);
$("#categoria").change(mostarinteres);

function mostarinteres()
{
      datosinteres=document.getElementById('categoria').value.split('_');
      $("#interes").val(datosinteres[1]);
}

function mostarvalores()
{
      datospersona=document.getElementById('bdni').value.split('_');
      $("#nombre").val(datospersona[1]);
      
}

function agregar(){

	descripcion=$("#descripcion").val();
	modelo=$("#modelo").val();
	marca=$("#marca").val();
	serial=$("#serial").val();
	obsv=$("#obsv").val();
	cover=$("#cover").val();
	tazacion=$("#tazacion").val();
	interes=$("#interes").val();


	if( descripcion!="" && modelo!="" && marca!="" && obsv!="" && tazacion!="" && cont<=0 && interes!="")
	{
		cal = (tazacion * interes);

		if (cal <= 9) {
			cal = baja;
		}else{
			cal = (tazacion * interes);
		}

		subtotal[cont] = (parseFloat(cal)+parseFloat(tazacion));
		total = (parseFloat(total)+parseFloat(subtotal[cont]));
		interes = (cal);
            
		var fila='<tr class="selected" id="fila'+cont+'"><td> <button type="button" class="btn btn-warning" onclick="eliminar('+cont+');">X</button></td><td><input type="hidden" name="descripcion[]" value="'+descripcion+'">'+descripcion+'</td><td><input type="hidden" name="modelo[]" value="'+modelo+'">'+modelo+'</td><td><input type="hidden" name="marca[]" value="'+marca+'">'+marca+'</td><td><input type="hidden" name="cover[]" value="'+cover+'">'+cover+'</td><td><input type="hidden" name="serial[]" value="'+serial+'">'+serial+'</td><td><input type="hidden" name="obsv[]" value="'+obsv+'">'+obsv+'</td><td><input type="hidden" name="tazacion[]" value="'+tazacion+'">'+tazacion+'</td><td><input type="hidden" name="interes[]" value="'+interes+'">'+interes+'</td><td><input type="hidden" name="subtotal[]" value="'+subtotal+'">'+subtotal[cont]+'</td><td><input type="hidden" name="total[]" value="'+total+'">'+total+'</td></tr>';
			cont++;
			Limpiar();
			$("#total").html("S/. "+ total);
			evaluar();
			$('#detalles').append(fila);
                        
    }else{
		alert("Error al ingresar los detalles del articulo, revise los campos que no esten vasios");
		alert("Solo Un Articulos por Contrato");
	}
}

function Limpiar(){
      $("#descripcion").val("");
      $("#modelo").val("");
      $("#marca").val("");
      $("#serial").val("");
      $("#obsv").val("");
      $("#tazacion").val("");
      $("#cover").val("");
 }   

function evaluar()      
      {
            if(total>0)
             $("#guardar").show();
      }

      {
            $("#guardar").hide();
      }


function eliminar(index)
{
      total=(parseFloat(total)-parseFloat(subtotal[index]));
      $("#total").html("S/. " + total);
      $("#fila" + index).remove();
      cont=cont-1;
      evaluar();
}
</script>

@endpush {!!Form::close()!!} @endsection




