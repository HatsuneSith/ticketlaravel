@extends('mainpage')
@section('encabezado')
	<h2>Sistema de control de incidencias</h2>
@stop

@section('contenido')
	<div class="jumbotron">
	  <h1>Markoptic</h1>
	  <p>Reporte de problemas.</p>
	  <p><a class="btn btn-primary btn-lg" href="{{ url('/nuevo_ticket') }}">Reportar un problema</a></p>
	</div>
@stop