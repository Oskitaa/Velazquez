@extends("../layouts.template")

@section("inicio")
@endsection
@section("cabecera")

	<h2>Listado de alumnos</h2>


<table border ="1">
	<tr>
		<th>Nombre</th>
		<th>Apellidos</th>
		<th>Acciones</th>
	</tr>


	@foreach ($alumnos as $alumno)
	<tr>
		<td>{{ $alumno->nombre }}</td>
		<td>{{ $alumno->apellidos }}</td>
		<td align="center">
			<button><a href="{{ route('alumnos.edit', $alumno->id)}}">Editar</a> </button> 
			<button><a href="{{ route('alumnos.show', $alumno->id)}}">Mostrar</a> </button>
			<form action="/alumnos/{{$alumno->id}}" method="post">
				@csrf
				@method("delete")
				<button type="submit">Borrar</button>
			</form>
	</td>
	</tr>
	@endforeach
	<tr>
		<td colspan="4" align="center"><a href="{{ route('alumnos.create')}}">Nuevo alumno</a></td>
	</tr>
</table>

@endsection
