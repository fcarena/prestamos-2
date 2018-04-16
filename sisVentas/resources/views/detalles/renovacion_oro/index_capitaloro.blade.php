@extends ('layouts.admin') 
@section ('contenido')
	<script src="{{asset('js/jQuery-2.1.4.min.js')}}"></script>
	@stack('scripts')
	
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<center>
			<h1>Abono Capital Oro y Joyas</h1></center>

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
						<option selected="selected">{{ $oro->codigo }}</option>
					</select>
				</div>
			</div>
			<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
				<div class="form-group">
					<label for="nombre">NOMBRES</label> <input type="text"
						name="nombre" id="nombre" class="form-control" value="{{ $oro->nombre }}, {{ $oro->apellido }}" readonly="readonly">
				</div>
			</div>
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
				<div class="form-group">
					<label for="tienda">TIENDA</label> <input type="text" name="tienda" id="tienda" class="form-control" value="{{ $oro->tiendas_nombre }}" readonly="readonly">
				</div>
			</div>
			<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
				<div class="form-group">
					<label for="estatus">ESTATUS</label> 
					<input type="text" name="estatus" id="estatus" class="form-control" value="{{ $oro->estatus }}" readonly="readonly">
				</div>
			</div>
			</div>
			
			<div class="row">
			<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
				<div class="form-group">
					<label for="descripcion">DESCRIPCION DEL ARTICULO</label> 
					<input type="descripcion" name="total" id="descripcion" class="form-control" value="{{ $oro->descripcion }}" readonly="readonly">
				</div>
			</div>
			<div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
				<div class="form-group">
					<label for="obsv">OBSERVACION DEL ARTICULO</label> 
					<input type="obsv" name="total" id="obsv" class="form-control" value="{{ $oro->obsv }}" readonly="readonly">
				</div>
			</div>
			<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
				<div class="form-group">
					<label for="cover">COVER</label> 
					<input type="cover" name="total" id="cover" class="form-control" value="{{ $oro->cover }}" readonly="readonly">
				</div>
			</div>
		</div>
		
		{!! Form::open(array('url'=>'contrato/abonaroro','method'=>'POST')) !!} 
		{{ Form::token() }}
	
		<div class="row">
			<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
				<div class="form-group">
					<label for="fecha_renovacion">Fecha Contrato</label> 
					<div id="" class="input-group date" data-date="" data-date-format="yyyy-M-dd">
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
					<div id="" class="input-group date" data-date="" data-date-format="yyyy-M-dd">
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
					<div id="" class="input-group date" data-date="" data-date-format="yyyy-M-dd">
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
					<input type="text" name="tazacion" id="tazacion" class="form-control" value="{{ $oro->tazacion }}" readonly="readonly">
				</div>
			</div>
		
		</div>
		
	</div>
	
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<h1 style="color:#0404B4">HISTORIAL ABONOS</h1>
		</div>
	</div>
	
	<div class="panel-body panel panel-primary">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<table id="detalles" class="table table-striped table-bordered table-hover dataTable">
					<thead style="background-color: #A9D0F5">
						<th>F. Renovacion</th>
						<th>F. Mes</th>
						<th>F. Mora</th>
						<th>F. Pago</th>
						<th>Dias</th>
						<th>T. Interes</th>
						<th>T. Mora</th>
						<th>T. Pagado</th>
					</thead>
					@foreach ($contratos_abonosoro as $filas)
					<tbody>
						<th>{{ $filas->fecha_renovacion }}</th>
						<th>{{ $filas->fecha_mes }}</th>
						<th>{{ $filas->fecha_final }}</th>
						<th>{{ $filas->created_at->format('Y-m-d') }}</th>
						<th>{{ $filas->dias }}</th>
						<th>{{ $filas->total_interes }}</th>
						<th>{{ $filas->total_mora }}</th>
						<th style="color:#0404B4">{{ $filas->total_pagado }}</th>
					</tbody>
					@endforeach
				</table>
			</div>
	
		</div>
	</div>
	
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<h1 style="color:#FF0000">ABONAR A CAPITAL</h1>
		</div>
	</div>
	
	@if ($oro->estatus != 'Cancelado' && $total_interes == 0)
		
	<div class="panel-body panel panel-primary">
		<input type="hidden" name="total_interes" id="total_interes" class="form-control" value="{{ $total_interes }}">
		<input type="hidden" name="total_mora" id="total_mora" class="form-control" value="{{ $total_mora }}"> 
		<input type="hidden" name="contratos_codigo" id="contratos_codigo" class="form-control" value="{{ $oro->codigo }}">
		<input type="hidden" name="contratos_id" id="contratos_id" class="form-control" value="{{ $oro->id }}">
		<input type="hidden" name="tiendas_id" id="tiendas_id" class="form-control" value="{{ $oro->tiendas_id }}">
		
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="form-group">
				
					<div class="input-group">
					<div class="input-group-addon" style="font-family: Arial; font-size: 20pt;color: #00FF00 width:500px;height:85px">TOTAL A PAGAR</div>
						<input style="font-family: Arial; font-size: 60pt;color: #00FF00 width:500px;height:85px" type="text" name="total_pagado" id="total_pagado" class="form-control" value="{{ $oro->tazacion }}">
						<span class="input-group-btn">
							<input type=image src="/img/portfolio/guardar.jpg" style="height:85px" name="btn_abonar"  value="1">
						</span>
					</div>
				</div>
			</div>
		</div>
		
	</div>
	@endif
	
	</div>
	{!! Form::close() !!}

@push ('scripts')

@endpush {!!Form::close()!!} 
@endsection