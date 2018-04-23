@extends ('layouts.admin')
@section ('contenido')

<div class="row">
	<div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
		<h3>LISTADO DE PERSONAS </h3>
	</div>
		@include('almacen.persona.search')
		<div class="col-lg-2 col-md-2 col-sm-2 pull-right">
		<a href="persona/create"><button class="btn btn-success"><i class="fa fa-home"></i>Nuevo</button></a>
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th> DNI</th>
					<th>NOMBRES</th>
					<th>TELEFONOS</th>
					<th>DIRECCION</th>
					<th>CORREO</th>
					<th>CATEGORIA</th>
					<th>Opciones</th>
				</thead>
               @foreach ($persona as $cat)
				<tr>
					<td>{{ $cat->tipo_dni.':'.$cat->dni}}</td>
					<td>{{ $cat->nombre}}</td>
					<td>{{ $cat->telefono1}}</td>
					<td>{{ $cat->direccion}}</td>
					<td>{{ $cat->correo}}</td>
					<td>{{ $cat->categoria}}</td>
					
					<td>
						<a href="{{ route("almacen.persona", $cat->id) }}"><button class="btn btn-info">Editar</button></a>
						
                         <a href="" data-target="#modal-delete-{{$cat->id}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</div>
					</td>
				</tr>
			
				@include('almacen.persona.modal')
				@endforeach
			</table>
		</div>
		{{$persona->render()}}
	</div>
</div>

@endsection