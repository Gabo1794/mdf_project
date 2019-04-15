<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
    <head>
        <meta charset="utf-8"/>
            <meta content="IE=edge" http-equiv="X-UA-Compatible"/>
                <title>
                    Control de Insumos MDF
                </title>
                <!-- Tell the browser to be responsive to screen width -->
                <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport"/>
                    <link href="{{ asset('dist/img/mdf2.jpg') }}" rel="icon"/>
                    {{ Html::style('bower_components/bootstrap/dist/css/bootstrap.min.css') }}
                    {{ Html::style('bower_components/font-awesome/css/font-awesome.min.css') }}
                    {{ Html::style('bower_components/Ionicons/css/ionicons.min.css') }}
                    {{ Html::style('dist/css/AdminLTE.min.css') }}
                    {{ Html::style('dist/css/skins/skin-blue.min.css') }}

                    {{ Html::style('bower_components/bootstrap-daterangepicker/daterangepicker.css') }}
                    {{ Html::style('bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}

                    {{ Html::style('plugins/iCheck/all.css') }}
                    {{ Html::style('bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css') }}

                    {{ Html::style('plugins/timepicker/bootstrap-timepicker.min.css') }}
                    {{ Html::style('bower_components/select2/dist/css/select2.min.css') }}

                    {{ Html::style('dist/css/skins/_all-skins.min.css') }}

                    {{ Html::style('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}

                    {{ Html::style('bower_components/Ionicons/css/ionicons.min.css') }}

                    {{ Html::style('personcss/animate.css') }}
                    {{ Html::style('personcss/sweetalert2.css') }}

                    {{ Html::style('css/personcss.css') }}

                    {{ Html::style('personcss/easy/easy-autocomplete.css') }}
                    {{ Html::style('personcss/easy/easy-autocomplete.min.css') }}
                    {{ Html::style('personcss/easy/easy-autocomplete.themes.css') }}
                    {{ Html::style('personcss/easy/easy-autocomplete.themes.min.css') }}
                    <link crossorigin="anonymous" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" rel="stylesheet"/>
                            <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
                            <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
                            <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
                            <!-- Google Font -->
                            <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic" rel="stylesheet"/>
                            <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

                            {{ Html::style('personcss/controlProductos.css') }}
    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">
            <!-- Main Header -->
            <header class="main-header">
                <!-- Logo -->
                <a class="logo" href="{{ URL('controlProductos') }}">
                    <!-- mini logo for sidebar mini 50x50 pixels -->
                    <span class="logo-mini">
                        <b>
                            M
                        </b>
                        DF
                    </span>
                    <!-- logo for regular state and mobile devices -->
                    <span class="logo-lg">
                        <b>
                            MDF
                        </b>
                        México
                    </span>
                </a>
                <!-- Header Navbar -->
                <nav class="navbar navbar-static-top" role="navigation">
                    <!-- Sidebar toggle button-->
                    <a class="sidebar-toggle" data-toggle="push-menu" href="#" role="button">
                        <span class="sr-only">
                            Toggle navigation
                        </span>
                    </a>
                    <!-- Navbar Right Menu -->
                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            <!-- Messages: style can be found in dropdown.less-->
                            <!-- User Account Menu -->
                            <li class="dropdown user user-menu">
                                <!-- Menu Toggle Button -->
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                    <!-- The user image in the navbar-->
                                    <img alt="User Image" class="user-image" src="{{ asset('dist/img/mdf2.jpg') }}"/>
                                        <!-- hidden-xs hides the username on small devices so only the image appears. -->
                                        <span class="hidden-xs">
                                            {!! Auth::user()->usuario!!}
                                        </span>
                                    
                                </a>
                                <ul class="dropdown-menu">
                                    <!-- The user image in the menu -->
                                    <li class="user-header">
                                        <img alt="User Image" class="img-circle" src="{{ asset('dist/img/mdf2.jpg') }}"/>
                                            <p>
                                                {!! Auth::user()->usuario!!}
                                            </p>
                                        
                                    </li>   
                                    <!-- Menu Footer-->
                                    <li class="user-footer">
                                        <div class="pull-right">
                                            <a class="btn btn-default btn-flat" href="/logout">
                                                Cerrar Sesión
                                            </a>
                                        </div>
                                    </li>
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
                    <!-- Sidebar user panel (optional) -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img alt="User Image" class="img-circle" src="{{ asset('dist/img/mdf.jpg') }}"/>
                            
                        </div>
                        <div class="pull-left info">
                            <p>
                                {!!Auth::user()->usuario!!}
                            </p>
                        </div>
                    </div>
                    <!-- Sidebar Menu -->
                    <ul class="sidebar-menu" data-widget="tree">
                        @if(auth()->user()->tipoUser == 1)
                        <li class="header">
                            Administración
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fas fa-users">
                                </i>
                                <span>
                                    Miembros
                                </span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right">
                                    </i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li>
                                    <a href="{{ URL('miembros') }}">
                                        Miembros
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ URL('miembros/create') }}">
                                        Añadir Miembro
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="far fa-address-book">
                                </i>
                                <span>
                                    Ministerios
                                </span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right">
                                    </i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li>
                                    <a href="{{ URL('ministerios') }}">
                                        Ministerios
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ URL('rol') }}">
                                        Rol
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fas fa-user-cog">
                                </i>
                                <span>
                                    Usuarios
                                </span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right">
                                    </i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li>
                                    <a href="{{ URL('usuarios') }}">
                                        Usuarios
                                    </a>
                                </li>
                            </ul>
                        </li>
                         @endif                       
                        <li class="header">
                            Productos
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fab fa-product-hunt">
                                </i>
                                <span>
                                    Productos
                                </span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right">
                                    </i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li>
                                    <a href="{{ URL('productos') }}">
                                        Ver Productos
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ URL('productos/create') }}">
                                        Crear Producto
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fas fa-chalkboard-teacher">
                                </i>
                                <span>
                                    Proveedores
                                </span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right">
                                    </i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li>
                                    <a href="{{ URL('proveedores') }}">
                                        Proveedores
                                    </a>
                                </li>
                            </ul>
                        </li>
                        @if(auth()->user()->tipoUser < 3)
                        <li class="header">
                            Reportes
                        </li>
                        @endif
                    </ul>
                    <!-- /.sidebar-menu -->
                </section>
                <!-- /.sidebar -->
            </aside>
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Bienvenido:
                        <small>
                            {!!Auth::user()->usuario!!}
                        </small>
                    </h1>
                </section>
                <!-- Main content -->
                <section class="content container-fluid">
                    <!--------------------------
        | Your Page Content Here |
        -------------------------->
                    @yield('content')
                    
                </section>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->
            <!-- Main Footer -->
            <footer class="main-footer">
                <!-- To the right -->
                <div class="pull-right hidden-xs">
                    Más que una iglesia somos una familia.
                </div>
                <!-- Default to the left -->
                <strong>
                    Copyright © 2018
                    <a href="#">
                        Mundo de Fe México
                    </a>
                    .
                </strong>
                All rights reserved.
            </footer>
            <div class="control-sidebar-bg">
            </div>
        </div>
        <!-- ./wrapper -->
        <!-- REQUIRED JS SCRIPTS -->
        <!-- jQuery 3 -->
        {{ Html::script('bower_components/jquery/dist/jquery.min.js') }}
        <!-- Bootstrap 3.3.7 -->
        {{ Html::script('bower_components/bootstrap/dist/js/bootstrap.min.js') }}
        <!-- AdminLTE App -->
        {{ Html::script('dist/js/adminlte.min.js') }}
        <!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
        {{ Html::script('bower_components/select2/dist/js/select2.full.min.js') }}

{{ Html::script('plugins/input-mask/jquery.inputmask.js') }}

{{ Html::script('plugins/input-mask/jquery.inputmask.date.extensions.js') }}

{{ Html::script('plugins/input-mask/jquery.inputmask.extensions.js') }}

{{ Html::script('bower_components/moment/min/moment.min.js') }}
{{ Html::script('bower_components/bootstrap-daterangepicker/daterangepicker.js') }}

{{ Html::script('bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}
{{ Html::script('bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js') }}

{{ Html::script('plugins/timepicker/bootstrap-timepicker.min.js') }}
{{ Html::script('bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}

{{ Html::script('plugins/iCheck/icheck.min.js') }}
{{ Html::script('bower_components/fastclick/lib/fastclick.js') }}
{{ Html::script('dist/js/demo.js') }}

{{ Html::script('personjs/datable.js') }}

{{ Html::script('bower_components/datatables.net/js/jquery.dataTables.min.js') }}

{{ Html::script('bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}

{{ Html::script('bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}

{{ Html::script('personjs/sweetalert2.js') }}

{{ Html::script('personjs/sweetalert2.common.js') }}

{{ Html::script('personjs/easy/jquery.easy-autocomplete.js') }}
{{ Html::script('personjs/easy/jquery.easy-autocomplete.min.js') }}

@section('scriptMiembros')
@show
        <!-- Page script -->
        <script>
            $(function () {
         //Initialize Select2 Elements
         $('.select2').select2()

         //Datemask dd/mm/yyyy
         $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
         //Datemask2 mm/dd/yyyy
         $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
         //Money Euro
         $('[data-mask]').inputmask()

         //Date range picker
         $('#reservation').daterangepicker()
         //Date range picker with time picker
         $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A' })
         //Date range as a button
         $('#daterange-btn').daterangepicker(
           {
             ranges   : {
               'Today'       : [moment(), moment()],
               'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
               'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
               'Last 30 Days': [moment().subtract(29, 'days'), moment()],
               'This Month'  : [moment().startOf('month'), moment().endOf('month')],
               'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
             },
             startDate: moment().subtract(29, 'days'),
             endDate  : moment()
           },
           function (start, end) {
             $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
           }
         )

         //Date picker
         $('#datepicker').datepicker({
           autoclose: true
         })

         //iCheck for checkbox and radio inputs
         /*$('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
           checkboxClass: 'icheckbox_minimal-blue',
           radioClass   : 'iradio_minimal-blue'
         })
         //Red color scheme for iCheck
         $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
           checkboxClass: 'icheckbox_minimal-red',
           radioClass   : 'iradio_minimal-red'
         })
         //Flat red color scheme for iCheck
         $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
           checkboxClass: 'icheckbox_flat-green',
           radioClass   : 'iradio_flat-green'
         })*/

         //Colorpicker
         $('.my-colorpicker1').colorpicker()
         //color picker with addon
         $('.my-colorpicker2').colorpicker()

         //Timepicker
         $('.timepicker').timepicker({
           showInputs: false
         })
       })
        </script>
    </body>
</html>
