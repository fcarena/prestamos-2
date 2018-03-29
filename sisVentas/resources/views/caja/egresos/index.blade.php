@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<center>
		<h1>Listado de Egresos </h1></center>
	</div>
		@include('caja.egresos.search')
		<div class="col-lg-2 col-md-2 col-sm-2 pull-right">
		<a href="egresos/create"><button class="btn btn-success"><i class="fa fa-home"></i>Nuevo</button></a>
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
					<th>Tienda</th>
					<th>Monto</th>
				</thead>
               @foreach ($egresos as $cat)
				<tr>
					<td>{{ $cat->id}}</td>
					<td>{{ $cat->contrato_codigo}}</td>
					<td>{{ $cat->tipo_movimiento}}</td>
					<td>{{ $cat->nombre}}</td>
					<td>{{ $cat->monto}}</td>
					<td>
						<a href="{{URL::action('CajaEgresosController@edit',$cat->id)}}"><button class="btn btn-info">Editar</button></a>
                         <a href="" data-target="#modal-delete-{{$cat->id}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</td>
				</tr>
				@include('caja.egresos.modal')
				@endforeach
			</table>
		</div>
		{{$egresos->render()}}
	</div>
</div>

@endsection