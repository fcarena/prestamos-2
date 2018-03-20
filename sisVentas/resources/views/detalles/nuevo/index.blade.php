@extends ('layouts.admin')
@section ('contenido')
<div  class="box box-info">
 <script src="{{asset('js/jQuery-2.1.4.min.js')}}"></script>
    @stack('scripts')
    <div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
      <h3 >Cancelacion del Contrato</h3>
                 
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

          {!!Form::open(array('url'=>'detalles/nuevo','method'=>'POST','autocomplete'=>'off','files'=>'true'))!!}
            {{Form::token()}}


<div class="panel-body panel panel-primary">

            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                  <div class="form-group">
                         <label for="codigo">Numero de Contrato</label>
                         <select  name="codigo" class="form-control selectpicker" id="codigo" data-live-search="true">
                               @foreach ($contrato as $contrato)
                               <option value="{{$contrato->codigo}}_{{$contrato->dni}}_{{$contrato->nombre}}_{{$contrato->tienda}}_{{$contrato->fecha_inicio}}_{{$contrato->fecha_mes}}_{{$contrato->fecha_final}}_{{$contrato->estatus}}_{{$contrato->tazacion}}_{{$contrato->interes}}_{{$contrato->total}}_{{$contrato->descripcion}}_{{$contrato->obsv}}_{{$contrato->cover}}_{{$contrato->mora}}">{{$contrato->codigo}}
                               </option>
                               @endforeach

                         </select>
                  </div>
             </div>    
             <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                              <div class="form-group">
                                    <label for="dni">DNI</label>
                                    <input type="text" name="dni"  id="dni" class="form-control" >
                              </div>
             </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                              <div class="form-group">
                                    <label for="nombre">Nombres</label>
                                    <input type="text" name="nombre"  id="nombre" class="form-control">
                              </div>
            </div>
             <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                              <div class="form-group">
                                    <label for="tienda">Tienda</label>
                                    <input type="text" name="tienda"  id="tienda" class="form-control" >
                              </div>
             </div>
             <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                              <div class="form-group">
                                    <label for="estatus">Estatus</label>
                                    <input type="text" name="estatus"  id="estatus" class="form-control" >
                              </div>
            </div>
                  <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                              <div class="form-group">
                                    <label for="descripcion">Descripcion del Articulo</label>
                                    <input type="descripcion" name="total"  id="descripcion" class="form-control">
                              </div>
            </div>
             <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
                              <div class="form-group">
                                    <label for="obsv">Observacion del Articulo</label>
                                    <input type="obsv" name="total"  id="obsv" class="form-control">
                              </div>
            </div>
             <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                              <div class="form-group">
                                    <label for="cover">Cover</label>
                                    <input type="cover" name="total"  id="cover" class="form-control">
                              </div>
            </div>
       
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                              <div class="form-group">
                                    <label for="fecha_inicio">Fecha Contrato</label>
                                    <input type="text" name="fecha_inicio"  id="fecha_inicio" class="form-control" >
                              </div>
            </div>
            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-12">
                              <div class="form-group">
                                    <label for="fecha_mes">Plazo</label>
                                    <input type="text" name="fecha_mes"  id="fecha_mes" class="form-control" >
                              </div>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                              <div class="form-group">
                                    <label for="fecha_final">Fecha de Mora</label>
                                    <input type="text" name="fecha_final"  id="fecha_final" class="form-control" >
                              </div>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                              <div class="form-group">
                                    <label for="tazacion">Capital</label>
                                    <input type="text" name="tazacion"  id="tazacion" class="form-control" >
                              </div>
            </div>
            
            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-12">
                              <div class="form-group">
                                    <label for="interes">Interes</label>
                                    <input type="text" name="interes"  id="interes" class="form-control">
                              </div>
            </div>
              <div class="col-lg-1 col-md-1 col-sm-1 col-xs-12">
                              <div class="form-group">
                                    <label for="mora">Mora</label>
                                    <input type="text" name="mora"  id="mora" class="form-control">
                              </div>
            </div>
          

            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                              <div class="form-group">
                                    <label for="total">Total del Contrato</label>
                                    <input type="text" name="total"  id="total" class="form-control">
                              </div>
            </div>
              <div class="col-lg-1 col-md-1 col-sm-1 col-xs-12">
                              <div class="form-group">
                                    <label for="dias">Dias</label>
                                 <input type="text" name="dias"  id="dias" class="form-control">

                              <button href="" type="button" id="bc" name="bc" class="btn btn-warning">Dia</button>
                              </div>
            </div>
                         

 </div> 
 <div class="row">

   <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
                  <div class="form-group">
                         <button type="button" id="bt" name="bt" class="btn btn-warning">Calcular</button>
                   </div>
            
            </div>
             
      </div>
      <div class="row">

 <div class="panel-body panel panel-primary">   
             <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                 <table id="detalles" class="table table-striped table-bordered table-hover dataTable">
                  <thead style="background-color: #A9D0F5">
                        
                        <th>Eliminar</th>
                        <th>Descripcion</th>
                        <th>Capital</th>
                         <th>Interes</th>
                        <th>Mora</th>
                        <th>Dias</th>
                        <th>% X Dias</th>
                        <th>Total</th>
                        </thead>
                        <tfoot>
                        <th></th>
                         <th></th>
                         <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th ><h4 id="total" > </h4></th>

                        </tfooat>
                 <tbody>
                       
                 </tbody>
                       

                 </table> 
            </div>
</div>


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
        $(document).ready(function(){
            $('#bt').click(function(){
                  agregar();
            });
      });

dia=0;
totalf=0;
cont=0;     
$("#codigo").change(mostarvalores);

function mostarvalores()
{
       
      datos=document.getElementById('codigo').value.split('_');
      $("#dni").val(datos[1]);
      $("#nombre").val(datos[2]);
      $("#tienda").val(datos[3]);
      $("#fecha_inicio").val(datos[4]);
      $("#fecha_mes").val(30);
      $("#fecha_final").val(datos[6]);
      $("#estatus").val(datos[7]);
      $("#tazacion").val(datos[8]);
      $("#interes").val(datos[9]);
      $("#total").val(datos[10]);
      $("#descripcion").val(datos[11]);
      $("#obsv").val(datos[12]);
      $("#cover").val(datos[13]);
      $("#mora").val(datos[14]);
      
}
function agregar(){

  cont=0;

 descripcion=$("#descripcion").val();
 tazacion=$("#tazacion").val();
 interes=$("#interes").val();
 fecha_inicio=$("#fecha_inicio").val();
 fecha_dia=$("#fecha_dia").val();
 dias=$("#dias").val();


      if( descripcion!="" && tazacion!="" && interes!="" && fecha_inicio!="" && dias!="" && cont<"1")
      {
                  mora=0.0;
                  

             if (dias<30 && interes!="0") {

                        xdia=(parseFloat(interes)/30);
                         totalf=(parseFloat(interes)+parseFloat(tazacion));
                  
            }
            if (dias>=30 && dias<36 && interes!="0") {

                        xdia=(interes/30);
                        cxdia=(xdia*dias)
                         totalf=(parseFloat(cxdia)+parseFloat(tazacion));
                  
            }
            if (dias>=36 && dias<=60 && interes!="0") {

                        xdia=(interes/30);
                        cxdia=(xdia*dias);
                        mora=(cxdia*0.30);
                         totalf=(parseFloat(mora)+parseFloat(cxdia)+parseFloat(tazacion));
                               
            }
            if (dias>60 && dias<66 && interes!="0") {

                        xdia=(interes/30);
                        cxdia=(xdia*dias);
                        mora=(cxdia*0.50);
                         totalf=(parseFloat(mora)+parseFloat(cxdia)+parseFloat(tazacion));
                               
            }
             if (dias>=66) {
                        alert("Articulo en Vitrina");
                               
            }
          
                 
         
            var fila='<tr class="selected" id="fila'+cont+'"><td> <button type="button" class="btn btn-danger" onclick="eliminar('+cont+');">X</button></td><td><input type="hidden" name="descripcion[]" value="'+descripcion+'">'+descripcion+'</td><td><input type="hidden" name="tazacion[]" value="'+tazacion+'">'+tazacion+'</td><td><input type="hidden" name="interes[]" value="'+interes+'">'+interes+'</td><td><input type="hidden" name="mora[]" value="'+mora+'">'+mora+'</td><td><input type="hidden" name="dias[]" value="'+dias+'">'+dias+'</td><td><input type="hidden" name="xdia[]" value="'+xdia+'">'+xdia+'</td><td><input type="hidden" name="totalf[]" value="'+totalf+'">'+totalf+'</td></tr>';
                  cont++;
                  evaluar();
                  $('#detalles').append(fila);
                  


                  
                                      
                        
    }
      else
      {

            alert("Error debe Selecionar un Codigo de Contrato");
            alert(" y generar los dias del contrato");
            

      }
      
}
  
function eliminar(index)
{
      
      $("#fila" + index).remove();
      
      evaluar();
}

function evaluar()      
      {
            if(totalf>0)
             $("#guardar").show();
      }

      {
            $("#guardar").hide();
      }

      </script>

@endpush

  {!!Form::close()!!}

@endsection

					
            

