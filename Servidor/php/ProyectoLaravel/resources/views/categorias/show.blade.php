@extends("../layouts.template")

@section("cabecera")

<h2>Información de la Categoria</h2>

<table border ="1">
	
<tr>
		<th>Nombre</th>
		<th>Descripcion</th>
	</tr>
	<tr>
		<td>{{ $categoria->nombre }}</td>
		<td>{{ $categoria->descripcion }}</td>
	</tr>
	<tr>
		<td colspan="2"><a href="/categorias">Volver</a></td>
	</tr>
</table>
@endsection 
