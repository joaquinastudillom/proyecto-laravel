<?php

class getarticuloController extends BaseController {

    public function postData()
    {

       $articulo_id = Input::get('user');
  
       $articulo = Articulo::find($user_id);
       
     
        
        $datos = array(
            'success' => true,
            'id' => $articulo->id_articulo,
            'nombre' => $articulo->nombre_articulo
            
        );
        
        return Response::json($data);
		
    }

}


?>