@extends('mainpage')
@section('encabezado')
  <h2>Sistema de control de incidencias</h2>
@stop

@section('contenido')
<div class="container-fluid">
  <div class="row content">

    <div class="col-sm-9">
      
      <h4><small>Ticket Original</small></h4>
      <h5>
      @if($ticket->rol=='1')
          <span class="label label-danger">Directivo</span>
      @endif
      @if($ticket->rol=='2')
          <span class="label label-primary">Administrador</span>
       @endif
      @if($ticket->rol=='3')
          <span class="label label-success">Colaborador</span>
      @endif
      @if($ticket->rol=='4')
          <span class="label label-info">Empleado</span>
      @endif
      <span class="glyphicon glyphicon-time"></span> {{$ticket->name_user}}, {{$ticket->created_at}}.</h5>
      <h5>
      @if($ticket->nivel=='3')
          <span class="label label-danger">Prioridad Alta</span>
      @endif
      @if($ticket->nivel=='2')
          <span class="label label-primary">Prioridad Media</span>
       @endif
      @if($ticket->nivel=='1')
          <span class="label label-success">Prioridad Baja</span>
      @endif
      </h5><br>
      <p>{{$ticket->contenido}}</p>

      @if(file_exists(public_path().'/tickets/'.$ticket->id.'/'.$ticket->id.'a.jpg'))
      <!-- Trigger del modal (imagen miniatura) -->
      <img data-toggle="modal" data-target="#ticketModal" src="{{ asset('../public/tickets/')}}/{{$ticket->id}}/{{$ticket->id}}a.jpg" class="img-responsive" height="100" width="100">

      <!-- Modal (imagen en grande)-->
      <div id="ticketModal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Imagen Adjunta</h4>
            </div>
              <img data-toggle="modal" data-target="#ticketModal" src="{{ asset('../public/tickets/')}}/{{$ticket->id}}/{{$ticket->id}}a.jpg" class="img-responsive">
            <div class="modal-footer">
              <a href="{{ asset('../public/tickets/')}}/{{$ticket->id}}/{{$ticket->id}}a.jpg" type="button" class="btn btn-default">Tamaño Completo</a>
            </div>
          </div>  
        </div>
      </div>

      @else
      <br><small>No hay archivo adjunto.</small>
      @endif


      <!-- Aqui empiezan las respuestas -->


      <hr>
      <h4>Respuestas</h4>
      @foreach($respuestas as $res)
      <h5>
      @if($res->rol=='1')
          <span class="label label-danger">Directivo</span>
      @endif
      @if($res->rol=='2')
          <span class="label label-primary">Coordinador</span>
       @endif
      @if($res->rol=='3')
          <span class="label label-success">Tecnico</span>
      @endif
      @if($res->rol=='4')
          <span class="label label-info">Empleado</span>
      @endif
      <span class="glyphicon glyphicon-time"></span> Respuesta de {{$res->name_user}}, {{$res->created_at}}.</h5>
      <h5></h5><br>
      <p>{{$res->contenido}}</p>

      @if(file_exists(public_path().'/tickets/'.$ticket->id.'/'.$res->id.'b.jpg'))
      <!-- Trigger del modal (imagen miniatura) -->
      <img data-toggle="modal" data-target="#my{{$res->id}}" src="{{ asset('../public/tickets/')}}/{{$ticket->id}}/{{$res->id}}b.jpg" class="img-responsive" height="100" width="100">

      <!-- Modal (imagen en grande)-->
      <div id="my{{$res->id}}" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Imagen Adjunta</h4>
            </div>
              <img data-toggle="modal" data-target="#my{{$res->id}}" src="{{ asset('../public/tickets/')}}/{{$ticket->id}}/{{$res->id}}b.jpg" class="img-responsive">
            <div class="modal-footer">
              <a href="{{ asset('../public/tickets/')}}/{{$ticket->id}}/{{$res->id}}b.jpg" type="button" class="btn btn-default">Tamaño Completo</a>
            </div>
          </div>  
        </div>
      </div>

      @else
      <br><small>No hay archivo adjunto.</small>
      @endif

      <br>
      @endforeach

      <hr>

      <!-- Aqui empieza la zona para responder -->

      @if(!($ticket->estado == '9'))

      <form role="form" method="POST" action="{{url('/agregar_respuesta')}}" enctype="multipart/form-data">
        <h4>Responder al ticket:</h4>
        @if(Auth::user()->rol == '1'|| Auth::user()->rol == '2'|| Auth::user()->rol == '3')
        <label>
          <input name="cerrar" value= '1' type="checkbox"> Cerrar ticket
        </label>
        @endif
        <input name="id_ins" type="hidden" value="{{$ticket->id}}"/>
        <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
        <div class="form-group">
          <textarea name="contenido" class="form-control" rows="3" required></textarea>
        </div>
        <div class="fileUpload btn">
          <input  id="uploadBtn" type="file" class="upload" name="screenshot">
        </div>
      <button type="submit" class="btn btn-success">Contestar ticket</button>
      </form>
      <br><br>
      @endif
    </div>

    @if(Auth::user()->rol == '1'|| Auth::user()->rol == '2')
    <!-- Trigger del modal (imagen miniatura) -->
    <button data-toggle="modal" data-target="#myDelete" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span>Eliminar Ticket</button>

    <!-- Modal (imagen en grande)-->
    <div id="myDelete" class="modal fade" role="dialog">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Eliminar Ticket</h4>
          </div>
          <h5><center>¿Seguro que quieres eliminar el ticket?</center></h5>
          <div class="modal-footer">
            <a href="{{url('/eliminar_ticket')}}/{{$ticket->id}}" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove" aria-hidden="true">Eliminar</span></a>
            <button type="button" class="btn btn-success btn-xs" data-dismiss="modal"><span class=" glyphicon glyphicon-ban-circle" aria-hidden="true">Cancelar</span></button>
          </div>
        </div>  
      </div>
    </div>
    @endif   

  </div>
</div>

@stop