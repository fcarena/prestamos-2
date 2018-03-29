@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar tienda: {{ $caja_ingresos->tipo_movimiento}}</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::model($caja_ingresos,['method'=>'PATCH','route'=>['caja.ingresos.update',$caja_ingresos->id]])!!}
            {{Form::token()}}
            
             <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
         <div class="form-group">
                <label for="contrato_codigo">CODIGO</label>
                <input type="text" name="contrato_codigo" class="form-control" value="{{$caja_ingresos->contrato_codigo}}">
            </div>
        </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
             <div class="form-group">
                <label for="tienda">TIENDA</label>
                <input type="text" name="tienda" class="form-control" value="{{$caja_ingresos->tienda}}">
            </div>

        </div>
         <div class="form-group">
                <label for="tipo_movimiento">DESCRIPCION</label>
                <input type="text" name="tipo_movimiento" class="form-control" value="{{$caja_ingresos->tipo_movimiento}}">
            </div>
        <div class="form-group">
                <label for="monto">MONTO</label>
                <input type="text" name="monto" class="form-control" value="{{$caja_ingresos->monto}}">
            </div>

            

            
            <div class="form-group">
                <a href="{{URL::action('CajaIngresosController@update',$caja_ingresos->id)}}"><button class="btn btn-primary">Editar</button>
                <a href="/caja/ingresos/"><button class="btn btn-danger" type="reset">Cancelar</button>
            </div>

            {!!Form::close()!!}     
            
        </div>
    </div>
@endsection