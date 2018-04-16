<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*
Route::get('/', ['as' => 'home', function () {
    return view('home');
}]);


//El primer valor indica la URL que sera la que este a la vista
//mientras que el segundo parametro seguido del as => es la referencia que se 
//mantendra en el resto de las paginas html para evitar cambiar el codigo
Route::get('contactos', ['as' => 'contactos', function () {
    return view('contactos');
}]);


//Parametros obligatorios y opcionales
Route::get("saludos/{nombre?}", ['as' => 'saludos', function($nombre = "invitado") {
	//return view("saludo", ['nombre' => $nombre]);
	//return view("saludo") -> with(['nombre' => $nombre]);
	
	$html = "<h2>Contenido html en el router</h2>";
	//$script = "<script>alert('Un script')</script>";
	$consolas =  ["play station", "xbox", "wii"];

	return view("saludo", compact('nombre', 'html', 'script', 'consolas'));

}])->where('nombre', "[A-Za-z]+");
*/

/**
	Rutas hechas utilizando el formato con controller
*/
//De esta forma la peticion request comprueba la peticon, hace la comprobacion y responde en consecuencia
Route::get('/', ['as' => 'home', 'uses' => 'PagesController@home'])->middleware('example');
Route::get('saludo/{nombre?}', ['as' => 'saludo', 'uses' => 'PagesController@saludo'])->where('nombre', "[A-Za-z]+");

Route::resource('messages', 'MessagesController');

Route::get('login', 'Auth\LoginController@showLoginForm');
Route::post('login', 'Auth\LoginController@login');

Route::get('logout', 'Auth\LoginController@logout');


Route::get('test', function(){
	$user =  new App\User;
	$user->name = 'Alejandro';
	$user->email = 'alej.acev.gonz@gmail.com';
	$user->password = bcrypt('123123');
	$user->save();

	return $user;
});
/*Route::get('messages', ['as' => 'messages.index', 'uses' => 'MessagesController@index']);
Route::get('messages/create', ['as' => 'messages.create', 'uses' => 'MessagesController@create']);
Route::post('messages', ['as' => 'messages.store', 'uses' => 'MessagesController@store']);
Route::get('messages/{id}', ['as' => 'messages.show', 'uses' => 'MessagesController@show']);
Route::get('messages/{id}/edit', ['as' => 'messages.edit', 'uses' => 'MessagesController@edit']);
Route::put('messages/{id}', ['as' => 'messages.update', 'uses' => 'MessagesController@update']);
Route::delete('messages/{id}', ['as' => 'messages.destroy', 'uses' => 'MessagesController@destroy']);*/



