@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Categoría: {{ $categorias->nombre}}</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::model($categorias,['method'=>'PATCH','route'=>['almacen.categoria.update',$categorias->id]])!!}
            {{Form::token()}}
            <div class="form-group">
            	<label for="nombre">Nombre</label>
            	<input type="text" name="nombre" class="form-control" value="{{$categorias->nombre}}" placeholder="Nombre...">
            </div>
            <div class="form-group">
            	<label for="descripcion">Descripción</label>
            	<input type="text" name="descripcion" class="form-control" value="{{$categorias->descripcion}}" placeholder="Descripción...">
            </div>
            <div class="form-group">
            	<label for="interes">interes</label>
            	<input type="text" name="interes" class="form-control" value="{{$categorias->interes}}" placeholder="18%">
            </div>
            <div class="form-group">
            	<label for="mora">mora</label>
            	<input type="text" name="mora" class="form-control" value="{{$categorias->mora}}" placeholder="25%">
            </div>
            <div class="form-group">
            	<button class="btn btn-primary" type="submit">Guardar</button>
            	<button class="btn btn-danger" type="reset">Cancelar</button>
            </div>

			{!!Form::close()!!}		
            
		</div>
	</div>
@endsection