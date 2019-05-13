@extends('layouts.app')

@section('content')
<form method="POST" action="/destino2">
	@csrf
	<input type="hidden" name="id" value="{{$seleccionado->id}}">
	<input type="text" name="marca" value="{{$seleccionado->marca}}">
	<input type="text" name="modelo" value="{{$seleccionado->modelo}}">
	<input type="text" name="linea" value="{{$seleccionado->linea}}">
	<input type="submit">
</form>


@endsection

@section('script')
<script>
    $( document ).ready(function() {
        $("#carro_agregar").addClass("active");
    });
</script>
@endsection
