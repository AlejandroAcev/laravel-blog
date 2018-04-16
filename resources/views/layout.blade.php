<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="stylesheet"  href="/css/app.css">
	<title>Mi sitio</title>
</head>
<body>

	<header>

		<?php function activeMenu($url){
			return request()->is($url) ? 'active' : '';
		}?>

	</header>

	<!-- <nav class="navbar navbar-light bg-faded">
		<a class="navbar-brand" href="#">Blog</a>
		<div class="container">
			<ul class="nav navbar-nav">
				<li class="nav-item">
					<a class="nav-link {{ activeMenu('/') }}" href="{{ route('home') }}"> Inicio <span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item">
					<a class="nav-link {{ activeMenu('messages/create') }}" href="{{ route('messages.create') }}"> Contacto </a>
				</li>
				<li class="nav-item">
					<a class="nav-link {{ activeMenu('saludo*') }}" href="{{ route('saludo') }}">Saludo</a>
				</li>

				@if (auth()->check())
					<li class="nav-item">
						<a class="nav-link {{ activeMenu('messages*') }}" href="{{ route('messages.index') }}"> Mensajes </a>
					</li>
					
				@endif

				@if (auth()->guest())
					<li class="nav-item">
						<a class="nav-link {{ activeMenu('login') }}" href="/login"> Login </a>
					</li>
				@else
					<li class="nav-item">
						<a class="nav-link" href="/logout"> Logout </a>
					</li>
				@endif

				<li class="nav-item dropdown open nav-item nav-link">
					
					<div class="dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Dropdown
					</div>
					<div class="dropdown-menu" aria-labelledby="dropdownMenu1">
						<a class="dropdown-item" href="#">Action</a>
						<a class="dropdown-item" href="#">Action</a>
						<a class="dropdown-item" href="#">Action</a>
					</div>
					
				</li>

			</ul>

		</div>

		        
		<form class="form-inline navbar-form pull-right">
			<input class="form-control" type="text" placeholder="Search">
			<button class="btn btn-success-outline" type="submit">Search</button>
		</form> 
	</nav> -->

	<nav class="navbar navbar-light bg-faded">
		<a class="navbar-brand" href="#"><h1>Blog</h1></a>
		<ul class="nav navbar-nav centrar">
			<li class="nav-item">
				<a class="nav-link {{ activeMenu('/') }}" href="{{ route('home') }}"> Inicio <span class="sr-only">(current)</span></a>
			</li>
			<li class="nav-item">
				<a class="nav-link {{ activeMenu('messages/create') }}" href="{{ route('messages.create') }}"> Contacto </a>
			</li>
			<li class="nav-item">
				<a class="nav-link {{ activeMenu('saludo*') }}" href="{{ route('saludo') }}">Saludo</a>
			</li>

			@if (auth()->check())
				<li class="nav-item">
					<a class="nav-link {{ activeMenu('messages*') }}" href="{{ route('messages.index') }}"> Mensajes </a>
				</li>
				
			@endif

			@if (auth()->guest())
				<li class="nav-item">
					<a class="nav-link {{ activeMenu('login') }}" href="/login"> Login </a>
				</li>
			@else
				<li class="nav-item">
					<a class="nav-link" href="/logout"> Logout </a>
				</li>
			@endif
		</ul>

		<div class="pull-right">
			

			<form class="form-inline navbar-form pull-right">
				<div class="dropdown open">
					<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Dropdown
					</button>
					<div class="dropdown-menu" aria-labelledby="dropdownMenu1">
						<a class="dropdown-item" href="#">Action</a>
						<a class="dropdown-item" href="#">Action</a>
						<a class="dropdown-item" href="#">Action</a>
					</div>
				</div>
			</form>
		</div>
		
		
	</nav>


	
		
	<div class="container-fluid">
		@yield('contenido')
		<footer>
			<br>
			Copyright ® {{ date('Y') }}
		</footer>
	</div>

	<script src="/js/app.js" type="text/javascript"></script>

</body>
</html>


















