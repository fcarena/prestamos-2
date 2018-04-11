@extends ('layouts.admin') 
@section ('contenido')

<script src="{{asset('js/jQuery-2.1.4.min.js')}}"></script>
@stack('scripts')

<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<h3>Nuevo Contrato a Vitrina</h3>

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

{!! Form::open(array('url'=>'vitrina/transferir', 'method'=>'POST')) !!} 
{{ Form::token() }}

<div class="panel-body panel panel-primary">
	<div class="row">
		<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
			<div class="form-group">
				<label for="codigo">NUMERO DE CONTRATO</label> 
				<select name="contratos_codigo" class="form-control selectpicker" id="contratos_codigo" data-live-search="false">
					<option selected="selected">{{ $contrato->codigo }}</option>
				</select>
			</div>
		</div>
		<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
			<div class="form-group">
				<label for="nombre">NOMBRES</label> <input type="text"
					name="nombre" id="nombre" class="form-control" value="{{ $contrato->nombre }}, {{ $contrato->apellido }}" readonly="readonly">
			</div>
		</div>
		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
			<div class="form-group">
				<label for="tienda">TIENDA</label> <input type="text" name="tienda" id="tienda" class="form-control" value="{{ $contrato->tiendas_nombre }}" readonly="readonly">
			</div>
		</div>
		<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
			<div class="form-group">
				<label for="estatus">ESTATUS</label> 
				<input type="text" name="estatus" id="estatus" class="form-control" value="{{ $contrato->estatus }}" readonly="readonly">
			</div>
		</div>
	</div>
			
	<div class="row">
		<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
			<div class="form-group">
				<label for="descripcion">DESCRIPCION DEL ARTICULO</label> 
				<input type="descripcion" name="descripcion" id="descripcion" class="form-control" value="{{ $contrato->descripcion }}" readonly="readonly">
			</div>
		</div>
		<div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
			<div class="form-group">
				<label for="obsv">OBSERVACION DEL ARTICULO</label> 
				<input type="obsv" name="obsv" id="obsv" class="form-control" value="{{ $contrato->obsv }}" readonly="readonly">
			</div>
		</div>
		<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
			<div class="form-group">
				<label for="cover">COVER</label> 
				<input type="cover" name="cover" id="cover" class="form-control" value="{{ $contrato->cover }}" readonly="readonly">
			</div>
		</div>
	</div>
	
	<div class="row">
		<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
			<div class="form-group">
				<label for="fecha_renovacion">Fecha Contrato</label> 
				<div id="" class="input-group date" data-date="" data-date-format="yyyy-mm-dd">
					<input type="text" name="fecha_renovacion" class="form-control" value="{{ $fechas['fecha_inicio'] }}" readonly="readonly" />
					<span class="input-group-addon add-on">
						<span class="fa fa-calendar"></span>
                	</span>
				</div>
			</div>
		</div>
		<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
			<div class="form-group">
				<label for="fecha_mes">Fechas de Pago</label> 
				<div id="" class="input-group date" data-date="" data-date-format="yyyy-mm-dd">
					<input type="text" name="fecha_mes" class="form-control" value="{{ $fechas['fecha_mes'] }}" readonly="readonly"/>
					<span class="input-group-addon add-on">
						<span class="fa fa-calendar"></span>
                	</span>
				</div>
			</div>
		</div>
		<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
			<div class="form-group">
				<label for="fecha_final">Fecha de Mora</label> 
				<div id="" class="input-group date" data-date="" data-date-format="yyyy-mm-dd">
					<input type="text" name="fecha_final" class="form-control" value="{{ $fechas['fecha_final'] }}" readonly="readonly"/>
					<span class="input-group-addon add-on">
						<span class="fa fa-calendar"></span>
                	</span>
				</div>
			</div>
		</div>
		
		<div class="col-lg-1 col-md-1 col-sm-1 col-xs-12">
			<div class="form-group">
				<label for="dias">DIAS</label> 
				<input type="text" name="dias" id="dias" class="form-control" value="{{ $dias_transcurridos }}" readonly="readonly">
			</div>
		</div>
		<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
			<div class="form-group">
				<label for="interes">TAZACION</label> 
				<input type="text" name="tazacion" id="tazacion" class="form-control" value="{{ $contrato->tazacion }}" readonly="readonly">
			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<h3>Transferir</h3>
	</div>
</div>
	
<div class="panel-body panel panel-primary">
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="form-group">
				<div class="input-group">
				<div class="input-group-addon">TOTAL VALOR</div>
					<input type="text" name="total_valor" id="total_valor" class="form-control" value="{{ $contrato->tazacion }}">
					<input type="hidden" name="fecha_inicial_vitrina" id="fecha_inicial_vitrina" class="form-control" value="{{ date("Y-m-d") }}">
					<input type="hidden" name="contratos_id" id="contratos_id" class="form-control" value="{{ $contrato->id }}">
					<span class="input-group-btn">
						<button type="submit" name="btn_renovar" class="btn btn-primary" value="1">
							Registrar
						</button>
					</span>
				</div>
			</div>
		</div>
	</div>
</div>

{!!Form::close()!!} 

@endsection




