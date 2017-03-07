@extends('mainpage')
@section('encabezado')
	<h2>Sistema de control de insidencias</h2>
@stop

@section('contenido')
<form class="form-horizontal">
  <fieldset>
    <legend>Nuevo Ticket</legend>
    <div class="form-group">
      <label for="select" class="col-lg-2 control-label">Naturaleza</label>
      <div class="col-lg-10">
        <select class="form-control" id="select">
          <option>Problema con el sistema / la pagina.</option>
          <option>Problema con la computadora</option>
          <option>Problema con las instalaciones</option>
          <option>Otror</option>
        </select>
      </div>
    </div>
    <div class="form-group">
      <label for="textArea" class="col-lg-2 control-label">Textarea</label>
      <div class="col-lg-10">
        <textarea class="form-control" rows="3" id="textArea"></textarea>
        <span class="help-block">A longer block of help text that breaks onto a new line and may extend beyond one line.</span>
      </div>
    </div>
    <div class="form-group">
      <label for="inputPassword" class="col-lg-2 control-label">Screenshot</label>
      <div class="col-lg-10">
        <input type="password" class="form-control" id="inputPassword" placeholder="link">
      </div>
    </div>
    <div class="form-group">
      <label class="col-lg-2 control-label">Nivel de urgencia</label>
      <div class="col-lg-10">
        <div class="radio">
          <label>
            <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1">
            Alta
          </label>
        </div>
        <div class="radio">
          <label>
            <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
            Mediana
          </label>
        </div>
        <div class="radio">
          <label>
            <input type="radio" name="optionsRadios" id="optionsRadios3" value="option3" checked="">
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