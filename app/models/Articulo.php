<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Articulo extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'articulos';
	//recordad cambiar para que eloquent lo detecte!
	protected $primaryKey = 'id_articulo';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */

	//protected $hidden = array('password', 'remember_token');

}