@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Tiendas </h3>
	</div>
		@include('almacen.tienda.search')
		<div class="col-lg-2 col-md-2 col-sm-2 pull-right">
		<a href="tienda/create"><button class="btn btn-success"><i class="fa fa-home"></i>Nuevo</button></a>
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Codigo</th>
					<th>Nombre</th>
					<th>Letra Electrodomesticos</th>
					<th>Letra Oro</th>
					<th>Opciones</th>
				</thead>
               @foreach ($tienda as $cat)
				<tr>
					<td>{{ $cat->id}}</td>
					<td>{{ $cat->nombre}}</td>
					<td>{{ $cat->letrae}}</td>
					<td>{{ $cat->letrao}}</td>
					<td>
						<a href="{{URL::action('TiendaController@edit',$cat->id)}}"><button class="btn btn-info">Editar</button></a>
                         <a href="" data-target="#modal-delete-{{$cat->id}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</td>
				</tr>
				@include('almacen.tienda.modal')
				@endforeach
			</table>
		</div>
		{{$tienda->render()}}
	</div>
</div>

@endsection