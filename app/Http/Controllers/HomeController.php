<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use DB;
use App\tabla1;
use App\tabla2;
use Input;
use Auth;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        return view('home');
    }

    public function nuevo(){

        return view('nuevoticket');
    }

    public function agregar_ticket(Request $request) {

        $item = new \App\tabla1;
        $user = Auth::user();
        
        $screen =$request->file('screenshot');
        $item ->naturaleza =$request->input('naturaleza');
        $item ->contenido =$request->input('contenido');
        $item ->estado = 'Open';
        $item ->users_id = $user->id;
        $item ->nivel = $request->input('nivel');
        
        $item ->save();

        //Accessar a la base de datos para cambiar el nombre del archivo en la database

        $screen->move('tickets/'. $item->id, $item->id.'.jpg');
        //$screen->move('screens/'. $item->id, $item->id.'.jpg'); 
        
        return view('ticketsuccess');
    }
}
