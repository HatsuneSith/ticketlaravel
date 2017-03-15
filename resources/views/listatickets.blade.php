@extends('mainpage')
@section('encabezado')
	<h2>Sistema de control de incidencias</h2>
@stop

@section('contenido')
	<table class="table table-hover">
		<thead>
			<tr>
				<th>Estado</th>
				<th>Nivel de Urgencia</th>
				<th>Naturaleza</th>
				<th>Usuario</th>
				<th>Tecnico Asignado</th>
				<th>Fecha de apertura</th>
			</tr>
		</thead>
		<tbody>
			@foreach($grupo as $dk)
			@if(Auth::user()->rol == '1'|| Auth::user()->rol == '2'|| Auth::user()->name == $dk->name_tec)
				<tr>
					<td>
						@if($dk->estado=='1')
							Abierto
						@endif
						@if($dk->estado=='2')
							Contestado
						@endif
						@if($dk->estado=='9')
							Cerrado
						@endif
					</td>
					<td>
						@if($dk->nivel=='3')
							Alta
						@endif
						@if($dk->nivel=='2')
							Media
						@endif
						@if($dk->nivel=='1')
							Baja
						@endif
					</td>
					<td>
						@if($dk->naturaleza=='1')
							Problema con el sistema/pagina.
						@endif
						@if($dk->naturaleza=='2')
							Problema con la computadora.
						@endif
						@if($dk->naturaleza=='3')
							Problema con las instalaciones.
						@endif
						@if($dk->naturaleza=='4')
							Problema con otro departamento.
						@endif
						@if($dk->naturaleza=='99')
							Otros.
						@endif
					</td>
					<td>{{$dk->name_user}}</td>
					<td>{{$dk->name_tec}}</td>
					<td>{{$dk->created_at}}</td>
					<td>
						<a href="{{url('/responder')}}/{{$dk->id}}" class="btn btn-success btn-xs"><span class="glyphicon glyphicon-edit" aria-hidden="true">Responder</span></a>

						@if(Auth::user()->rol == '1'|| Auth::user()->rol == '2'|| Auth::user()->rol == '3')
						<a href="{{url('/eliminar_ticket')}}/{{$dk->id}}" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove" aria-hidden="true">Eliminar</span></a>
						@endif
					</td>
				</tr>
			@endif
			@endforeach
		</tbody>
	</table>
	{!! $grupo->render() !!}
@stop