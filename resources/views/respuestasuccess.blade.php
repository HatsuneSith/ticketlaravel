@extends('mainpage')
@section('encabezado')
	<h2>Sistema de control de incidencias</h2>
@stop

@section('contenido')
	<div class="jumbotron">
	  <h1>El ticket fue respondido con exito</h1>
	  <p><a class="btn btn-primary btn-lg" href="{{ url('/') }}">Continuar</a></p>
	</div>
@stop