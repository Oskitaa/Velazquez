@extends("../layouts.template")


@section("inicio")
@endsection

@section("cabecera")
	<h2>Insertar categoria</h2>


	<form method="post" action="/categorias">
		@csrf
		@method("post")
		<table>
			<tr>
				<td>Nombre</td>
				<td><input type="text" name="nombre"></td>
			</tr>
			<tr>
				<td>Descripcion</td>
				<td><input type="text" name="descripcion"></td>
			</tr>
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