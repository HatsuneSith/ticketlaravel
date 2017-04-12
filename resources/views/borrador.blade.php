				      <!--<ul class="dropdown-menu">-->


				      	@foreach($coo as $co)
					    <!-- Trigger del modal -->
					    <button data-toggle="modal" data-target="#delegar_{{$dk->id}}_{{$co->id}}" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span>Delegar Ticket</button>

					    <!-- Modal -->
					    <div id="delegar_{{$dk->id}}_{{$co->id}}" class="modal fade" role="dialog">
					      <div class="modal-dialog modal-sm">
					        <div class="modal-content">
					          <div class="modal-header">
					            <button type="button" class="close" data-dismiss="modal">&times;</button>
					            <h4 class="modal-title">Delegar coordinador</h4>
					          </div>
					          <h5><center>Selecciona a quien quieres delegarle este ticket</center></h5>
					          <div class="modal-footer">
						        <form method="POST" id="form_{{$dk->id}}_{{$co->id}}" action="{{url('/reasignar')}}">
						        <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
						        <input type="hidden" name="ticket_id" value="{{$dk->id}}"/>
						        <input type="hidden" name="new_col" value="{{$co->id}}"/>
						        <input type="hidden" name="new_dep" value="{{$co->departamento}}"/>
						        <a href="#" class=btn-default onclick="document.getElementById('form_{{$dk->id}}_{{$co->id}}').submit()">{{$co->name}}</a>
						        </form>
					          </div>
					        </div>  
					      </div>
					    </div>
					    @endforeach



					    <!--
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
				        -->
				      <!--</ul>-->