@extends('layouts.app')

@section('content')

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Agregar
</button>

<table id="clientes" border=1>
	<thead>
		<th>Nombre</th>
		<th>Correo</th>
		<th>Telefono</th>
		<th></th>
	</thead>
	<tbody>
@foreach ($Clientes as $Cliente)
	<tr id="{{$Cliente->id}}">
		<td class="nombre" id="{{$Cliente->id}}">{{$Cliente->nombre}}</td>
		<td class="correo" id="{{$Cliente->id}}">{{$Cliente->correo}}</td>
		<td class="telefono" id="{{$Cliente->id}}">{{$Cliente->telefono}}</td>
		<td>
			<a href="/eliminarcliente/{{$Cliente->id}}">x</a>
		</td>
	</tr>
@endforeach
	</tbody>
</table>



<br>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
			<form id="formulario" method="POST" action="/destino2">
				@csrf
				<input type="text" name="nombre">
				<input type="text" name="correo">
				<input type="text" name="telefono">
			</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="btnagregar" >Agregar</button>
      </div>
    </div>
  </div>
</div>


@endsection

@section('script')
<script>
    $( document ).ready(function() {
        $("#opc_clientes").addClass("active");

				$( "#btnagregar" ).click(function() {
				  $( "#formulario" ).submit();
				});

				$( "td.nombre" ).dblclick(function() {
					$(this).html('<input class="txtnombre" type="text" id="' + this.id  + '">');
//				  alert( "Doble Click en el nombre." );
				});


				$("table#clientes>tbody").on("focusout",".txtnombre",function() {
					id = this.id;
					nombre = this.value;
					td = this.parentElement;
					tk = $('input[name=_token]').val();
					$(td).html("");
					$.ajax({
				    url: "/actualiza_nombre/",
					  type: "POST",
					  dataType: "json",
					  data: { "id": id , "nombre": nombre , "_token":tk },
					  success: function(result){
					  	$("table#clientes>tbody>tr#" + result.id + ">td.nombre").html(result.nombre);
  					}
					});
				});
    });

</script>
@endsection
