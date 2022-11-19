@extends('layouts.app')

@section('content')
	<h1>Mensaje</h1>
	{{ $listaAcudientes->nombres }}
	<!-- @foreach ($listaAcudientes as $listaAcudiente)
	<td>{{ $listaAcudiente->responsables->pluck('nombres')->implode(' - ')}}</td>
	
	@endforeach -->
	@stop