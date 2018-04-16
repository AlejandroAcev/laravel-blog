<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//Importamos el DB para poder realizar los trabajos sobre la base de datos
use DB;
use App\Message;

//Importar para anadir las fechas actuales a las consultas
use Carbon\Carbon;


class MessagesController extends Controller
{

    public function __constructor()
    {
        $this->middleware('auth', ['except' => ['create', 'store']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$messages = DB::table('messages')->get();
        $messages = Message::all();

        return view('messages.index', compact('messages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('messages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //metodo encargado de guardar los mensajes
        //Guardar
        //Para guardar un registro se utiliza DB::table('nombre_tabla') y pasamos un array con los datos
        /*DB::table('messages')->insert([
            'nombre' => $request->input('nombre'),
            'email' => $request->input('email'),
            'mensaje' => $request->input('mensaje'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);*/

        /*$message = new Message;
        $message->nombre = $request->input('nombre');
        $message->email = $request->input('email');
        $message->mensaje = $request->input('mensaje');
        $message->save();*/


        Message::create($request->all());
        
        //Redireccionar
        return redirect()->route('messages.create');
        
        
        //return $request->all();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        //$message = DB::table('messages')->where('id', $id)->first();

        //Con findOrFail se puede buscar un registro y en caso de estar vacio devuelve un error 404
        $message = Message::findOrFail($id);

        return view('messages.show', compact('message'));
        
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //$message = DB::table('messages')->where('id', $id)->first();
        $message = Message::findOrFail($id);
        

        return view('messages.edit', compact('message'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //Actualizar y redireccionar
        /*DB::table('messages')->where('id', $id)->update([
            'nombre' => $request->input('nombre'),
            'email' => $request->input('email'),
            'mensaje' => $request->input('mensaje'),
            'updated_at' => Carbon::now()

        ]);*/

        $message = Message::findOrFail($id);
        $message->update($request->all());

        $message = Message::findOrFail($id)->update($request->all());

        return redirect()->route('messages.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //DB::table('messages')->where('id', $id)->delete();
        $message = Message::findOrFail($id)->delete();


        return redirect()->route('messages.index');
    }
}
