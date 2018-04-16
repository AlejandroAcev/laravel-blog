<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateMessageRequest;

class PagesController extends Controller
{
    //
    protected $request;


    
    public function __construct()
    {
    	//Un array con los metodos al los que quiere que se apliquen
    	$this->middleware('example', ['only' => ['home']]);

    	//Para anadirlo en todos menos en los especificados
    	$this->middleware('example', ['except' => ['home']]);

    }

    public function home(){
    	return view('home');
    }


    public function saludo($nombre = "Invitado"){

    	$html = "<h2>Contenido html en el router</h2>";
		//$script = "<script>alert('Un script')</script>";
		$consolas =  ["play station", "xbox", "wii"];

		return view("saludo", compact('nombre', 'html', 'script', 'consolas'));

    }


}
