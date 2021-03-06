<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Principal</title>
	<link rel="stylesheet" href="{{asset("css/personal.css")}}">
	<link rel="stylesheet" href="{{asset("css/bootstrap.css")}}">
	<link rel="stylesheet" href="{{asset("css/jquery.dataTables.min.css")}}">
	<script src="{{ asset('js/jquery.js') }}"></script>
	<script src="{{ asset('js/datatable.js') }}"></script>
	<script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
	
</head>
<body>
	<nav class="navbar navbar-default">
	  <div class="container-fluid">
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	      <a class="navbar-brand" href="{{url('/')}}">Insidencias</a>
	    </div>

	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	      <ul class="nav navbar-nav">
	        <li class="active"><a href="{{url('/nuevo_ticket')}}">Nuevo Ticket<span class="sr-only">(current)</span></a></li>
	        <li><a href="{{url('/seguir')}}">Seguir Ticket</a></li>
  
	        @if (!Auth::guest())
	        @if(Auth::user()->rol == '1'|| Auth::user()->rol == '2'|| Auth::user()->rol == '3')
	        <li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Admin <span class="caret"></span></a>
	          <ul class="dropdown-menu" role="menu">
	            <li><a href="{{url('/usuario/1')}}">Testing Usuario 1</a></li>
	            <li><a href="{{url('/usuario/2')}}">Testing Usuario 2</a></li>
	            <li><a href="{{url('/usuario/3')}}">Testing Usuario 2</a></li>
	            <li class="divider"></li>
	            <li><a href="{{url('/lista')}}">Lista de insidencias</a></li>
	          </ul>
	        </li>
	        @endif
	        @endif
	      </ul>
	      <ul class="nav navbar-nav navbar-right">
	        
            @if (Auth::guest())
                <li><a href="{{ url('/login') }}">Login</a></li>
                <li><a href="{{ url('/register') }}">Register</a></li>
            @else
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                    </ul>
                </li>
            @endif

	      </ul>
	    </div>
	  </div>
	</nav>
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				@yield('encabezado')
				<hr>
				@yield('contenido')
			</div>
		</div>
	</div>
	<footer>
		<hr>
		<div class="text-center">Fundacion Markoptic &copy; 2017</div>
	</footer>
	<script src="{{ asset('js/bootstrap.js') }}"></script>
	<!--
	<script src="{{ asset('js/promocion.js') }}"></script>
	<script src="{{ asset('js/funciones.js') }}"></script>
	</script>
	-->
</body>
</html>