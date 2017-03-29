@extends('mainpage')
@section('encabezado')
	<h2>Sistema de control de incidencias</h2>
@stop

@section('contenido')
		<ul class="list-inline menu-opciones">
			<li >
				<a href="{{url('/nuevo_ticket')}}" class="thumbnail btn-info" autofocus >
					<span class="glyphicon glyphicon glyphicon-edit" aria-hidden="true"></span>
					<h3>Nuevo Ticket</h3>
				</a>
			</li>
			<li>
				<a href="{{url('/seguir')}}" class="thumbnail btn-info">
					<span class="glyphicon glyphicon glyphicon-share" aria-hidden="true"></span>
					<h3>Seguir Ticket</h3>
				</a>	
			</li>
			@if (!Auth::guest())
	        @if(Auth::user()->rol == '1'|| Auth::user()->rol == '2'|| Auth::user()->rol == '3')
			<li>
				<a href="{{url('/lista')}}" class="thumbnail btn-info">
					<span class="glyphicon glyphicon glyphicon-list" aria-hidden="true"></span>
					<h3>Lista de Tickets</h3>
				</a>	
			</li>
	        @endif
	        @endif
		</ul>
@stop