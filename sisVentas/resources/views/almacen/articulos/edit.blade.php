@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Articulo: {{ $articulo->nombre}}</h3>
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
			{!!Form::model($articulo,['method'=>'PATCH','route'=>['almacen.articulos.update',$articulo->id]])!!}
            {{Form::token()}}
            <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                  <div class="form-group">
                         <label>Categoria</label>
                         <select name="idcategoria" class="form-control">
                              @foreach ($categoria as $cat)
                              <option value="{{$cat->id}}">{{$cat->nombre}}</option>
                              @endforeach
                               
                         </select>
                   </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                         <label>Tienda</label>
                         <select name="idtienda" class="form-control">
                              @foreach ($tienda as $cat)
                              <option value="{{$cat->id}}">{{$cat->nombre}}</option>
                              @endforeach
                               
                         </select>
                   </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                  <div class="form-group">
                         <label for="codigo">Codigo</label>
                         <input type="text" name="codigo" class="form-control" value="{{$articulo->codigo}}" placeholder="Codigo...">
                   </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                  <div class="form-group">
                         <label for="nombre">Nombre</label>
                         <input type="text" name="nombre" class="form-control" value="{{$articulo->nombre}}" placeholder="Nombre...">
                   </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                   <div class="form-group">
                         <label for="marca">Marca</label>
                         <input type="text" name="marca" class="form-control" value="{{$articulo->marca}}" placeholder="Marca...">
                   </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                   <div class="form-group">
                         <label for="modelo">Modelo</label>
                         <input type="text" name="modelo" class="form-control" value="{{$articulo->modelo}}" placeholder="Modelo...">
                   </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                   <div class="form-group">
                         <label for="obsv">Observacion</label>
                         <input type="text" name="obsv" class="form-control" value="{{$articulo->obsv}}" placeholder="Observacion...">
                   </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                   <div class="form-group">
                         <label for="serial">Serial</label>
                         <input type="text" name="serial"  class="form-control" value="{{$articulo->serial}}" placeholder="Serial...">
                   </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                  <div class="form-group">
                         <label for="precio">Precio</label>
                         <input type="text" name="precio" class="form-control" value="{{$articulo->precio}}" placeholder="Precio...">
                   </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                  <div class="form-group">
                         <label for="precioweb">Precio Web</label>
                         <input type="text" name="precioweb" class="form-control" value="{{$articulo->precioweb}}" placeholder="Precio Wen...">
                   </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                   <div class="form-group">
                         <label for="vitrina">Vitrina</label>
                         <input type="text" name="vitrina" class="form-control" value="{{$articulo->vitrina}}" placeholder="Vitrina...">
                   </div>
            </div>

      </div>
            <div class="form-group">
            	<button class="btn btn-primary" type="submit">Guardar</button>
            	<button class="btn btn-danger" type="reset">Cancelar</button>
            </div>

			{!!Form::close()!!}		
            
	
@endsection