<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/',function()
{
    return View::make('login');
});

Route::get('oets',function()
{
    return View::make('hello');
});

//login
Route::post('login','UserLogin@user');

//logout
Route::get('logout', function()
{
    Auth::logout();
    return Redirect::to('/');
});

// ruta de administracion
Route::get('admin', array('before' => 'auth', function()
{
    return View::make('package.index');	
}));



//rutas del sistema

Route::controller('package', 'PackageController');
Route::controller('users', 'UsersController');
Route::controller('articulos', 'ArticulosController');
Route::controller('user/getuser', 'getuserController');
Route::controller('articulo/getarticulo', 'getarticuloController');

?>























