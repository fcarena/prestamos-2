@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<center>
		<h1>Listado de Ingresos </h1></center>
		</div>
		@include('caja.ingresos.search')
		
		<div class="col-lg-2 col-md-2 col-sm-2 pull-right">
		<a href="ingresos/create"><button class="btn btn-success"><i class="fa fa-home"></i>Nuevo</button></a>
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>ID</th>
					<th>Codigo</th>
					<th>Descripcion</th>
					<th>Tinda</th>
					<th>Monto</th>
				</thead>
               @foreach ($ingresos as $cat)
				<tr>
					<td>{{ $cat->id}}</td>
					<td>{{ $cat->contratos_codigo}}</td>
					<td>{{ $cat->tipo_movimiento}}</td>
					<td>{{ $cat->tienda}}</td>
					<td>{{ $cat->monto}}</td>
					<td>
						<a href="{{URL::action('CajaIngresosController@edit',$cat->id)}}"><button class="btn btn-info">Editar</button></a>
                         <a href="" data-target="#modal-delete-{{$cat->id}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</td>
				</tr>
				@include('caja.ingresos.modal')
				@endforeach
			</table>
		</div>
		{{$ingresos->render()}}
	</div>
</div>

@endsection