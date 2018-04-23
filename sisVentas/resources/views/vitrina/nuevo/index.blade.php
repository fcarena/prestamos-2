@extends ('layouts.admin')
@section ('contenido')

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<center><h1>LISTADO DE VITRINA </h1></center>
	</div>
	
	@include('vitrina.nuevo.search')
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>ID</th>
					<th>CODIGO</th>
					<th>DNI</th>
					<th>NOMBRE</th>
					<th>F.CONTRATO</th>
					<th>DIAS</th>
					<th>ESTATUS</th>
					<th>OPCIONES</th>
				</thead>
				@php $fila = 1; @endphp
				@foreach ($contrato as $cat)
				<tr>
					<td>{{ $fila ++ }}</td>
					<td>{{ $cat->codigo }}</td>
					<td>{{ $cat->dni }}</td>
					<td>{{ $cat->nombre }}, {{ $cat->apellido }}</td>
					<td>{{ $cat->fecha_inicio }}</td>
					<td>{{ $cat->dias }}</td>
					<td>{{ $cat->estatus}}</td>
					<td>
                     	<a href="{{ route("vitrina/transferir", $cat->codigo) }}" >
                     		<button class="btn btn-info">Transferir</button>
                     	</a>
					</td>
				</tr>
				@endforeach
			</table>
		</div>
		<!-- Aqui el render -->
	</div>
</div>

@endsection