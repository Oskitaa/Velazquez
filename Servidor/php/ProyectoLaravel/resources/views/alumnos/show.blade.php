@extends("../layouts.template")

@section("cabecera")
	<h2>Información del alumno</h2>

<table border ="1">
	
<tr>
		<th>Nombre</th>
		<th>Apellidos</th>
		<th>Edad</th>
		<th>Curso</th>
	</tr>
	<tr>


		<td>{{ $alumno->nombre }}</td>
		<td>{{ $alumno->apellidos }}</td>
		<td>{{ $alumno->edad }}</td>
		<td>{{$curso->nombre}}</td>


	</tr>
	<tr>
		<td colspan="4"><a href="/alumnos">Volver</a></td>
	</tr>
</table>
@endsection 
