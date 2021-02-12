@extends("../layouts.template")

@section("inicio")
@endsection
@section("cabecera")

<h2>Listado de Categorias</h2>


<table border ="1">
	<tr>
		<th>Nombre</th>
		<th>Acciones</th>
	</tr>


	@foreach ($categorias as $categoria)
	
	

	<tr>
		<td>{{ $categoria->nombre }}</td>
		<td align="center">
			<button><a href="{{ route('categorias.edit', $categoria->id)}}">Editar</a> </button> 
			<button><a href="{{ route('categorias.show', $categoria->id)}}">Mostrar</a> </button>
			<form action="/categorias/{{$categoria->id}}" method="post">
				@csrf
				@method("delete")
				<button type="submit" @if (count($categoria->curso) >0 ) disabled @endif>Borrar</button>
			</form>
	</td>
	</tr>
	@endforeach
	<tr>
		<td colspan="2" align="center"><a href="{{ route('categorias.create')}}">Nueva categoria</a></td>
	</tr>
</table>

@endsection
