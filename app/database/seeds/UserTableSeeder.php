<?php


/**
* 
*/
class UserTableSeeder extends Seeder
{
	
	public function run(){

		DB::table('users')->delete();

		User::create(array(
            'name' => 'camila',
            'last_name' => 'fazekas',
            'email' => 'cami__11@hotmail.com',
            'username' => 'pochita',
            'level' => 1,
            'password' => Hash::make('amorcito')
			));

        //otro usuario
		User::create(array(
            'name' => 'joaquin',
            'last_name' => 'astudillo',
            'email' => 'joaquin.alonso.astudillo@gmail.com',
            'username' => 'jakeres',
            'level' => 0,
            'password' => Hash::make('7412365aaa')
			));
	} 

}




?>