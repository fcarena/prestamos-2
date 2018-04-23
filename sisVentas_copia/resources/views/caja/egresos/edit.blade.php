@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Egreso: {{ $caja_egresos->contrato_codigo}}</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::model($caja_egresos,['method'=>'PATCH','route'=>['caja.egresos.update',$caja_egresos->id]])!!}
            {{Form::token()}}
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
         <div class="form-group">
                <label for="contrato_codigo">CODIGO</label>
                <input type="text" name="contrato_codigo" class="form-control" value="{{$caja_egresos->contrato_codigo}}">
            </div>
        </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
             <div class="form-group">
                <label for="tienda">TIENDA</label>
                <input type="text" name="tienda" class="form-control" value="{{$caja_egresos->tienda}}">
            </div>

        </div>
         <div class="form-group">
                <label for="tipo_movimiento">DESCRIPCION</label>
                <input type="text" name="tipo_movimiento" class="form-control" value="{{$caja_egresos->tipo_movimiento}}">
            </div>
        <div class="form-group">
                <label for="monto">MONTO</label>
                <input type="text" name="monto" class="form-control" value="{{$caja_egresos->monto}}">
            </div>

            
            
            

            
            <div class="form-group">
            	<a href="{{URL::action('CajaEgresosController@update',$caja_egresos->id)}}"><button class="btn btn-primary">Editar</button>
            	<a href="/caja/egresos/"><button class="btn btn-danger" type="reset">Cancelar</button>
            </div>

			{!!Form::close()!!}		
            
		</div>
	</div>
@endsection