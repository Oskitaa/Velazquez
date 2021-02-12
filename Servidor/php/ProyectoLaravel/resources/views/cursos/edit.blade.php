@extends("../layouts.template")

@section("inicio")
@endsection
@section("cabecera")
	
	<h2>Actualizar curso</h2>

	<form method="post" action="/cursos/{{ $curso->id }}">
		@method("PUT")
		@csrf
		<table>
			<tr>
				<td>Nombre: <input type="text" name="nombre" value={{$curso->nombre}}></td>
				<td>Horas curso: <input type="text" name="horas" value={{$curso->horas}}></td>
				<td>Número de plazas: <input type="text" name="plazas" value={{$curso->plazas}}></td>
				<select name="categoria">
					<option value="">Seleccione una categoria</option>
					@foreach($categorias as $categoria)
					<option value={{$categoria->id}} @if ($curso->categoria == $categoria->id) selected @endif>{{$categoria->nombre}}</option>
					@endforeach
				</select>
			</tr>
			<tr>
				<td colspan="4" align="center"><input type="submit" name="enviar" value="Enviar"></td>
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