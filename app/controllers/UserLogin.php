<?php
 
class UserLogin extends BaseController {
 
    public function user()
    {
        // get POST data
        $userdata = array(
            'username' => Input::get('username'),
            'password' => Input::get('password')
        );
 
        if(Auth::attempt($userdata))
        {
            // we are now logged in, go to admin
            return Redirect::to('admin');
        }
        else
        {
            
			return Redirect::to('/')->with('login_errors',true);
        }
    }

    public function getRememberToken(){
    
    return $this->remember_token;
    
    }

    public function setRememberToken($value){
    
    $this->remember_token = $value;
    
    }

    public function getRememberTokenName(){
    
    return 'remember_token';

    }
}

?>