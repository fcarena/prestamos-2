@extends ('layouts.admin')
@section ('contenido')

<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>CONTRATOS DE ELECTRO Y HERRAMIENTAS </h3>
	</div>
	
	@include('contrato.nuevo.search')
	
	<div class="col-lg-2 col-md-2 col-sm-2 pull-right">
		<a href="contrato/nuevo"><button class="btn btn-success"><i class="fa fa-home"></i>Nuevo</button></a>
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>CODIGO</th>
					<th>DNI</th>
					<th>NOMBRES Y APELLIDOS</th>
					<th>DESCRIPCION</th>
					<th>FECHA I.</th>
					<th>FECHA F.</th>
					<th>ESTATUS</th>
					<th class="text-center">OPCIONES</th>
				</thead>
               @foreach ($contrato as $cat)
				<tr>
					<td>{{ $cat->codigo }}</td>
					<td>{{ $cat->dni }}</td>
					<td>{{ $cat->nombre }}, {{ $cat->apellido }}</td>
					<td>{{ $cat->categorias_descripcion }}</td>
					<td>{{ $cat->fecha_inicio }}</td>
					<td>{{ $cat->fecha_mes }}</td>
					<td>{{ $cat->estatus }}</td>
					<td class="col-xs-3">
						<a href="{{ route("contrato/abonar/", $cat->codigo) }}">
                     		<button class="btn btn-info">Abonar Cap.</button>
                     	</a>
                     	<a href="{{ route("contrato/renovacion/", $cat->codigo) }}" >
                     		<button class="btn btn-warning">Renovar/Canc.</button>
                     	</a>
					</td>
				</tr>
				@endforeach
			</table>
		</div>
		{{ $contrato->render() }}
	</div>
</div>

@endsection