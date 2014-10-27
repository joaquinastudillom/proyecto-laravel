@extends('layout.admin')

@section('titu')
{{'Usuarios <i class="fa fa-user fa-fw"></i>'}}
@endsection

@section('contento')

<div class="panel panel-info">
                        <div class="panel-heading">
                            Edición de Usuarios
                        </div>
                        <div class="panel-body">
                            <p><b>Aquí es donde usted puede administrar los usuarios de su sitio.</b></p>
                        </div>
                        <div class="panel-footer">
                            
                        </div>
</div>

 <div class="row">

                <div class="col-lg-12">
<!-- obtener datos del estado -->
<?php $status = Session::get('status'); ?>                    
<!-- MENSAJE DE USUARIO CREADO -->
@if($status == 'ok_create')
<div class="alert alert-success fade in"><button class="close" data-dismiss="alert" type="button">×</button>
<i class="fa fa-check-square"></i> El usuario fue creado con exito</div> 
@endif   
<!-- -->
<!-- MENSAJE DE USUARIO ELIMINADO -->
@if($status == 'ok_delete')
<div class="alert alert-success fade in"><button class="close" data-dismiss="alert" type="button">×</button>
<i class="fa fa-check-square"></i> El usuario fue eliminado con exito</div> 
@endif   
<!-- -->
<!-- MENSAJE DE ERROR USUARIO CREADO -->
@if($status == 'error')
<div class="alert alert-danger fade in"><button class="close" data-dismiss="alert" type="button">×</button>
<i class="fa fa-exclamation-triangle"></i> Han faltado campos o ha ingresado datos erroneos</div> 
@endif   
<!-- -->
<!-- MENSAJE DE USUARIO EDITADO -->
@if($status == 'ok_update')
<div class="alert alert-success fade in"><button class="close" data-dismiss="alert" type="button">×</button>
<i class="fa fa-check-square"></i> El usuario fue editado con exito</div> 
@endif   
<!-- -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <!-- Button trigger modal -->
                            <button class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                            Nuevo Usuario <i class="fa fa-plus-square"></i>
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"aria-hidden="true">
                            <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                            <h4 class="modal-title" id="myModalLabel">Nuevo Usuario <i class="fa fa-plus-square"></i></h4>
                            </div>
                            <div class="modal-body">
<!-- FORMULARIO -->
<form role="form" action="users/create" method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">Nombre</label>
    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Ingrese el nombre" name="name">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Apellido</label>
    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Ingrese apellido" name="last_name">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Email</label>
    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Ingrese Email" name="email">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Nombre de Usuario</label>
    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Ingrese nombre de usuario" name="username">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Contraseña</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Contraseña" name="password">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Repita la Contraseña</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Contraseña" name="password2">
  </div>
   
  <div class="form-group">
    <label for="exampleInputPassword1">Nivel de Usuario</label>
  </div>  
  <div class="radio">
  <label>
    <input type="radio" name="level" id="optionsRadios1" value="1" checked>
    Administrador
  </label>
</div>
<div class="radio">
  <label>
    <input type="radio" name="level" id="optionsRadios2" value="0">
    Usuario
  </label>
</div>  
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar <i class="fa fa-times"></i></button>
                            <button type="submit" class="btn btn-primary">Guardar Cambios <i class="fa fa-floppy-o"></i>
                            </button>
</form>
<!-- FIN FORMULARIO-->
                            </div>
                            </div>
                            </div>
                            </div>
                        </div>

<!-- EDICIÓN -->

     <!-- Modal -->
                            <div class="modal fade" id="Edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"aria-hidden="true">
                            <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                            <h4 class="modal-title" id="myModalLabel">Editar Usuario <i class="fa fa-plus-square"></i></h4>
                            </div>
                            <div class="modal-body">
<!-- FORMULARIO -->
<form role="form" action="users/update" method="post" id="formEdit">
  <div class="form-group">
    <label for="exampleInputEmail1">Nombre</label>
    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Ingrese el nombre" name="name_edit">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Apellido</label>
    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Ingrese apellido" name="last_name_edit">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Email</label>
    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Ingrese Email" name="email_edit">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Nombre de Usuario</label>
    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Ingrese nombre de usuario" name="username_edit">
  </div>
   
  <div class="form-group">
    <label for="exampleInputPassword1">Nivel de Usuario</label>
  </div>  
  <div class="radio">
  <label>
    <input type="radio" name="level_edit" id="level_ad" value="1" checked>
    Administrador
  </label>
</div>
<div class="radio">
  <label>
    <input type="radio" name="level_edit" id="level_us" value="0">
    Usuario
  </label>
</div>

<input type="hidden" name="user_id" >

                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar <i class="fa fa-times"></i></button>
                            <button type="submit" class="btn btn-primary">Guardar Cambios <i class="fa fa-floppy-o"></i>
                            </button>
</form>
<!-- FIN FORMULARIO-->
                            </div>
                            </div>
                            </div>
                            </div>
                        </div>

<!-- FIN DE EDICIÓN -->

                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nombre</th>
                                            <th>Apellido</th>
                                            <th>Email</th>
                                            <th>Creado</th>
                                            <th>Nivel</th>
                                            <th>Operaciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                       @if($users)             	
                                        <tr>
                                        @foreach($users as $user)	
                                            <td>{{ $user ->id }}</td>
                                            <td>{{ $user ->name }}</td>
                                            <td>{{ $user ->last_name }}</td>
                                            <td>{{ $user ->email }}</td>
                                            <td>{{ $user ->created_at }}</td>
                                            <td>{{ $user ->level }}</td>
                                            <td>
                                            	<span class="label label-info">{{ HTML::link('#Edit', 'Editar', array('class' => 'edit', 'id' => $user->id, 'style' => 'color: white;text-decoration: none;', 'data-toggle' => 'modal', 'title' => $user->name)) }}</span>
                                            	<span class="label label-danger">{{ HTML::link('#', 'Borrar', array('class' => 'delete', 'title' => $user->id, 'style' => 'color: white;text-decoration: none;')) }}</span>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /.panel-body -->
                      @else
                      <div class="alert alert-danger fade in" role="alert">
      						    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
      						    <strong>Lo siento !</strong> Aún no tenemos ningun usuario registrado, por favor añade alguno 
    					       </div>
                      @endif  
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
  </div>

  <script src="js/bootstrap.js"></script>
    
    <input id="val" type="hidden" name="user" class="input-block-level" value="" >

  <script>

$(document).ready(function() {
  
  $('.edit').click(function() {

  
  $('[name=user]').val($(this).attr ('id'));
  
    var faction = "<?php echo URL::to('user/getuser/data'); ?>";
  
  var fdata = $('#val').serialize();
     $('#load').show();
    $.post(faction, fdata, function(json) {
        if (json.success) {
      $('#formEdit input[name="user_id"]').val(json.id);
      $('#formEdit input[name="name_edit"]').val(json.name);
      $('#formEdit input[name="last_name_edit"]').val(json.last_name);
      $('#formEdit input[name="email_edit"]').val(json.email);
      $('#formEdit input[name="username_edit"]').val(json.username);
      
      if(json.level == true){
      $('#level_ad').prop('checked', 'true'); 
      }
      else{
      $('#level_us').prop('checked', 'true');
      }
      
      $('#load').hide();
      
        } else {
            $('#errorMessage').html(json.message);
            $('#errorMessage').show();
        }
    });
  
  });
 
});
</script>

@endsection