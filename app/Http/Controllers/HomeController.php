<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use DB;
use App\incidencias;
use App\respuestas;
use App\User;
//use Input;
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


        $item = new \App\incidencias;
        $user = Auth::user();

        //Primero se decide a que tecnico se le asignara el ticket.
        //Este query devuelve la lista de tecnicos con cuantos tickets ya tiene asignados a el.
        //No toma estados que no sean Open o Answered.

        $tech = DB:: table('users')
            ->leftjoin('incidencias', 'users.id', '=', 'incidencias.asignado')
            ->where('incidencias.estado', 1)
            ->orWhere('incidencias.estado', 2)
            ->orWhere('incidencias.estado', null)
            ->select(DB::raw('count(incidencias.asignado) as tec_count, users.id, users.rol'))
            ->where('users.rol', 3)
            ->groupBy('users.id')
            ->orderBy('tec_count', 'asc')
            ->first();

        //Ahora se guarda todo sobre el ticket
        $screen =$request->file('screenshot');
        $item ->naturaleza =$request->input('naturaleza');
        $item ->contenido =$request->input('contenido');
        $item ->estado = 1;
        $item ->users_id = $user->id;
        $item ->nivel = $request->input('nivel');
        $item ->asignado = $tech->id;
        $item ->save();

        if (!empty($screen))
            $screen->move('tickets/'. $item->id, $item->id.'a.jpg');

        return view('ticketsuccess');
    }


    public function agregar_respuesta(Request $request) {


        $item = new \App\respuestas;
        $user = Auth::user();

        //Ahora se guarda todo sobre la respuesta
        $screen =$request->file('screenshot');
        $item ->contenido =$request->input('contenido');
        $item ->users_id = $user->id;
        $item ->incidencias_id = $request->input('id_ins');
        $item ->save();

        $contestado = incidencias::find($request->input('id_ins'));
        if ($request->cerrar == 1)
            $contestado->estado = 9;
        else
            $contestado->estado = 2;
        $contestado->save();

        if (!empty($screen))
            $screen->move('tickets/'. $request->input('id_ins'), $item->id.'b.jpg');

        return view('respuestasuccess');
    }


    public function lista_ticket() {

        $grupo=DB::table('incidencias')
        ->leftJoin('users', 'incidencias.users_id', '=', 'users.id')
        ->leftJoin('users as tec', 'incidencias.asignado', '=', 'tec.id')
        ->select('incidencias.id as id','incidencias.users_id as un_id','users.name as name_user', 'incidencias.naturaleza as naturaleza', 'incidencias.estado as estado', 'incidencias.asignado as asignado', 'incidencias.contenido as contenido', 'incidencias.nivel as nivel', 'incidencias.created_at as created_at','incidencias.updated_at as updated_at', 'tec.name as name_tec')
        ->paginate(20);

    return view('listatickets', compact('grupo'));
    }

    public function seguir_ticket() {

        $user = Auth::user();

        $grupo=DB::table('incidencias')
        ->leftJoin('users', 'incidencias.users_id', '=', 'users.id')
        ->leftJoin('users as tec', 'incidencias.asignado', '=', 'tec.id')
        ->select('incidencias.id as id','incidencias.users_id as un_id','users.name as name_user', 'incidencias.naturaleza as naturaleza', 'incidencias.estado as estado', 'incidencias.asignado as asignado', 'incidencias.contenido as contenido', 'incidencias.nivel as nivel', 'incidencias.created_at as created_at','incidencias.updated_at as updated_at', 'tec.name as name_tec')
        ->where('users.id',$user->id)
        ->paginate(20);

    return view('listatickets', compact('grupo'));
    }

    public function responder_ticket($id) {

        $ticket=DB::table('incidencias')
        ->leftJoin('users', 'incidencias.users_id', '=', 'users.id')
        ->leftJoin('users as tec', 'incidencias.asignado', '=', 'tec.id')
        ->select('incidencias.id as id','incidencias.users_id as un_id','users.name as name_user','users.rol as rol', 'incidencias.naturaleza as naturaleza', 'incidencias.estado as estado', 'incidencias.asignado as asignado', 'incidencias.contenido as contenido', 'incidencias.nivel as nivel', 'incidencias.created_at as created_at','incidencias.updated_at as updated_at', 'tec.name as name_tec')
        ->where('incidencias.id',$id)
        ->first();
        
        $respuestas=DB::table('respuestas')
        ->leftJoin('users', 'respuestas.users_id', '=', 'users.id')
        ->select('respuestas.id as id','respuestas.users_id as users_id','respuestas.incidencias_id as in_id','users.name as name_user','users.rol as rol','respuestas.contenido as contenido','respuestas.created_at as created_at')
        ->where('respuestas.incidencias_id', $id)
        ->orderBy('created_at','asc')
        ->get();

    return view('responderticket', compact('respuestas','ticket'));
    }


    public function eliminar_ticket($id){
        incidencias::find($id)->delete();
        DB:: table('respuestas')
        ->where('incidencias_id')
        ->delete();
    return redirect()->back();
    }



    //
    //
    // DEBUGGING
    //
    //
}
