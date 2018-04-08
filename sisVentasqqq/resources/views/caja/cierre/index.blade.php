@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	
		<center><h1>CAJA GENERAL</h1></center>
</div>



<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<button type="button" id="bt" name="bt" class="btn btn-primary">APERTURAR CAJA</button>
</div>
<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
			<label for="cover">AMANECE 
			<input  type="text" name="cover" class="form-control" ></label>
</input>
</div>
</div>
<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<h2 style="color:#FF0000">TABLA EGRESOS</h2>
				<thead style="background-color: #A9D0F5">
					<th>CODIGO</th>
					<th>DESCRIPCION</th>
					<th>DEBE</th>
					<th>CAPITAL</th>
				</thead>
                @foreach ($caja_cierre as $cat)
				<tr>
					<td>{{ $cat->cec}}</td>
					<td>{{ $cat->ced}}</td>
					<td>{{ $cat->mce}}</td>
					<td></td>
					
				</tr>
				@endforeach
			</table>
		</div>
	</div>
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<h2 style="color: #0000ff">TABLA INGRESOS</h2>
				<thead style="background-color: #A9D0F5">
					<th>CODIGO</th>
					<th>DESCRIPCION</th>
					<th>HABER</th>
					<th>CAPITAL</th>
				</thead>
                @foreach ($caja_cierre as $cat)
				<tr>
					<td>{{ $cat->cic}}</td>
					<td>{{ $cat->cid}}</td>
					<td>{{ $cat->mci}}</td>
					<td></td>
					
				</tr>
				@endforeach
			</table>
		</div>
	</div>
</div>

	@push ('scripts')
<script>
      $(document).ready(function(){
            $('#bt').click(function(){
                  evaluar();
            });
      });

 total=3;
    
function evaluar()      
      {
      		alert("A");
            if(total>0)
            	
             $("#guardar").hide();
      }

      {
      		
      		if(total<0)
      		alert("B");
            $("#guardar").show();
      }

  </script>

@endpush

@endsection