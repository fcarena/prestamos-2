@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<CENTER>
            <h1>Nuevo Egreso</h1></CENTER>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::open(array('url'=>'caja/egresos','method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <div class="form-group">
            	<label for="contrato_codigo">CODIGO</label>
            	<input type="text" name="contrato_codigo" class="form-control">
            </div>
             <div class="form-group">
            	<label for="tipo_movimiento">DESCRIPCION</label>
            	<input type="text" name="tipo_movimiento" class="form-control">
            </div>
             <div class="form-group">
            	<label for="tienda">TIENDA</label>
            	<input type="text" name="tienda" class="form-control">
            </div>



            
            <div class="form-group">
                <label for="monto">MONTO</label>
                <input type="text" name="monto" class="form-control">
            </div>
            <div class="form-group">
            	<button class="btn btn-primary" type="submit">Guardar</button>
            	<button class="btn btn-danger" type="reset" >Limpiar</button>
                          
            </div>
        </div>

			{!!Form::close()!!}		
            
		</div>
	</div>
@endsection