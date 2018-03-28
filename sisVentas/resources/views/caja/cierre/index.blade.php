@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>CAJA GENERAL</h3>
		</div>
</div>

<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Codigo</th>
					<th>Amanece</th>
					<th>Ingresos</th>
					<th>Total</th>
				</thead>
               @foreach ($cierre as $cat)
				<tr>
					<td>{{ $cat->id}}</td>
					<td>{{ $cat->create_at}}</td>
					<td>{{ $cat->amanece}}</td>
					<td>{{ $cat->ingresos}}</td>
					<td>{{ $cat->egresos}}</td>
					<td>{{ $cat->cierre}}</td>
					<td>
						<a><button class="btn btn-info">Ver</button></a>
						<a href="{{URL::action('CierreCajaController@edit',$cat->id)}}"><button class="btn btn-info">Editar</button></a>
                      	<a><button class="btn btn-info">Ver</button></a>
                      
					</td>
				</tr>
				@include('caja.cierre.modal')
				@endforeach
			</table>
		</div>
		{{$cierre->render()}}
	</div>
</div>


@endsection