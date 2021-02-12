@extends("../layouts.template")

@section("cabecera")
	<h2>Insertar un nuevo alumno</h2>

	<form method="post" action="/alumnos">
		@csrf
		<table>
			<tr>
				<td>Nombre<input type="text" name="nombre"></td>
			</tr>
			<tr>
				<td>Apellidos<input type="text" name="apellidos"></td>
			</tr>
			<tr>
			<td>Edad<input type="text" name="edad"></td>
			</tr>
			<tr>
			<select name="curso">
					<option value="">Seleccione un curso</option>
					@foreach($cursos as $curso)
					<option value={{$curso->id}} >{{$curso->nombre}}</option>
					@endforeach
				</select></tr>
			<tr>
				<td colspan="2" align="center"><input type="submit" name="enviar" value="Enviar"></td>
			</tr>
		</table>
	</form>
	@if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
	@endif
@endsection 

