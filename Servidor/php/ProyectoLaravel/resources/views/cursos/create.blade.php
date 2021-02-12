@extends("../layouts.template")

@section("cabecera")
	
	<h2>Insertar un nuevo Curso</h2>
	
	<form method="post" action="/cursos">
		@csrf
		<table>
			<tr>
				<td>Nombre: <input type="text" name="nombre"></td>
				<td>Horas curso: <input type="text" name="horas"></td>
				<td>Número de plazas: <input type="text" name="plazas"></td>	
				<select name="categoria">
					<option value="">Seleccione una categoria</option>
					@foreach($categorias as $categoria)
					<option value={{$categoria->id}} >{{$categoria->nombre}}</option>
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
