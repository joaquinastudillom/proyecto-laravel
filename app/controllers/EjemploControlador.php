<?php

class EjemploControlador extends BaseController{

public function mostrarIndex(){
	return View::make('hello');
}

public function mostrarMensaje(){
	return 'mensaje desde el controlador';
}

public function mostrarNombre($nombre){
    return $nombre;
}

}

?>
