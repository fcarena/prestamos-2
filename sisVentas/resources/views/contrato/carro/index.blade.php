@extends ('layouts.admin')
@section ('contenido')
<div  class="box box-info">
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>LISTADO DE CONTRATO DE ELECTRO Y HERRAMIENTAS</h3>
		@include('contrato.nuevo.search')
		<a href="nuevo/create"><button class="btn btn-success">Nuevo</button></a>
	</div>
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
					<th>DESCRIPCION</th>
					<th>TAZACION</th>
					<th>ESTATUS</th>
					<th>OPCIONES</th>
				</thead>
               @foreach ($contrato as $cat)
				<tr>
					<td>{{ $cat->id}}</td>
					<td>{{ $cat->codigo}}</td>
					<td>{{ $cat->dni}}</td>
					<td>{{ $cat->nombre}}</td>
					<td>{{ $cat->descripcion}}</td>
					<td>{{ $cat->tazacion}}</td>
					<td>{{ $cat->estatus}}</td>
					<td>
                     <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                     	<a  ><button class="btn btn-info">Ver</button></a>
					</div>
					<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                     	<a href="/detalles/renovacion" ><button class="btn btn-warning">Renovar</button></a>
					</div>
					<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                     	<a  href="/detalles/nuevo"><button class="btn btn-danger">Cancelar</button></a>
					</div>

					</td>
				</tr>
				@endforeach
			</table>
		</div>
		{{$contrato->render()}}
	</div>
</div>

@endsection