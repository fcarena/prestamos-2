@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nueva Tienda</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::open(array('url'=>'almacen/tienda','method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}
            
              <div class="form-group">
            	<label for="nombre">Nombre</label>
            	<input type="text" name="nombre" class="form-control">
            </div>
             <div class="form-group">
            	<label for="letrae">Letra Electrodomesticos</label>
            	<input type="text" name="letrae" class="form-control">
            </div>
             <div class="form-group">
            	<label for="letrao">Letra Oro</label>
            	<input type="text" name="letrao" class="form-control">
            </div>
            <div class="form-group">
            	<button class="btn btn-primary" type="submit">Guardar</button>
            	<button class="btn btn-danger" type="reset" >Limpiar</button>
                          
            </div>

			{!!Form::close()!!}		
            
		</div>
	</div>
@endsection