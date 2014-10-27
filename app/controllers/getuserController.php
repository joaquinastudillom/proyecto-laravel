<?php

class getuserController extends BaseController {

    public function postData()
    {
	   $user_id = Input::get('user');
  
       $user = User::find($user_id);
	   
	 
		
        $data = array(
            'success' => true,
            'id' => $user->id,
			'name' => $user->name,
            'last_name' => $user->last_name,
			'email' => $user->email,
			'username' => $user->username,
			'level' => $user->level
			
        );
        
        return Response::json($data);
		
    }

}


?>