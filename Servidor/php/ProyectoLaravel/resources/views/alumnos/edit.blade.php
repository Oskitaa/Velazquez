@extends("../layouts.template")

@section("inicio")
@endsection
@section("cabecera")
	<h2>Actualizar alumno</h2>

	<form method="post" action="/alumnos/{{ $alumno->id }}">
		@method("PUT")
		@csrf
		<table>
			<tr>
				<td>Nombre</td>
				<td><input type="text" name="nombre" value="{{ $alumno->nombre }}"></td>
			</tr>
			<tr>
				<td>Apellidos</td>
				<td><input type="text" name="apellidos" value="{{ $alumno->apellidos }}"></td>
			</tr>
			<tr>
				<td colspan="2" align="center"><input type="submit" name="enviar" value="Actualizar"></td>
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