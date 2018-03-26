@extends ('layouts.admin')
@section ('contenido')
          <div class="row">
            	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            			<h3>Nuevo Cliente</h3>
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
			{!!Form::open(array('url'=>'almacen/persona','method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
              <label for="tipo_dni">TIPO DE DNI</label>
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
            	<input type="text" name="dni" class="form-control" placeholder="DNI...">
            </div>
            </div>
             <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
            	<label for="nombre">NOMBRES</label>
            	<input type="text" name="nombre" class="form-control" placeholder="Nombres...">
            </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <div class="form-group">
            	<label for="apellido">APELLIDOS</label>
            	<input type="text" name="apellido" class="form-control" placeholder="Apellidos...">
            </div>
             </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <div class="form-group">
            	<label for="telefono1">TELEFONO CELULAR</label>
            	<input type="text" name="telefono1" class="form-control" placeholder="Telefono Cel.....">
            </div>
             </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <div class="form-group">
                  <label for="telefono2">TELEFONO FIJO</label>
                  <input type="int" name="telefono2" class="form-control" placeholder="Telefono Fijp.....">
            </div>
             </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <div class="form-group">
                  <label for="distrito">DISTRITO</label>
                  <input type="text" name="distrito" class="form-control" placeholder="Distrito.....">
            </div>
             </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
             <div class="form-group">
                  <label for="direccion">DIRECCION</label>
                  <input type="text" name="direccion" class="form-control" placeholder="Direccion.....">
            </div>
             </div>
             <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
             <div class="form-group">
                  <label for="correo">CORREO</label>
                  <input type="text" name="correo" class="form-control" placeholder="ejemplo@hotmail.com..">
            </div>
             </div>
             <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
             <div class="form-group">
                  <label for="cactado">CAPTADO</label>
                  <input type="text" name="cactado" class="form-control" placeholder="internet..">
            </div>
             </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <div class="form-group">
                <label for="categoria">CATEGORIA</label>
                  <select name="categoria" class="form-control">
                    <option value="BUENO">BUENO</option>
                <option value="MEDIO">MEDIO</option>
                <option value="MALO">MALO</option>
                  </select>
                 
            </div>
             </div>


            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

              <div class="form-group">
                  <label for="fecha">FECHA DE REGISTRO</label>
                  <input type="date" name="fecha" class="form-control" >
            </div>
            </div>
             </div>
            
            <div class="form-group">
               <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            	<button class="btn btn-primary" type="submit">Guardar</button>
            	<button class="btn btn-danger" type="reset" >Limpiar</button>
               </div>           
            </div>
            
          

			{!!Form::close()!!}		
            
		
@endsection