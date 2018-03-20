@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar tienda: {{ $tienda->nombre}}</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::model($tienda,['method'=>'PATCH','route'=>['almacen.tienda.update',$tienda->id]])!!}
            {{Form::token()}}
            
            <div class="form-group">
            	<label for="nombre">Nombre</label>
            	<input type="text" name="nombre" class="form-control" value="{{$tienda->nombre}}">
            </div>
             <div class="form-group">
            	<label for="letrae">Letra Electrodomesticos</label>
            	<input type="text" name="letrae" class="form-control" value="{{$tienda->letrae}}">
            </div>
             <div class="form-group">
            	<label for="letrao">Letra Oro</label>
            	<input type="text" name="letrao" class="form-control" value="{{$tienda->letrao}}">
            </div>
            <div class="form-group">
            	<a href="{{URL::action('TiendaController@update',$tienda->idtienda)}}"><button class="btn btn-primary">Editar</button>
            	<button class="btn btn-danger" type="reset">Cancelar</button>
            </div>

			{!!Form::close()!!}		
            
		</div>
	</div>
@endsection