@extends ('layouts.admin')
@section ('contenido')
  <div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
      <h3> Editar Cliente: {{ $contrato->codigo}}</h3>
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
	
			{!!Form::model($contrato,['method'=>'PATCH','route'=>['detalles.renovacion.update',$contrato->codigo]])!!}
                   {{Form::token()}}
                   <div class="row">
                         
                         <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                    <label for="codigo">codigo</label>
                                    <input type="text" name="interes" class="form-control" value="{{$contrato->codigo}}">
                                    </div>
                         </div>
                          
            </div>


                   <div class="row">
                         
                         <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                          <label for="interes">interes</label>
                                          <input type="text" name="interes" class="form-control" value="{{ $contrato->interes}}">
                                    </div>
                         </div>
                          
            </div>
            
            
            <div class="form-group">
            	<button class="btn btn-primary" type="submit">Guardar</button>
            	<button class="btn btn-danger" type="reset">Cancelar</button>
            </div>


			{!!Form::close()!!}			
	
@endsection