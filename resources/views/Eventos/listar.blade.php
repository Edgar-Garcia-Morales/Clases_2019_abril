@extends('layouts.app')

@section('content')

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Agregar
</button>

<table id="clientes" border=1>
	<thead>
		<th>Fecha</th>
		<th>Tipo</th>
		<th>Cliente</th>
		<th></th>
	</thead>
	<tbody>
@foreach ($Eventos as $Evento)
	<tr id="{{$Evento->id}}">
		<td class="nombre" id="{{$Evento->id}}">{{$Evento->fecha}}</td>
		<td class="correo" id="{{$Evento->id}}">{{$Evento->tipo}}</td>
		<td class="telefono" id="{{$Evento->id}}">{{$Evento->quien->nombre}}</td>
		<td>
			<a href="/eliminarcliente/{{$Evento->id}}">x</a>
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
			<form id="formulario" method="POST" action="/destino3">
				@csrf
				Fecha:<input type="date" name="fecha"><br>
				Tipo:
<select name="tipo">
	<option>Cumpleaños</option>
	<option>Boda</option>
	<option>XV años</option>
	<option>Reunion Familiar</option>
</select>
<br>
				Cliente:
<select name="cliente_id">
@foreach ($Clientes as $Cliente)
<option value="{{$Cliente->id}}">{{$Cliente->nombre}}</option>
@endforeach
</select>
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
        $("#opc_eventos").addClass("active");

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
