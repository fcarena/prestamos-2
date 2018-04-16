@extends ('layouts.admin')
@section ('contenido')
 <script src="{{asset('js/jQuery-2.1.4.min.js')}}"></script>
    @stack('scripts')

	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<center><h1 >Nuevo Contrato de Joyas y Oro</h1></center>
                 
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

 {!!Form::open(array('url'=>'contrato/oro','method'=>'POST','autocomplete'=>'off','files'=>'true'))!!}
            {{Form::token()}}

      <div class="row">

<div class="panel-body panel panel-primary">

            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                  <div class="form-group">
                         <label for="dni">DNI</label>
                         <select  name="dni" class="form-control selectpicker" id="bdni" data-live-search="true">
                               @foreach ($personas as $persona)
                               <option readonly="readonly" value="{{$persona->dni}}_{{$persona->nombre}}">{{$persona->tipo_dni}}:{{$persona->dni}}
                               
                               </option>
                               @endforeach

                         </select>
                  </div>
             </div>    
            
                         <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                              <div class="form-group">
                                    <label for="nombre">Nombres</label>
                                    <input readonly="readonly" type="text" name="nombre"  id="nombre" class="form-control" placeholder="Nombres...">
                              </div>
                         </div>

                   <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">

                         <div class="form-group">
                               <label for="tienda">Tienda</label>
                               <select readonly="readonly" name="tienda" class="form-control" id="tienda" data-live-search="true">
                               @foreach ($tiendas as $tienda)
                               <option value="{{$tienda->nombre}}">{{$tienda->nombre}}
                               </option>
                               @endforeach
                         </select>
                         </div>
                   </div>
            
       
      

  <div class="row">
                
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                  <div class="form-group">
                         <label for="fecha_inicio">Fecha de Reguistro</label>
                              <input readonly="readonly" type="text" class="form-control"  name="fecha_inicio" id="fecha_inicio" required value="{{old('fecha_inicio',$now->format('d - M - Y ' ))}}">
                   </div>

            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                  <div class="form-group">
                         <label for="fecha_mes">Fecha de Pago</label>
                         <input readonly="readonly" type="text"  class="form-control"  name="fecha_mes" id="fecha_mes" value="{{old('fecha_mes',$now->addDay(30)->format('  d - M - Y'))}}">
                   </div>
            </div>


            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                  <div class="form-group">
                         <label for="fecha_final">Fecha de Mora</label>
                         <input readonly="readonly" type="text"  class="form-control"  name="fecha_final" id="fecha_final" value="{{old('fecha_final',$now->addDay(5)->format(' d - M - Y'))}}">
                   </div>
            </div>
 </div>
  </div>
  <div class="panel-body panel panel-primary">
<div class="row">

             <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                  
                         <label for="codigo">C.CONTRATO</label>
                         <input type="text" name="codigo" id="codigo" class="form-control" placeholder="Codigo...">
                   
              </div>

            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                  <div class="form-group">
                         <label for="descripcion">DESCRIPCION</label>
                         <input type="text" name="descripcion" id="descripcion" class="form-control" placeholder="Descripcion...">
                   </div>
            </div>
             <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                  <div class="form-group">
                         <label for="interes_porcentaje">Interes</label>
                         <input type="Float" name="interes_porcentaje" id="interes_porcentaje" class="form-control" value="0.12">
                   </div>
            </div>
             
</div>
<div class="row">
            <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
                  <div class="form-group">
                         <label for="obsv">OBSERVACION</label>
                         <input type="text" name="obsv" id="obsv" class="form-control" placeholder="Observacion...">
                   </div>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                  <div class="form-group">
                         <label for="cover">COVER</label>
                         <input type="text" name="cover" id="cover" class="form-control" placeholder="Cover...">
                   </div>
            </div>

</div>



      </div>
  <table border="2px" class="panel-body panel panel-primary col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <td width="500px">
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <div class="form-group">
                         <label for="peso_bruto">PESO B</label>
                         <input type="Float" name="pesobruto" id="peso_bruto" class="form-control" >
                   </div>
             </div>
             <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                  <div class="form-group">
                         <label for="monto_calculo">M. CALCULO</label>
                         <input type="Float" name="monto_calculo" id="monto_calculo" class="form-control" placeholder="Precio...">
                   </div>
            </div>

            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                  <div class="form-group">
                         <label for="porcentaje_calculo"> % CALCULO</label>
                         <input type="Float" name="porcentaje_calculo" id="porcentaje_calculo" class="form-control" value="0.30" >
                   </div>
            </div>
            

             <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                  <div class="form-group">
                         <label for="peso_neto">PESO NETO</label>
                         <input type="Float" name="peso_neto" id="peso_neto" class="form-control">
                   </div>
            </div>
             
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                  <div class="form-group">
                         <label for="interes">M. Interes</label>
                         <input type="Float" name="interes" id="interes" class="form-control" placeholder="Interes...">
                   </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                  <div class="form-group">
                         <label for="tazacion">TAZACION</label>
                         <input type="Float" name="tazacion" id="tazacion" class="form-control" placeholder="Precio...">
                   </div>
            </div>

            
               <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                  <div class="form-group">
                         <label for="total">TOTAL</label>
                         <input type="Float" name="total" id="total" class="form-control" placeholder="total...">
                   </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-4">
                  <div class="form-group">
                         <button type="button" id="bcalculo" name="bcalculo" class="btn btn-primary">CALCULO</button>
                   </div>
            
            </div>
            
            
      </td>
      </table>
      <td width="500px">
             <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                 <table id="tcalculo" class="table table-striped table-bordered table-hover dataTable">
                  <thead style="background-color: #A9D0F5">
                        
                        <th>OK</th>
                        <th>Peso B</th>
                        <th>% Calculo</th>
                        <th>M Calculo</th>
                        <th>Peso N</th>
                         <th>Interes</th>
                        <th>Tazacion</th>
                        <th>Total</th>
                        </thead>
                        <tfoot>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>

                        </tfooat>
                 <tbody>
                       
                 </tbody>
                       
                 </table> 
            </div>
            </div> 
      </td>

  
             
                              
       </div>

                     

            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" id="guardar">
                   <div class="form-group">
                         
                        <input  name="_token" value="{{ csrf_token() }}" type="hidden"></input>
            	     <button class="btn btn-primary" type="submit">Guardar</button>
            	     <button class="btn btn-danger" type="reset" >Limpiar</button>
                          
                    </div>
             </div>


@push ('scripts')
<script>
contc=0;
$(document).ready(function(){
            $('#bcalculo').click(function(){
                  agregarc();
            });
      });
var cont=0;

total=0;
int=0;
peso=0;
baja=05;
calm=0;
var cal=parseInt(cal);
subtotal=[];
$("#guardar").hide();
$("#bdni").change(mostarvalores);
$("#categoria").change(mostarinteres);


function mostarinteres()
{

      datosinteres=document.getElementById('categoria').value.split('_');
      $("#interes").val(datosinteres[1]);
}

function mostarvalores()
{
      datospersona=document.getElementById('bdni').value.split('_');
      $("#nombre").val(datospersona[1]);
      
}



     
function agregarc(){

 peso_bruto=$("#peso_bruto").val();
 porcentaje_calculo=$("#porcentaje_calculo").val();
 monto_calculo=$("#monto_calculo").val();
 interes_porcentaje=$("#interes_porcentaje").val();
 interes=$("#interes").val();
 

      if( peso_bruto!="" && porcentaje_calculo!="" && monto_calculo!="" && interes_porcentaje!="")
      {
            
            calm=(peso_bruto*porcentaje_calculo);
            peso_neto=(peso_bruto-calm);
            tazacion=(peso_neto*monto_calculo);
            interes=(tazacion*interes_porcentaje);
            total=(tazacion+interes);
            

            var fila='<tr class="selected" id="fila'+contc+'"><td> <button type="button" class="btn btn-warning" onclick="llenar('+contc+');">OK</button></td><td><input type="hidden" name="peso_bruto[]" value="'+peso_bruto+'">'+peso_bruto+'</td><td><input type="hidden" name="porcentaje_calculo[]" value="'+porcentaje_calculo+'">'+porcentaje_calculo+'</td><td><input type="hidden" name="monto_calculo[]" value="'+monto_calculo+'">'+monto_calculo+'</td><td><input type="hidden" name="peso_neto[]" value="'+peso_neto+'">'+peso_neto+'</td><td><input type="hidden" name="interes[]" value="'+interes+'">'+interes+'</td><td><input type="hidden" name="tazacion[]" value="'+tazacion+'">'+tazacion+'</td><td><input type="hidden" name="total[]" value="'+total+'">'+total+'</td></tr>';
                  contc++;
                  evaluar();
                  
                  $('#tcalculo').append(fila);

               
                        
    }
      else
      {

           alert("Debe llenar los campos Necesarios");



      }
      
}

 function llenar(id){

      
      $("#peso_bruto").val(peso_bruto);
      $("#porcentaje_calculo").val(porcentaje_calculo);
      $("#monto_calculo").val(monto_calculo);
      $("#peso_neto").val(peso_neto);
      $("#tazacion").val(tazacion);
      $("#interes").val(interes);
      $("#total").val(total);

 }   

 function Limpiar(){
      $("#descripcion").val("");
      $("#modelo").val("");
      $("#marca").val("");
      $("#serial").val("");
      $("#obsv").val("");
      $("#tazacion").val("");
      $("#cover").val("");
 }   

function evaluar()      
      {
            if(tazacion>0)
             $("#guardar").show();
      }

      {
            $("#guardar").hide();
      }


function eliminar(index)
{
      total=(parseFloat(total)-parseFloat(subtotal[index]));
      $("#total").html("S/. " + total);
      $("#fila" + index).remove();
      cont=cont-1;
      evaluar();
}
</script>

@endpush

  {!!Form::close()!!}             

@endsection

					
            

