@extends('layout')

@section('contenido')
	
	<h1>Listado de mensajes:</h1>

	<div class="container-fluid">
		<table class="table">
			<thead>
				<tr>
					<th>ID</th>
					<th>Nombre</th>
					<th>Email</th>
					<th>Mensajes</th>
					<th>Acciones</th>
				</tr>
			</thead>
			<tbody>
				@foreach($messages as $message)
				<tr>
					<td>{{ $message->id }}</td>
					<td>
						<a href="{{ route('messages.show', $message->id) }}" >{{ $message->nombre }}</a>
					</td>
					<td>{{ $message->email }}</td>
					<td>{{ $message->mensaje }}</td>
					<td class="form-inline">
						<a class="btn btn-info" href="{{ route('messages.edit', $message->id) }}">Editar</a>
						<form action="{{ route('messages.destroy', $message->id) }}" method="POST" >
							
							{!! csrf_field() !!}
							{!! method_field('DELETE') !!}

							<button  class="btn btn-danger" type="submit">Eliminar</button>
							
						</form>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
@stop