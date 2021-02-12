@extends("../layouts.template")

@section("inicio")
@endsection
@section("cabecera")

	<h2>Listado de Cursos</h2>


<table border ="1">
	<tr>
		<th>Nombre</th>
		<th>Número alumnos</th>
		<th>Plazas disponibles</th>
		<th>Acciones</th>
	</tr>


	@foreach ($cursos as $curso)
	<tr>
		<td>{{ $curso->nombre }}</td>
		<td>{{ $curso->plazas }}</td>
		<td> @if (count($curso->alumno) >= $curso->plazas) No @else Si @endif</td>
		<td align="center">
			<button><a href="{{ route('cursos.edit', $curso->id)}}">Editar</a> </button> 
			<button><a href="{{ route('cursos.show', $curso->id)}}">Mostrar</a> </button>
			<form action="/cursos/{{$curso->id}}" method="post">
				@csrf
				@method("delete")
				<button type="submit" @if (count($curso->alumno) >0 ) disabled @endif>Borrar</button>
			</form>
	</td>
	</tr>
	@endforeach
	<tr>
		<td colspan="4" align="center"><a href="{{ route('cursos.create')}}">Nuevo curso</a></td>
	</tr>
</table>

@endsection
