@extends ('layouts.admin')
@section ('contenido')
<div class="panel-body panel panel-primary">
   <div align="center" class="row">

 
<center>
     
 <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
               <div class="form-group">
                   <h2 align="left" style="color: #ff8000">PRESTOCASH S.A.S</h2>     
                </div>
      </div>
      
      
      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
               <div class="form-group">
                        <h3 align="right">Contrato</h3>
                         <p align="right" >{{$detalle->coo}}</p>
                </div>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
               <div class="form-group">
                  <h3 >Interes</h3>
                   <p>{{$detalle->interes}}</p>     
                </div>
      </div>
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
               <div class="form-group">
                        
                </div>
      </div>

      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
             <div class="form-group">
                  <h3 align="left">Fecha de Emision</h3>
                   <p align="left" >{{$detalle->fecha_inicio}}</p>
            </div>
       </div>
            
       <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
              <div class="form-group">
                        <h3>Plazo</h3>
                         <p >30 Dias</p>
              </div>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
               <div class="form-group">
                        <h3>Vencimiento</h3>
                         <p >{{$detalle->fecha_final}}</p>
                </div>
      </div>

 </center>
                  
          
      <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
            <div class="form-group">
                  <h3 align="left">Nombres</h3>
                  <p align="left">{{ $detalle->nombre.' '.$detalle->apellido}}</p>
             </div>
     </div>
      <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
            <div class="form-group">
                  <h3 align="left">DNI</h3>
                  <p align="left">{{ $detalle->tipo_dni.' '.$detalle->dni}}</p>
             </div>
     </div>                    
 
   <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
            <div class="form-group">
                  <h3>Direccion</h3>
                  <p >{{ $detalle->distrito.' '.$detalle->direccion}}</p>
             </div>
     </div>
  
    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
            <div class="form-group">
                  <h3>Telefono</h3>
                  <p >{{ $detalle->telefono1}}</p>
             </div>
     </div>
                         
 </div>
  
             



 

              
         <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                 <table  id="detalles" class="table table-striped table-bordered table-hover">
                  <thead style="background-color: #ff8000">
                        
                        
                        <th>Descripcion</th>
                        <th>OBSERVACION</th>
                        <th>TAZACION</th>
                        
                        </thead>
                        <tfoot>
                        <th>{{ $detalle->descripcion}}</th>
                        <th>{{ $detalle->obsv}}</th>
                        <th>{{ $detalle->tazacion}}</th>
                     

                        </tfooat>
                 <tbody>
                       
                 </tbody>
                       

                 </table> 
            </div>
            <center>
      <th><button  class="btn btn-primary" type="submit">IMPRIMIR</button></th>
      </center>
      </div>
                              
       </div>

                            

@endsection

					
            

			
            

