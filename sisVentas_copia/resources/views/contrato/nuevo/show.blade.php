@extends ('layouts.admin')
@section ('contenido')

      <div class="row">

<div class="panel-body panel panel-primary">

            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                  <div class="form-group">
                         <label for="dni">DNI</label>
                         <p>{{$detalle->$idcontrato}}</p>
                  </div>
             </div>    
            
                         <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                              <div class="form-group">
                                    <label for="nombre">Nombres</label>
                                    <input type="text" name="nombre"  id="nombre" class="form-control" placeholder="Nombres...">
                              </div>
                         </div>

                   <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">

                         <div class="form-group">
                               <label for="tienda">Tienda</label>
                               
                         </div>
                   </div>
            
       
      

  <div class="row">
                
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                  <div class="form-group">
                         <label for="fecha_inicio">Fecha de Reguistro</label>
                              
                   </div>

            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                  <div class="form-group">
                         <label for="fecha_mes">Fecha al Mes</label>
                         
                   </div>
            </div>


            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                  <div class="form-group">
                         <label for="fecha_final">Fecha al Mes +5 Dias</label>
                         
                   </div>
            </div>
 </div>
  </div>
             



 
<div class="panel-body panel panel-primary">

             
                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group">
                               <label for="categoria">CATEGORIA</label>
                             
                        </div>
                   </div>  
             
                  
                   <div class="col-lg-6 col-md-6 col-sm-6 col-6 xs-12">
                           <div class="form-group">
                         <label for="interes">INTERES</label>
                         <input type="float" name="interes"   id="interes" class="form-control " placeholder="Impuesto...">

                        </div>
                   </div>
            
      
     
<div class="row">

             <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                  
                         <label for="codigo">C.CONTRATO</label>
                         <input type="text" name="codigo" id="codigo" class="form-control" placeholder="Codigo...">
                   
              </div>

            <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
                  <div class="form-group">
                         <label for="descripcion">DESCRIPCION</label>
                         <input type="text" name="descripcion" id="descripcion" class="form-control" placeholder="Descripcion...">
                   </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                  
                         <label for="marca">MARCA</label>
                         <input type="text" name="marca" id="marca" class="form-control" placeholder="Marca...">
                   
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                  <div class="form-group">
                         <label for="modelo">MODELO</label>
                         <input type="text" name="modelo" id="modelo" class="form-control" placeholder="Modelo...">
                   </div>
            </div>
            
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                  <div class="form-group">
                         <label for="serial">SERIAL</label>
                         <input type="text" name="serial" id="serial" class="form-control" placeholder="Serial...">
                   </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                  <div class="form-group">
                         <label for="tazacion">TAZACION</label>
                         <input type="number" name="tazacion" id="tazacion" class="form-control" placeholder="Precio...">
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

              
         <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                 <table id="detalles" class="table table-striped table-bordered table-hover">
                  <thead style="background-color: #A9D0F5">
                        
                        <th>Opciones</th>
                        <th>Descripcion</th>
                        <th>Modelo</th>
                        <th>Marca</th>
                        <th>Serial</th>
                        <th>OBSV</th>
                         <th>Cover</th>
                        <th>Tazacion</th>
                        <th>interes</th>
                        <th>subtotal</th>
                        <th>total</th>
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

                            

@endsection

					
            

			
            

