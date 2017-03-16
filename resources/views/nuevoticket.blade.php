@extends('mainpage')
@section('encabezado')
  <h2>Sistema de control de incidencias</h2>
@stop

{{-- Comment: Necesita darle forma y empezar a moverle. --}}

@section('contenido')
<form class="form-horizontal" method="POST" action="{{url('/agregar_ticket')}}" enctype="multipart/form-data">
  <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
  <fieldset>
    <legend>Nuevo Ticket</legend>
    <div class="form-group">
      <label for="select" class="col-lg-2 control-label">Departamento</label>
      <div class="col-lg-10">
        <select class="form-control" id="select" name="departamento">
          <option value="1">Direccion</option>
          <option value="2">Fundacion</option>
          <option value="3">Gallbo</option>
          <option value="4">Juridico</option>
        </select>
      </div>
    </div>
    <div class="form-group">
      <label for="descripcion" class="col-lg-2 control-label">Descripcion</label>
      <div class="col-lg-10">
        <textarea class="form-control" rows="3" id="textArea" name="contenido" placeholder="Explica el problema, asi como en que momento se manifiesta."></textarea>
      </div>
    </div>
    <div class="form-group">
      <label for="screenshotlabel" class="col-lg-2 control-label">Screenshot / Foto</label>
      <div class="col-lg-10">
        <div class="fileUpload btn">
          <input  id="uploadBtn" type="file" class="upload" name="screenshot">
        </div>
      </div>
    </div>
    <div class="form-group">
      <label class="col-lg-2 control-label">Nivel de urgencia</label>
      <div class="col-lg-10">
        <div class="radio">
          <label>
            <input type="radio" id="Radios1" value="3" name="nivel">
            Alta
          </label>
        </div>
        <div class="radio">
          <label>
            <input type="radio" id="Radios2" value="2" name="nivel">
            Mediana
          </label>
        </div>
        <div class="radio">
          <label>
            <input type="radio" id="Radios3" value="1" name="nivel" checked="">
            Baja
          </label>
        </div>
      </div>
    </div>
    <div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
        <button type="reset" class="btn btn-default">Cancel</button>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </div>

  </fieldset>
</form>
@stop