<?php

class UsuariosController extends BaseController{


// método que se ejecuta por defecto
public function getIndex(){
	return 'Aqui podemos listar a los usuarios';
}

//método para mostrar un formulario de registro
public function getRegistrar(){
	echo 'aquí podemos registrar a los usuarios : </br>';
	echo Form::open(array('url' => 'usuarios/crear', 'method' => 'post'));
	echo Form::label('name',' Nombre : ');
	echo Form::text('nombre');
	echo Form::submit('Registrar');
	echo Form::close();
}

//método para registrar y crear el usuario
public function postCrear(){
	//recibimos la variable enviada por el formulario con el método post
	$nombre = Input::get('nombre');
	return 'usuario registrado '.$nombre;
}

public function getPerfil(){
	return 'Aquí podemos mostrar el perfil del usuario : ';
}

public function getPrincipal(){
	//return View::make('principal')->with('nombre','juan');
	return Redirect::to('usuarios/principal2')->with('mensaje','error al acceder');
}

public function getPrincipal2(){
	return View::make('principal2',array('nombre'=>'pepito','apellido'=>'astudillo'));
}



}

?>