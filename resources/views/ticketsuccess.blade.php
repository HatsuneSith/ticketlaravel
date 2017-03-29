@extends('mainpage')
@section('encabezado')
	<h2><a href="{{ url('/') }}"><span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span></a>Sistema de control de incidencias</h2>
@stop

@section('contenido')
	<div class="jumbotron">
	  <h1>El ticket ha sido creado con exito</h1>
	  <p><a class="btn btn-primary btn-lg" href="{{ url('/') }}">Continuar</a></p>
	</div>
@stop