<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>PRESTOCASH | www.prestocash.com</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap-select.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('css/font-awesome.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('css/AdminLTE.min.css')}}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{asset('css/_all-skins.min.css')}}">
    <link rel="apple-touch-icon" href="{{asset('img/apple-touch-icon.png')}}">
    <link rel="shortcut icon" href="{{asset('img/favicon.ico')}}">
    <link rel="shortcut icon" href="{{asset('img/iconos/style.css')}}">

  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

      <header class="main-header">

        <!-- Logo -->
        <a href="/home" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>PRES</b>V</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>PRESTOCASH</b></span>
        </a>

        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Navegación</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
              
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
               
                 <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/') }}">Login</a></li>
                        
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Cerrar</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
              </li>
              
            </ul>
          </div>

        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
                    
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li>
              <a href="/home">
                <i class="fa fa-info-circle"></i> <span>INICIO</span>
              </a>
            </li>
            
            <li class="treeview">
              <a href="#">
                <i class="fa fa-laptop"></i>
                <span>REGISTROS</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li class="treeview">
              <a href="#">
                <i class="fa fa-plus-square"></i>
                <span>Articulos</span>
                 <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="/almacen/articulos"><i class=""></i> Electrodomesticos</a></li>
                <li><a href="/almacen/oro"><i class=""></i>Oro</a></li>
                <li><a href="/almacen/carros"><i class=""></i>Carros</a></li>
                
              </ul>
            </li>
                
                <li><a href="/almacen/categoria"><i class="fa fa-circle-o"></i> Categorías</a></li>
                <li><a href="/almacen/persona"><i class="fa fa-circle-o"></i> Clientes</a></li>
                <li><a href="/almacen/tienda"><i class="fa fa-circle-o"></i> Tiendas</a></li>
                
              </ul>
            </li>

            <li class="treeview">
              <a href="#">
                <i class="fa fa-shopping-cart"></i>
                <span>TRANSACIONES</span>
                 <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li class="treeview">
              <a href="#">
                <i class="fa fa-plus-square"></i>
                <span>Contratos</span>
                 <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="/contrato/nuevo"><i class="fa fa-circle-o"></i>Electro y Herramientas</a></li>
                <li><a href="/contrato/oro"><i class="fa fa-circle-o"></i>ORO</a></li>
                <li><a href="/contrato/carro"><i class="fa fa-circle-o"></i>CARROS</a></li>
              </ul>
              </ul>      

                <ul class="treeview-menu">
                <li class="treeview">
              <a href="#">
                <i class="fa fa-plus-square"></i>
                <span>Abonar al Capital</span>
                 <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="/detalles/nuevo"><i class="fa fa-circle-o"></i>Electro y Herramientas</a></li>
                <li><a href="/contrato/nuevo"><i class="fa fa-circle-o"></i>ORO</a></li>
                <li><a href="/contrato/nuevo"><i class="fa fa-circle-o"></i>CARROS</a></li>
               
              </ul>
              
              </ul>

                <ul class="treeview-menu">
                <li class="treeview">
              <a href="#">
                <i class="fa fa-plus-square"></i>
                <span>Eviar a Vitrina</span>
                 <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="/detalles/nuevo"><i class="fa fa-circle-o"></i>Electro y Herramientas</a></li>
                <li><a href="/contrato/nuevo"><i class="fa fa-circle-o"></i>ORO</a></li>
                <li><a href="/contrato/nuevo"><i class="fa fa-circle-o"></i>CARROS</a></li>
               
              </ul>
              
              </ul>
            </li>
            
             <li class="treeview">
              <a href="#">
                <i class="fa fa-th"></i>
                <span>CAJA</span>
                 <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                 <li><a href="/consultas/personas"><i class="fa fa-circle-o"></i> Ventas </a></li>
                <li><a href="/consultas/categorias"><i class="fa fa-circle-o"></i>Ingresos</a></li>
                <li><a href="/consultas/articulos"><i class="fa fa-circle-o"></i>Egresos</a></li>
                <li><a href="/consultas/personas"><i class="fa fa-circle-o"></i> Cierre de Caja</a></li>

              </ul>
            </li>

            <li class="treeview">
              <a href="/reportes/tiendas" >
                <i class="fa fa-circle-o"></i>
                <span>REPORTES</span>
                 <i class="fa fa-angle-left pull-right"></i>
              </a>
              
            </li>

  
               


            <li class="treeview">
              <a href="#">
                <i class="fa fa-folder"></i> <span>Acceso</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="/seguridad/usuario"><i class="fa fa-circle-o"></i> Usuarios del sistema</a></li>
                
              </ul>
            </li>
            <li>
              <a href="#">
                <i class="fa fa-info-circle"></i> <span>Acerca De...</span>
                <small class="label pull-right bg-yellow">IT</small>
              </a>
            </li>
                        
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>





       <!--Contenido-->
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
          
          <div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="box-header with-border">
                    <!--<h3 class="box-title">SISTEMAS DE PRESTAMOS</h3>-->
                    <!--Contenido-->
                    @yield('contenido')
                    <!--Fin Contenido-->
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

      <!--Fin-Contenido-->
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 1.1.0
        </div>
        <strong>Prestocash &copy; 2011-2018 <a href="www.prestocash.com.pe">Prestocash</a>.</strong> 
        Derechos Reservados.
      </footer>

      
    <!-- jQuery 2.1.4 -->
    <script src="{{asset('js/jQuery-2.1.4.min.js')}}"></script>
    @stack('scripts')
    <!-- Bootstrap 3.3.5 -->
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/bootstrap-select.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('js/app.min.js')}}"></script>
    
  </body>
</html>
