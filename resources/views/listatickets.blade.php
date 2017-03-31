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
				@if(Auth::user()->rol == '1'|| Auth::user()->rol == '2')
				<th></th>
				@endif
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
					@if(Auth::user()->rol == '1'|| Auth::user()->rol == '2')
					<td>
				    <div class="btn-group">
				      <a href="#" class="btn btn-info btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
				        Delegar Ticket
				        <span class="caret"></span>
				      </a>
				      <ul class="dropdown-menu">
				      	@foreach($coo as $co)
				        <li>
				        <form method="POST" id="form_{{$dk->id}}_{{$co->id}}" action="{{url('/reasignar')}}">
				        <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
				        <input type="hidden" name="ticket_id" value="{{$dk->id}}"/>
				        <input type="hidden" name="new_col" value="{{$co->id}}"/>
				        <input type="hidden" name="new_dep" value="{{$co->departamento}}"/>
				        <a href="#" class=btn-default onclick="document.getElementById('form_{{$dk->id}}_{{$co->id}}').submit()">{{$co->name}}</a>
				        </form>
				        </li> 
				        @endforeach
				       </ul>
				    </div>
					</td>
					@endif
				</tr>
			@endforeach
		</tbody>
	</table>
</div>

	{!! $grupo->render() !!}
@stop