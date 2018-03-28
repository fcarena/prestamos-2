@extends ('layouts.admin') 
@section ('contenido')
	<script src="{{asset('js/jQuery-2.1.4.min.js')}}"></script>
	@stack('scripts')
	
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<center>
			<h2>Renovacion del Contrato</h2></center>

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

	<div class="panel-body panel panel-primary">
		<div class="row">
			<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
				<div class="form-group">
					<label for="codigo">NUMERO DE CONTRATO</label> 
					<select name="codigo" class="form-control selectpicker" id="codigo" data-live-search="false">
						<option selected="selected">{{ $contrato->codigo }}</option>
					</select>
				</div>
			</div>
			<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
				<div class="form-group">
					<label for="nombre">NOMBRES</label> <input type="text"
						name="nombre" id="nombre" class="form-control" value="{{ $contrato->nombre }}, {{ $contrato->apellido }}">
				</div>
			</div>
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
				<div class="form-group">
					<label for="tienda">TIENDA</label> <input type="text" name="tienda" id="tienda" class="form-control" value="{{ $contrato->tiendas_nombre }}">
				</div>
			</div>
			<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
				<div class="form-group">
					<label for="estatus">ESTATUS</label> 
					<input type="text" name="estatus" id="estatus" class="form-control" value="{{ $contrato->estatus }}">
				</div>
			</div>
			</div>
			
			<div class="row">
			<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
				<div class="form-group">
					<label for="descripcion">DESCRIPCION DEL ARTICULO</label> 
					<input type="descripcion" name="total" id="descripcion" class="form-control" value="{{ $contrato->descripcion }}">
				</div>
			</div>
			<div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
				<div class="form-group">
					<label for="obsv">OBSERVACION DEL ARTICULO</label> 
					<input type="obsv" name="total" id="obsv" class="form-control" value="{{ $contrato->obsv }}">
				</div>
			</div>
			<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
				<div class="form-group">
					<label for="cover">COVER</label> 
					<input type="cover" name="total" id="cover" class="form-control" value="{{ $contrato->cover }}">
				</div>
			</div>
		</div>
		
		{!! Form::open(array('url'=>'contrato/renovacion','method'=>'POST')) !!} 
		{{ Form::token() }}
	
		<div class="row">
			<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
				<div class="form-group">
					<label for="fecha_inicio">FECHA CONTRATO</label> 
					<input type="text" name="fecha_renovacion" id="fecha_renovacion" class="form-control" value="{{ $fechas['fecha_inicio'] }}">
				</div>
			</div>
			<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
				<div class="form-group">
					<label for="fecha_mes">FECHA DE PAGO</label> 
					<input type="text" name="fecha_mes" id="fecha_mes" class="form-control" value="{{ $fechas['fecha_mes'] }}">
				</div>
			</div>
			<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
				<div class="form-group">
					<label for="fecha_final">FECHA DE MORA</label> 
					<input type="text" name="fecha_final" id="fecha_final" class="form-control" value="{{ $fechas['fecha_final'] }}">
				</div>
			</div>
			<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
				<div class="form-group">
					<label for="dias">DIAS</label> 
					<input type="text" name="dias" id="dias" class="form-control" value="{{ $dias_transcurridos }}">
				</div>
			</div>
			<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
				<div class="form-group">
					<label for="interes">INTERES</label> 
					<input type="text" name="interes" id="interes" class="form-control" value="{{ $contrato->interes }}">
				</div>
			</div>
		
		</div>
		
	</div>
		
	<div class="panel-body panel panel-primary">
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<table id="detalles" class="table table-striped table-bordered table-hover dataTable">
				<thead style="background-color: #A9D0F5">
					<th>Pagar</th>
					<th>Intereses</th>
					<th>Total</th>
				</thead>
				<tbody>
					<th><input type="checkbox" id="check_interes"></th>
					<th>Interes al {{ $fechas["fecha_actual"] }}</th>
					<th>{{ $total_interes }}</th>
				</tbody>
			</table>
		</div>

		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<table id="detalles_M"
				class="table table-striped table-bordered table-hover dataTable">
				<thead style="background-color: #A9D0F5">
					<th>Pagar</th>
					<th>Interes Mora</th>
					<th>Total</th>
				</thead>
				<tbody>
					<th><input type="checkbox" id="check_mora"></th>
					<th>Interes de Mora al {{ $fechas["fecha_actual"] }}</th>
					<th>{{ $total_mora }}</th>
				</tbody>
			</table>
		</div>
	</div>
	
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="form-group">
			
				<div class="input-group">
				<div class="input-group-addon">TOTAL A PAGAR</div>
					<input type="text" name="total_pagado" id="total_pagado" class="form-control" value="{{ 0.00 }}">
					<span class="input-group-btn">
						<button type="submit" class="btn btn-primary">Pagar</button>
					</span>
				</div>
				<input type="hidden" name="total_interes" id="total_interes" class="form-control" value="{{ $total_interes }}">
				<input type="hidden" name="total_mora" id="total_mora" class="form-control" value="{{ $total_mora }}"> 
				<input type="hidden" name="contratos_codigo" id="contratos_codigo" class="form-control" value="{{ $contrato->codigo }}">
				<input type="hidden" name="contratos_id" id="contratos_id" class="form-control" value="{{ $contrato->id }}">
			</div>
		</div>
	</div>
	</div>
	{!! Form::close() !!}

	@push ('scripts')

<script>
$(document).ready(function(){
	$('#bt').click(function(){
		//calcular_interes();
		//agregarm();
	});

	$('#check_interes').click(function(){
		if ($("#dias").val() > 0){
			if ($('#check_interes').is(":checked")){
				var total_interes = $("#total_interes").val();

				$("#total_pagado").val(parseFloat(total_interes));
			}else{
				var total_interes = $("#total_interes").val();
				var total_pagado = $("#total_pagado").val();
				$("#total_pagado").val(total_pagado - total_interes)
			}
		}else{
			alert("Los dias calculados deben tener un valor mayor a uno (1).");
		}
	});

	$('#check_mora').click(function(){
		if ($("#dias").val() > 0){
			if ($('#check_mora').is(":checked")){
				var total_mora = $("#total_mora").val();
				var total_pagado = $("#total_pagado").val();
	
				$("#total_pagado").val(parseFloat(total_pagado) + parseFloat(total_mora));
			}else{
				var total_mora = $("#total_mora").val();
				
				var total_pagado = $("#total_pagado").val();
				$("#total_pagado").val(total_pagado - total_mora)
			}
		}else{
			alert("Los dias calculados deben tener un valor mayor a uno (1).");
		}
	});
	
});

dia=0;
totalf=0;
cont=0;     
$("#codigo").change(mostarvalores);

function mostarvalores()
{
      datos=document.getElementById('codigo').value.split('_');
      $("#dni").val(datos[1]);
      $("#nombre").val(datos[2]);
      $("#tienda").val(datos[3]);
      $("#fecha_inicio").val(datos[4]);
      $("#fecha_mes").val(datos[5]);
      $("#fecha_final").val(datos[6]);
      $("#estatus").val(datos[7]);
      $("#tazacion").val(datos[8]);
      $("#interes").val(datos[9]);
      $("#total").val(datos[10]);
      $("#descripcion").val(datos[11]);
      $("#obsv").val(datos[12]);
      $("#cover").val(datos[13]);
      $("#mora").val(datos[14]);
      
      
}

function agregarm(){

  cont=0;

 descripcion=$("#descripcion").val();
 tazacion=$("#tazacion").val();
 interes=$("#interes").val();
 fecha_inicio=$("#fecha_inicio").val();
 fecha_dia=$("#fecha_dia").val();
 dias=$("#dias").val();


      if( descripcion!="" && tazacion!="" && interes!="" && fecha_inicio!="" && dias!="" && cont<"1")
      {
                  mora=0.0;
                  

            if (dias>=30 && dias<36) {

                        xdia=(interes/30);
                        interes=xdia*dias;
                         totalf=(parseFloat(interes)+parseFloat(tazacion));
                  
            }
            if (dias>=36 && dias<=66) {
                        interes=(interes*2);
                        xdia=(interes/30);
                        mora=(interes*0.25);
                        cxdia=(xdia*dias);
                         totalf=(parseFloat(interes)+parseFloat(mora)+parseFloat(cxdia)+parseFloat(tazacion));
                               
            }
           
             if (dias>=66) {
                        alert("Articulo en Vitrina");
                               
            }
          
                 
         
            var fila='<tr class="selected" id="fila'+cont+'"><td> <button type="submit" class="btn btn-danger">Pagar</button></td><td><input type="hidden" name="descripcion[]" value="'+descripcion+'">'+descripcion+'</td><td><input type="hidden" name="mora[]" value="'+mora+'">'+mora+'</td></tr>';
                  cont++;
                  evaluar();
                  $('#detalles_M').append(fila);
                  


                  
                                      
                        
    }
      else
      {
            

      }
      
}
  
function eliminar(index)
{
      
      $("#fila" + index).remove();
      
      evaluar();
}

function evaluar()      
      {
            if(totalf>0)
             $("#guardar").show();
      }

      {
            $("#guardar").hide();
      }

      </script>

		@endpush {!!Form::close()!!} @endsection