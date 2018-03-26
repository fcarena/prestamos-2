@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3> Editar Cliente: {{ $persona->nombre}}</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif
       </div>
            </div>
			{!! Form::model($persona, ['method'=>'POST', 'route'=>['almacen.persona', $persona->id]]) !!}
                   {{Form::token()}}
                   <div class="row">
                         <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
              <label for="tipo_dni">Tipo de DNI</label>
              <select name="tipo_dni" class="form-control" >
                <option value="DNI">DNI</option>
                <option value="RUC">RUP</option>
                <option value="PAS">PAS</option>
                </select>
            </div>
            </div>
                         <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                     <div class="form-group">
                                          <label for="dni">DNI</label>
                                          <input type="text" name="dni" value="{{ $persona->dni}}" class="form-control" >
                                     </div>
                         </div>
                         <div class="col-lg-6 col-md-6 col-sm-6 col-xs-10">
                                     <div class="form-group">
                                    <label for="nombre">Nombres</label>
                                    <input type="text"  name="nombre" value="{{ $persona->nombre}}" class="form-control" >
                                     </div>
                         </div>
                         <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

                                <div class="form-group">
                                    <label for="apellido">Apellidos</label>
                                    <input type="text" name="apellido" value="{{ $persona->apellido}}" class="form-control" >
                                </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                    <label for="telefono1">Telefono Cel</label>
                                    <input type="text" name="telefono1" class="form-control" value="{{ $persona->telefono1}}">
                                    </div>
                         </div>
                         <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                      <div class="form-group">
                                          <label for="telefono2">Telefono Fijo</label>
                                          <input type="int" name="telefono2" class="form-control" value="{{ $persona->telefono2}}">
                                    </div>
                         </div>
                         <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                      <div class="form-group">
                                          <label for="distrito">Distrito</label>
                                          <input type="text" name="distrito" class="form-control" value="{{ $persona->distrito}}">
                                    </div>
                         </div>
                         <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                          <label for="direccion">Direccion</label>
                                          <input type="text" name="direccion" class="form-control" value="{{ $persona->direccion}}">
                                    </div>
                         </div>
                         <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                          <label for="correo">CORREO</label>
                                          <input type="text" name="correo" class="form-control" value="{{ $persona->correo}}">
                                    </div>
                         </div>
                         <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                          <label for="cactado">CACTADO</label>
                                          <input type="text" name="cactado" class="form-control" value="{{ $persona->cactado}}">
                                    </div>
                         </div>
                          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <div class="form-group">
                <label for="categoria">Categoria</label>
                  <select name="categoria"  class="form-control" >
                    <option value="BUENO">BUENO</option>
                    <option value="MEDIO">MEDIO</option>
                   <option value="MALO">MALO</option>
                  </select>
                 </div>
                 </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-10">
                   <div class="form-group">
                  <label for="fecha">Fecha del Reguistro</label>
                  <input type="date" name="fecha" value="{{ $persona->fecha}}" class="form-control" >
                  </div>
            </div>
            </div>
            
            
            <div class="form-group">
            	<button class="btn btn-primary" type="submit">Guardar</button>
            	<button class="btn btn-danger" type="reset">Cancelar</button>
            </div>


			{!!Form::close()!!}			
	
@endsection