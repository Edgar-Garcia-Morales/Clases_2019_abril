@extends('layouts.app')

@section('content')
<table border=1>
	<thead>
		<th>MARCA</th>
		<th>MODELO</th>
		<th>LINEA</th>
		<th></th>
	</thead>
@foreach ($carros as $carro)
	<tbody>
		<th>{{$carro->marca}}</th>
		<th>{{$carro->modelo}}</th>
		<th>{{$carro->linea}}</th>
		<th></th>
	</tbody>
@endforeach
</table>
<br>
<form method="POST" action="siete.php">
	<input type="text" name="marca">
	<input type="text" name="modelo">
	<input type="text" name="linea">
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
