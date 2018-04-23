@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			
            <div>
            <h3>Editar Usuario:  {{ $usuario->name}}</h3>
			
            </div>

            @if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::model($usuario,['method'=>'PATCH','route'=>['seguridad.usuario.update',$usuario->id]])!!}
            {{Form::token()}}
             <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                          

                            <div class="form-group">
                <label for="name">Nombre</label>
                <input type="text" name="name" class="form-control" placeholder="Nombre...">
            </div>

                     <div class="form-group">
                         <label for="email">E-Mail</label>
                           <input type="text" name="email" class="form-control" placeholder="usuario@gmail.com">
                      </div>
                      <div class="form-group">
                         <label for="password">Contraseña</label>
                           <input type="password" name="password" class="form-control" >
                      </div>
                      <div class="form-group">
                         <label for="password-confirm">Confirmar Contraseña</label>
                           <input type="password" name="password-confirm" class="form-control" >
                      </div>
                    



                       
                 <div class="form-group">
                     <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                           <button class="btn btn-primary" type="submit">Guardar</button>
                           <button class="btn btn-danger" type="reset" >Cancelar</button>
                    </div>
                </div>

			{!!Form::close()!!}		
            
		</div>
	</div>
@endsection