@extends('mainpage')
@section('encabezado')
	<h2><a href="{{ url('/') }}"><span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span></a>Sistema de control de incidencias</h2>
@stop

@section('contenido')
<div class="table-responsive">
	<table id="tabla_lista" class="table table-hover">
		<thead>
			<tr>
				<th>Estado</th>
				<th>Nivel de Urgencia</th>
				<th>Departamento</th>
				<th>Usuario</th>
				<th>Colaborador Asignado</th>
				<th>Fecha de apertura</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			@foreach($grupo as $dk)
			
						@if($dk->estado=='1')
				<tr class="info">
					<td><b>
						<span class="glyphicon glyphicon-info-sign" aria-hidden="true">Abierto</span>
						@endif
						@if($dk->estado=='2')
				<tr class="success">
					<td><b>
						<span class="glyphicon glyphicon-ok-sign" aria-hidden="true">Contestado</span>
						@endif
						@if($dk->estado=='9')
				<tr class="danger">
					<td><b>
						<span class="glyphicon glyphicon-remove-sign" aria-hidden="true">Cerrado</span>
						@endif
					</td></b>
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
						@if($dk->departamento=='1')
							Direccion
						@endif
						@if($dk->departamento=='2')
							Fundacion
						@endif
						@if($dk->departamento=='3')
							Gallbo
						@endif
						@if($dk->departamento=='4')
							Juridico
						@endif
					</td>
					<td>{{$dk->name_user}}</td>
					<td>{{$dk->name_tec}}</td>
					<td>{{$dk->created_at}}</td>
					<td>
						<a href="{{url('/responder')}}/{{$dk->id}}" class="btn btn-success btn-xs"><span class="glyphicon glyphicon-edit" aria-hidden="true">Ver ticket</span></a>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
</div>
	{!! $grupo->render() !!}
@stop