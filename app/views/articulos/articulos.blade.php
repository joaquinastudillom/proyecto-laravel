@extends('layout.admin')

@section('titu')
{{'Articulos <i class="fa fa-edit fa-fw"></i>'}} 
@endsection


@section('contento')

<div class="panel panel-info">
                        <div class="panel-heading">
                            Edición de Articulos
                        </div>
                        <div class="panel-body">
                            <p><b>Aquí es donde usted puede administrar los articulos de su sitio.</b></p>
                        </div>
                        <div class="panel-footer">
                            
                        </div>
</div>

  <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                	<!-- obtener datos del estado -->
<?php $status = Session::get('status'); ?>                    
<!-- MENSAJE DE ARTICULO CREADO -->
@if($status == 'ok_create')
<div class="alert alert-success fade in"><button class="close" data-dismiss="alert" type="button">×</button>
<i class="fa fa-check-square"></i> El articulo fue creado con exito</div> 
@endif   
<!-- -->
<!-- MENSAJE DE ARTICULO ELIMINADO -->
@if($status == 'ok_delete')
<div class="alert alert-success fade in"><button class="close" data-dismiss="alert" type="button">×</button>
<i class="fa fa-check-square"></i> El articulo fue eliminado con exito</div> 
@endif   
<!-- -->
<!-- MENSAJE DE ERROR ARTICULO CREADO -->
@if($status == 'error')
<div class="alert alert-danger fade in"><button class="close" data-dismiss="alert" type="button">×</button>
<i class="fa fa-exclamation-triangle"></i> Han faltado campos o ha ingresado datos erroneos</div> 
@endif   
<!-- -->
<!-- MENSAJE DE ARTICULO EDITADO -->
@if($status == 'ok_update')
<div class="alert alert-success fade in"><button class="close" data-dismiss="alert" type="button">×</button>
<i class="fa fa-check-square"></i> El articulo fue editado con exito</div> 
@endif   
<!-- -->

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <!-- Button trigger modal -->
                            <button class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                            Nuevo Articulo <i class="fa fa-plus-square"></i>
                            </button>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Nuevo artículo</h4>
      </div>
      <div class="modal-body">
<!-- FORMULARIO -->
<form role="form" action="articulos/create" enctype="multipart/form-data" method="post" id="formulario">

  <div class="form-group">
    <label for="exampleInputEmail1">Titulo</label>
    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Ingrese el titulo" name="titulo" required>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Descripción</label>
    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Ingrese la descripción" name="descripcion" required>
  </div>
    <!-- CAMPO OCULTO CREADOR-->
          <input type="hidden" class="form-control" id="exampleInputEmail1" name="creador" value="{{ Auth::user()->name }}">
  <!-- -->
  <!-- CAMPO OCULTO EDITOR-->
          <input type="hidden" class="form-control" id="exampleInputEmail1" name="editor" value="{{ Auth::user()->name }}">
  <!-- -->
 <div class="form-group">
    <label for="exampleInputEmail1">Imagen 1 <i class="fa fa-file-image-o"></i></label>
    <input type="file" class="form-control" id="exampleInputEmail1" placeholder="Ingrese la imagen 1" accept="image/gif, image/jpeg, image/png" name="foto1" required>
 </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Imagen 2 <i class="fa fa-file-image-o"></i></label>
    <input type="file" class="form-control" id="exampleInputEmail1" placeholder="Ingrese la imagen 2" accept="image/gif, image/jpeg, image/png" name="foto2">
  </div>
    <div class="form-group">
    <label for="exampleInputEmail1">Imagen 3 <i class="fa fa-file-image-o"></i></label>
    <input type="file" class="form-control" id="exampleInputEmail1" placeholder="Ingrese la imagen 3" accept="image/gif, image/jpeg, image/png" name="foto3">
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
<!-- FIN DE Modal -->

                        </div>

<!-- EDICION -->


<!-- Modal -->
<div class="modal fade" id="Edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Editar artículo</h4>
      </div>
      <div class="modal-body">
<!-- FORMULARIO -->
<form role="form" action="articulos/update" enctype="multipart/form-data" method="post" id="formEdit">
  <div class="form-group">

    <label for="exampleInputEmail1">Titulo </label>
    <input type="text" class="form-control" id="titulo_edit" placeholder="Ingrese el nombre" name="titulo_edit">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Descripción</label>
    <textarea style="height:172px;width: 568px;" type="text" class="form-control" id="descripcion_edit" placeholder="Ingrese el nombre" name="descripcion_edit"></textarea>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Imagen 1</label>
    <input type="file" class="form-control"  placeholder="Ingrese el nombre" name="foto1_edit" >
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Imagen 2</label>
    <input type="file" class="form-control" id="foto2_edit" placeholder="Ingrese el nombre" name="foto2_edit">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Imagen 3</label>
    <input type="file" class="form-control" id="foto3_edit" placeholder="Ingrese el nombre" name="foto3_edit">
  </div>
  
  <div class="form-group">
  <label>Imagenes Actuales : (Imagen 1 - Imagen 2 - Imagen 3)</label><br>  
  <img id="foto1_edit2" height="150" width="150" />
  <img id="foto2_edit2" height="150" width="150" /> 
  <img id="foto3_edit2" height="150" width="150" />
  </div>

  <input type="hidden" name="editor" id="editor_edit" value="{{ Auth::user()->name }}">
  
  <input type="hidden" name="id_articulo" id="iddddd" >


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
<!-- FIN DE Modal -->

 </div>


<!-- FIN DE EDICION-->

                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Titulo</th>
                                            <th>Creado por</th>
                                            <th>Editado por</th>
                                            <th>Fecha edicion</th>
                                            <th>Imagen 1</th>
                                            <th>Imagen 2</th>
                                            <th>Imagen 3</th>
                                            <th>Operaciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                              @if($articulos)      	
                                    <tr>
                                    @foreach($articulos as $articulo)	
                                            <td>{{ $articulo ->id_articulo }}</td>
                                            <td>{{ $articulo ->nombre_articulo }}</td>
                                            <td>{{ $articulo ->creado_por }}</td>
                                            <td>{{ $articulo ->editado_por }}</td>
                                            <td>{{ $articulo ->updated_at }}</td>
                                            <td><img src="{{ $articulo ->foto_1 }}" height=150 width=150></td>
                                            <td><img src="{{ $articulo ->foto_2 }}" height=150 width=150></td>
                                            <td><img src="{{ $articulo ->foto_3 }}" height=150 width=150></td>
                                            <td>
                                               <!--<a data-toggle="modal" data-id="<?php echo $articulo->id_articulo?>" title="Add this item" class="open-Modal btn btn-success btn-xs" href="#Edit">edit</a>-->
                                                 <button class="btn btn-success btn-xs" idarticulo="{{ $articulo ->id_articulo }}"  titulo="{{$articulo->nombre_articulo}}" descripcion="{{ $articulo ->descripcion_articulo }}" fotouno="{{ $articulo ->foto_1 }}" fotodos="{{ $articulo ->foto_2 }}" fototres="{{ $articulo ->foto_3 }}" rel="abrir" data-toggle="modal" data-target="#Edit" style="margin-top: 10px;
                                                  width: 85px;">editar</button>
                                                 
                                            	   <button class="btn btn-danger btn-xs" style="margin-top: 10px;
													width: 85px;">{{ HTML::link('#', 'Borrar', array('class' => 'delete2', 'title' => $articulo->id_articulo, 'style' => 'color: white;text-decoration: none;')) }}</button>
                                            </td>
                                        </tr>
                                    @endforeach    
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                        @else
                        <div class="alert alert-danger fade in" role="alert">
      						    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
      						    <strong>Lo siento !</strong> Aún no tenemos ningun articulo registrado, por favor añade alguno 
    					</div>
                      @endif 
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>     

<script>
  $(document).ready(function(e) {                                        
        $('button[rel="abrir"]').click(function(e) {
                            e.preventDefault();
                 
                var titulo = $(this).attr('titulo');//aca lo captura
                var descripcion = $(this).attr('descripcion');
                var fotouno = $(this).attr('fotouno');
                var fotodos = $(this).attr('fotodos');
                var fototres = $(this).attr('fototres');
                var iddddd = $(this).attr('idarticulo');
 
                //y si queres podes enviarla de vuelta a la pagina, hacia la ventana modal:
                document.getElementById("titulo_edit").value = titulo;//y aqui lo envias a la ventana modal con el id "per"
                document.getElementById("descripcion_edit").value = descripcion;
                document.getElementById("foto1_edit2").src = fotouno;
                document.getElementById("foto2_edit2").src = fotodos;
                document.getElementById("foto3_edit2").src = fototres;
                document.getElementById("iddddd").value = iddddd;
            });
    });
 
</script>

@endsection