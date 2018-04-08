@extends ('layouts.admin')
@section ('contenido')

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<center><h1>LISTADO DE VITRINA </h1></center>
	</div>
	
	@include('vitrina.nuevo.search')
	
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
					<th>DESCRIPCION</th>
					<th>TAZACION</th>
					<th>ESTATUS</th>
					<th>OPCIONES</th>
				</thead>
             
				<tr>
					
                     

					</td>
				</tr>
			
			</table>
		</div>
		
	</div>
</div>

@endsection