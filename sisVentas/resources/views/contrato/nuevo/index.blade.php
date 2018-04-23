@extends ('layouts.admin')
@section ('contenido')

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<CENTER><h1 style="color:#FF8000">CONTRATOS DE ELECTRO Y HERRAMIENTAS </h1></CENTER>
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
					<td>{{ $cat->estatus }}</td>
					<td>
                     	<a href="{{ route("detalles_contrato/vista_oro/",$cat->id) }}" >
                     		<button class="btn btn-info">Ver</button>
                     	</a>
						<a href="{{ route("contrato/renovacion/",$cat->codigo) }}" >
							<button class="btn btn-warning" @if ($cat->estatus != 'Activo') disabled="disabled" @endif>Renovar</button>
						</a>
                     	<a href="{{ route("contrato/abonar/",$cat->codigo) }}">
                     		<button class="btn btn-danger" @if ($cat->estatus != 'Activo') disabled="disabled" @endif>Abonar</button>
                     	</a>
                     	<a href="{{ route("cancelar/elec/",$cat->codigo) }}" >
                     		<button class="btn btn-info" @if ($cat->estatus != 'Activo') disabled="disabled" @endif>Cancelar</button>
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