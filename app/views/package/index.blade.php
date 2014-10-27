@extends('layout.admin')

@section('titu')
Inicio <i class="fa fa-dashboard fa-fw"></i>
@endsection

@section('contento')

<?php $status = Session::get('status'); ?> 

<div class="panel panel-green">
                        <div class="panel-heading">
                            
                            <h4>Bienvenido al Inicio {{Auth::user()->name}} !</h4> 

                        </div>
                        <div class="panel-body">

                            <i class="fa fa-comments fa-4x"></i>
                            
                            <div id="saludo" style="margin-top: -50px;margin-left: 80px;">  
                            <p>
                            
                            	<b> Este es su panel de administración de su sitio web, en el cual
                            	    usted podrá editar
                            	    @if(Auth::user()->level == 1)  
                            	    los usuarios que tienen  acceso al panel y 
                            	    @endif 
                            	    los articulos que podrá publicar en su sitio web !</b>
                            </p>
                            </div>

                        </div>
                        <div class="panel-footer" style="margin-top: 20px;">
                            Consultas a Joaquín Astudillo Mujica <i class="fa fa-smile-o"></i>
                        </div>
</div>

@endsection

