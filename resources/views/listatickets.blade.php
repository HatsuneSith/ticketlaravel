@extends('mainpage')
@section('encabezado')
	<h2><a href="{{ url('/') }}"><span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span></a>Sistema de control de incidencias</h2>
@stop

@section('contenido')
<div class="table-responsive">
	<table id="tabla_lista" class="table table-hover">
		<thead>
			<tr>
				<th>#</th>
				<th>Estado</th>
				<th>Nivel de Urgencia</th>
				<th>Departamento</th>
				<th>Usuario</th>
				<th>Colaborador Asignado</th>
				<th>Fecha de Actualizacion</th>
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
					<td>{{$dk->id}}</td><td><b>
						<span class="glyphicon glyphicon-info-sign" aria-hidden="true">Abierto</span>
						@endif
						@if($dk->estado=='2')
				<tr class="success">
					<td>{{$dk->id}}</td><td><b>
						<span class="glyphicon glyphicon-ok-sign" aria-hidden="true">Contestado</span>
						@endif
						@if($dk->estado=='9')
				<tr class="danger">
					<td>{{$dk->id}}</td><td><b>
						<span class="glyphicon glyphicon-remove-sign" aria-hidden="true">Cerrado</span>
						@endif
					</td></b>
					<td>
						@if($dk->nivel=='3')
							<span>Alta</span>
						@endif
						@if($dk->nivel=='2')
							<span>Media</span>
						@endif
						@if($dk->nivel=='1')
							<span>Baja</span>
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
					<td>{{$dk->updated_at}}</td>
					<td>
						<a href="{{url('/responder')}}/{{$dk->id}}" class="btn btn-success btn-xs"><span class="glyphicon glyphicon-edit" aria-hidden="true">VerTicket</span></a>
					</td>
					@if(Auth::user()->rol == '1'|| Auth::user()->rol == '2')
					<td>
				      	
					    <!-- Trigger del modal -->
					    <button data-toggle="modal" data-target="#delegar_{{$dk->id}}" class="btn btn-info btn-xs"><span class="glyphicon glyphicon-edit" aria-hidden="true">DelegarTicket</span></button>

					    <!-- Modal -->
					    <div id="delegar_{{$dk->id}}" class="modal fade" role="dialog">
					      <div class="modal-dialog">
					        <div class="modal-content">
					          <div class="modal-header">
					            <button type="button" class="close" data-dismiss="modal">&times;</button>
					            <h4 class="modal-title">Delegar a coordinador</h4>
					          </div>
					          <h5><center>Selecciona a un coordinador</center></h5>
					          <div class="modal-footer">
					          @foreach($coo as $co)
						        <form method="POST" id="form_{{$dk->id}}_{{$co->id}}" action="{{url('/reasignar')}}">
						        <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
						        <input type="hidden" name="ticket_id" value="{{$dk->id}}"/>
						        <input type="hidden" name="new_col" value="{{$co->id}}"/>
						        <input type="hidden" name="new_dep" value="{{$co->departamento}}"/>
						        <a href="#" class=btn-default onclick="document.getElementById('form_{{$dk->id}}_{{$co->id}}').submit()">
						        @if($co->departamento=='1')
								Direccion
								@endif
								@if($co->departamento=='2')
								Fundacion
								@endif
								@if($co->departamento=='3')
								Gallbo
								@endif
								@if($co->departamento=='4')
								Juridico
								@endif
								_{{$co->name}}</a>
						        </form>
						      @endforeach
					          </div>
					        </div>  
					      </div>
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