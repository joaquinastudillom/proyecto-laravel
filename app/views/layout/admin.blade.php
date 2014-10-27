@if(Auth::check())

<!DOCTYPE html>
<html>
<head>

    <title>Panel de Administración</title>
    @include('include.styles')

    <script>
$(document).ready (function () {
    
    $('.delete').click (function () {
        
    if (confirm("¿ Está seguro de que desea eliminar ese usuario ?")) {
    var id = $(this).attr ("title");   
    document.location.href='users/delete/'+id;   
    }
    
    }) ; 
    
}) ;
</script>

    <script>
$(document).ready (function () {
    
    $('.delete2').click (function () {
        
    if (confirm("¿ Está seguro de que desea eliminar ese artículo ?")) {
    var id = $(this).attr ("title");   
    document.location.href='articulos/delete/'+id;   
    }
    
    }) ; 
    
}) ;
</script>

</head>


<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Administración <i class="fa fa-wrench"></i></a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">

                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">{{ Auth::user()->name }}
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> Perfil Usuario</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="logout"><i class="fa fa-sign-out fa-fw"></i> Cerrar Sesión</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="admin"><i class="fa fa-dashboard fa-fw"></i> Inicio</a>
                        </li>
                        @if(Auth::user()->level == 1)
                        <li>
                            <a href="<?php echo URL::to('users'); ?>"><i class="fa fa-user fa-fw"></i> Usuarios</a>
                        </li>
                        @endif
                        <li>
                            <a href="<?php echo URL::to('articulos'); ?>"><i class="fa fa-edit fa-fw"></i> Articulos</a>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <!-- Page Content -->

        <div id="page-wrapper">

            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">@yield('titu')</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            
            @yield('contento')
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper --> 


    </div>

    <!-- /#wrapper -->
    

    <!-- jQuery Version 1.11.0 -->
    <script src="js/jquery-1.11.0.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="js/plugins/metisMenu/metisMenu.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="js/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="js/plugins/dataTables/dataTables.bootstrap.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/sb-admin-2.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').dataTable();
    });
    </script>

    @endif


</body>

</html>