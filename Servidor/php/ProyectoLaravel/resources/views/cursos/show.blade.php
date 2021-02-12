@extends("../layouts.template")

@section("cabecera")

<h2>Información del curso</h2>

<table border ="1">
	
<tr>
		<th>Nombre</th>
		<th>Horas</th>
        <th>Plazas</th>
        <th>Alumnos</th>
	</tr>
	<tr>
        @foreach($curso as $a)
            <td>{{$a->nombre}}</td>
            <td>{{$a->horas}}</td>
            <td>{{$a->plazas}}</td>
            <td>
            @foreach($a->Alumno as $b)
                <a href="/alumnos/{{$b->id}}">{{$b->nombre}}</a>
            @endforeach
            </td>
        @endforeach
	</tr>
	<tr>
		<td colspan="4"><a href="/cursos">Volver</a></td>
	</tr>
</table>
@endsection 

