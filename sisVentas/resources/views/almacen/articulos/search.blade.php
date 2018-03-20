{!! Form::open(array('url'=>'almacen/articulos','method'=>'GET','autocomplete'=>'off','role'=>'search')) !!}
<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
	<div class="form-group">
		<div class="input-group">
			<input type="text" class="form-control" name="searchText" placeholder="Buscar..." value="{{$searchText}}">
			<span class="input-group-btn">
				<button type="submit" class="btn btn-primary">Buscar</button>
			</span>
		</div>
	</div>
</div>
{{Form::close()}}