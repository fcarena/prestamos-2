@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Articulos </h3>
		@include('almacen.articulos.search')
		<a href="articulos/create"><button class="btn btn-success">Nuevo</button></a>
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Categoria</th>
					<th>Tienda</th>
					<th>Codigo</th>
					<th>Nombre</th>
					<th>Marca</th>
					<th>Modelo</th>
					<th>Observacion</th>
					<th>Serial</th>
					<th>Precio</th>
					<th>P. Web</th>
					<th>Vitrina</th>
					<th>Opciones</th>
				</thead>
               @foreach ($articulo as $cat)
				<tr>
					<td>{{ $cat->cat}}</td>
					<td>{{ $cat->tien}}</td>
					<td>{{ $cat->codigo}}</td>
					<td>{{ $cat->nombre}}</td>
					<td>{{ $cat->marca}}</td>
					<td>{{ $cat->modelo}}</td>
					<td>{{ $cat->obsv}}</td>
					<td>{{ $cat->serial}}</td>
					<td>{{ $cat->precio}}</td>
					<td>{{ $cat->precioweb}}</td>
					<td>{{ $cat->vitrina}}</td>
					<td>
						<a href="{{URL::action('ArticulosController@edit',$cat->id)}}"><button class="btn btn-info">Editar</button></a>
					

						
                         <a href="" data-target="#modal-delete-{{$cat->id}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
                    
					
				</tr>
				@include('almacen.articulos.modal')
				@endforeach
			</table>
		</div>
		{{$articulo->render()}}
	</div>
</div>

@endsection