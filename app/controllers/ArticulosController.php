<?php

class ArticulosController extends BaseController{

      public function __construct(){
		$this->beforeFilter('auth'); //bloque el acceso
	}

	public function getIndex(){
		$my_id = Auth::user()->id;
		$level = Auth::user()->level;

		//control de permiso solo para el usuario administrador
		if($level == 1){
			$users = DB::table('users')->where('level','<>','1')->where('id','<>',$my_id)->get();
			$articulos = DB::table('articulos')->get();
			return View::make('articulos.articulos')->with('articulos',$articulos);
		}else{
			//control de usuario visitante
			//return View::make('errors.access_denied_ad');
			$articulos = DB::table('articulos')->get();
			return View::make('articulos.articulos')->with('articulos',$articulos);
		}
	}

		    public function postCreate(){
		//validamos reglas inputs
		$rules = array(
			'titulo' => 'required',
			'descripcion' => 'required',
			'creador' => 'required',
			'editor' => 'required',
			);
		
		$validation = Validator::make(Input::all(), $rules);
		if($validation->fails())
		{		
		  //return Redirect::back()->with_input()->with_errors($validation);
			return Redirect::to('articulos')->with('status', 'error');
		}
		//si todo esta bien guardamos

        //rutas temporales
        $rutaTemporal1 = $_FILES['foto1']['tmp_name'];
        $rutaTemporal2 = $_FILES['foto2']['tmp_name'];
        $rutaTemporal3 = $_FILES['foto3']['tmp_name'];

        //nombres de imagenes
        $nombreImagen1 = $_FILES['foto1']['name'];
        $nombreImagen2 = $_FILES['foto2']['name'];
        $nombreImagen3 = $_FILES['foto3']['name'];

        //rutas de destino
        $rutaDestino1 = 'img/articulos/'.$nombreImagen1;
        $rutaDestino2 = 'img/articulos/'.$nombreImagen2;
        $rutaDestino3 = 'img/articulos/'.$nombreImagen3;

        //insertar imagenes
        move_uploaded_file($rutaTemporal1, $rutaDestino1);
        move_uploaded_file($rutaTemporal2, $rutaDestino2);
        move_uploaded_file($rutaTemporal3, $rutaDestino3);
        


		$articulo = new Articulo;
	    $articulo->nombre_articulo = Input::get('titulo');
	    $articulo->descripcion_articulo = Input::get('descripcion');
	    $articulo->creado_por = Input::get('creador');
        $articulo->editado_por = Input::get('editor');
	    $articulo->foto_1 = $rutaDestino1;
	    $articulo->foto_2 = $rutaDestino2;
	    $articulo->foto_3 = $rutaDestino3;

	    // guardamos
	    $articulo->save();

		//redirigimos a usurios
		return Redirect::to('articulos')->with('status', 'ok_create');
	}

	    public function getDelete($id)
	    {
		//buscamos el usuario segun su id 
		//$articulo = Articulo::find($id);
	    $articulo = Articulo::where('id_articulo', '=', $id)->delete();
		//eliminamos
		//$articulo->delete();
        //redirigimos
		return Redirect::to('articulos')->with('status', 'ok_delete');
	    }

	    //controlador para actualizar datos del articulo
	    public function postUpdate(){

		$articulo_id = Input::get('id_articulo'); 

		$articulo = Articulo::find($articulo_id);
		
		$articulo->nombre_articulo = Input::get('titulo_edit');

		$articulo->descripcion_articulo = Input::get('descripcion_edit');

		if(Input::hasFile('foto1_edit')){
		 //$articulo->foto_1 = Input::get('foto1_edit');
			$rutaTemporal1 = $_FILES['foto1_edit']['tmp_name'];
			$nombreImagen1 = $_FILES['foto1_edit']['name'];
			$rutaDestino1 = 'img/articulos/'.$nombreImagen1;
			move_uploaded_file($rutaTemporal1, $rutaDestino1);
			$articulo->foto_1 = $rutaDestino1;
		}

		if(Input::hasFile('foto2_edit')){
		 //$articulo->foto_1 = Input::get('foto1_edit');
			$rutaTemporal2 = $_FILES['foto2_edit']['tmp_name'];
			$nombreImagen2 = $_FILES['foto2_edit']['name'];
			$rutaDestino2 = 'img/articulos/'.$nombreImagen2;
			move_uploaded_file($rutaTemporal2, $rutaDestino2);
			$articulo->foto_2 = $rutaDestino2;
		}

		if(Input::hasFile('foto3_edit')){
		 //$articulo->foto_1 = Input::get('foto1_edit');
			$rutaTemporal3 = $_FILES['foto3_edit']['tmp_name'];
			$nombreImagen3 = $_FILES['foto3_edit']['name'];
			$rutaDestino3 = 'img/articulos/'.$nombreImagen3;
			move_uploaded_file($rutaTemporal3, $rutaDestino3);
			$articulo->foto_3 = $rutaDestino3;
		}

        $articulo->editado_por = Input::get('editor');
		
        $articulo->save();

		return Redirect::to('articulos')->with('status', 'ok_update');
		
	}

}


?>