<?php

class UsersController extends BaseController{

	public function __construct(){
		$this->beforeFilter('auth'); //bloque el acceso
	}

	public function getIndex(){
		$my_id = Auth::user()->id;
		$level = Auth::user()->level;

		//control de permiso solo para el usuario administrador
		if($level == 1){
			$users = DB::table('users')->where('level','<>','1')->where('id','<>',$my_id)->get();
			return View::make('users.index')->with('users',$users);
		}else{
			//control de usuario visitante
			return View::make('errors.access_denied_ad');
		}
	}

	    public function postCreate(){
		//validamos reglas inputs
		$rules = array(
			'name' => 'required|max:50',
			'last_name' => 'required|max:50',
			'email' => 'required|email|unique:users',
			'username' => 'required|max:50',
			'password' => 'required',
			);
		
		$validation = Validator::make(Input::all(), $rules);
		if($validation->fails())
		{		
		  //return Redirect::back()->with_input()->with_errors($validation);
			return Redirect::to('users')->with('status', 'error');
		}
		//si todo esta bien guardamos
		$password = Input::get('password');


		$user = new User;
	    $user->name = Input::get('name');
	    $user->last_name = Input::get('last_name');
	    $user->email = Input::get('email');
        $user->username = Input::get('username');
	    $user->level = Input::get('level');
        $user->password = Hash::make($password);
	    // guardamos
	    $user->save();

		//redirigimos a usurios
		return Redirect::to('users')->with('status', 'ok_create');
	}

	   //eliminar usuarios

	   public function getDelete($user_id){

		//buscamos el usuario segun su id 
		$user = User::find($user_id);
		//eliminamos
		$user->delete();
        //redirigimos
		return Redirect::to('users')->with('status', 'ok_delete');
	    }

	    public function postUpdate(){

	    $user_id = Input::get('user_id');
	    $user = User::find($user_id);

	    $user->name = Input::get('name_edit');
	    $user->last_name = Input::get('last_name_edit');
	    $user->email = Input::get('email_edit');
	    $user->username = Input::get('username_edit');
	    $user->level = Input::get('level_edit');

	    $user->save();

	    return Redirect::to('users')->with('status', 'ok_update');
	    }

    
    

}


?>