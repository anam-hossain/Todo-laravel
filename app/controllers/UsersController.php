<?php
class UsersController extends BaseController 
{
	public function login() 
	{
		$credentials = array(
			'email' => 'anam@hotmail.com.au',
			    //'id' => 5 (when i use the ID, it works straight away)
			'password' => 'password',       
		);

		var_dump(Auth::validate($credentials));

		if (Auth::attempt($credentials)) {
			dd('loggedin');
		}
	}

	public function register()
	{
		//
	}

}