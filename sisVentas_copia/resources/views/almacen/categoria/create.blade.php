@extends ('layouts.admin')
@section ('contenido')
	<div class="row">

		<center>	
                  <h1>Nueva Categoría</h1></center>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

	{!!Form::open(array('url'=>'almacen/categoria','method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
            	<label for="nombre">Nombre</label>
            	<input type="text" name="nombre" class="form-control" placeholder="Nombre...">
            </div>
      </div>
      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
            	<label for="descripcion">Descripción</label>
            	<input type="text" name="descripcion" class="form-control" placeholder="Descripción...">
            </div>
      </div>
      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <div class="form-group">
            	<label for="interes">interes</label>
            	<input type="text" name="interes" class="form-control" placeholder="Interes...">
            </div>
      </div>
      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <div class="form-group">
            	<label for="mora">mora</label>
            	<input type="text" name="mora" class="form-control" placeholder="Mora.....">
            </div>
      </div>
      <center>
            <div class="form-group">
            	<button class="btn btn-primary" type="submit">Guardar</button>
            	<button class="btn btn-danger" type="reset" >Limpiar</button>
                  </center>
                          
            </div>


			{!!Form::close()!!}		
            
		
	</div>
@endsection