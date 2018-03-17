@extends ('layouts.admin')
@section ('contenido')
<div  class="box box-info">
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>LISTADO DE PRENDAS DE ORO</h3>
		@include('contrato.oro.search')
		<a href="oro/create"><button class="btn btn-success">Nuevo</button></a>
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
					<th>PESO NETO</th>
					<th>TAZACION</th>
					<th>INTERES</th>
					<th>TOTAL</th>
					<th>ESTATUS</th>
					<th>OPCIONES</th>
				</thead>
               @foreach ($oro as $cat)
				<tr>
					<td>{{ $cat->id}}</td>
					<td>{{ $cat->codigo}}</td>
					<td>{{ $cat->dni}}</td>
					<td>{{ $cat->nombre}}</td>
					<td>{{ $cat->descripcion}}</td>
					<td>{{ $cat->peso_neto}}</td>
					<td>{{ $cat->tazacion}}</td>
					<td>{{ $cat->interes}}</td>
					<td>{{ $cat->total}}</td>
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
		{{$oro->render()}}
	</div>
</div>

@endsection