@extends ('layouts.admin')
@section ('contenido')

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<CENTER><h1 style="color:#FF8000">CONTRATOS DE ORO </h1></CENTER>
	</div>
	
	@include('contrato.oro.search')
	
	<div class="col-lg-2 col-md-2 col-sm-2 pull-right">
		<a href="oro/create"><button class="btn btn-success">Nuevo</button></a>
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
					<th>PESO NETO</th>
					<th>TAZACION</th>
					<th>INTERES</th>
					<th>ESTATUS</th>
					<th>OPCIONES</th>
				</thead>
               @foreach ($oro as $cat)
				<tr>
					<td>{{ $cat->id}}</td>
					<td>{{ $cat->codigo}}</td>
					<td>{{ $cat->dni}}</td>
					<td>{{ $cat->nombre}}</td>
					<td>{{ $cat->peso_neto}}</td>
					<td>{{ $cat->tazacion}}</td>
					<td>{{ $cat->interes}}</td>
					<td>{{ $cat->estatus}}</td>
					<td>
                    
                     	<a href="{{ route("detalles_contrato/vista_oro/",$cat->id) }}" ><button class="btn btn-info">Ver</button></a>
				
                     <a href="{{ route("detalles_contrato/renovacion_oro/",$cat->codigo) }}" ><button class="btn btn-warning">Renovar</button></a>

                     	<a  href="{{ route("contrato/abonaroro/", $cat->codigo) }}"><button class="btn btn-danger">Abonar</button></a>
                     	
                     	<a href="{{ route("cancelar/oro/",$cat->codigo) }}" ><button class="btn btn-info">Cancelar</button></a>
				

					</td>
				</tr>
				@endforeach
			</table>
		</div>
		{{$oro->render()}}
	</div>
</div>

@endsection