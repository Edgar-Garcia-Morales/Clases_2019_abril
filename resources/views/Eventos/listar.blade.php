@extends('layouts.app')

@section('content')

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Agregar
</button>

<table id="eventos" border=1>
	<thead>
		<th>Fecha</th>
		<th>Tipo</th>
		<th>Cliente</th>
		<th></th>
	</thead>
	<tbody>
@foreach ($Eventos as $Evento)
	<tr id="{{$Evento->id}}">
		<td class="fecha" id="{{$Evento->id}}">{{$Evento->fecha}}</td>
		<td class="tipo" id="{{$Evento->id}}">{{$Evento->tipo}}</td>
		<td class="cliente_id" id="{{$Evento->id}}">{{$Evento->quien->nombre}}</td>
		<td>
			<a id="{{$Evento->id}}">x</a>
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
				Fecha:<input type="date" name="fecha" id="fecha"><br>
				Tipo:
<select name="tipo" id="tipo" >
	<option>Cumpleaños</option>
	<option>Boda</option>
	<option>XV años</option>
	<option>Reunion Familiar</option>
</select>
<br>
				Cliente:
<select name="cliente_id" id="cliente_id">
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
						
						fecha = $("#fecha").val();
						tipo =  $("#tipo").val();
						cliente_id =  $("#cliente_id").val();
						tk = $('input[name=_token]').val();

					$.ajax({
				    url: "/agregar_evento/",
					  type: "POST",
					  dataType: "json",
					  data: { "fecha": fecha , "tipo": tipo , "cliente_id": cliente_id , "_token":tk },
					  success: function(result){
					  	fila = 	'<tr id="'+ result.nuevo.id +'">';
							fila += 	'<td class="fecha" id="'+ result.nuevo.id +'">'+ result.nuevo.fecha +'</td>';
							fila += 	'<td class="tipo" id="'+ result.nuevo.id +'">'+ result.nuevo.tipo +'</td>';
							fila += 	'<td class="cliente_id" id="'+ result.nuevo.id +'">'+ result.nombre +'</td>';
							fila += 	'<td>';
							fila += 	'<a id="'+ result.nuevo.id +'">x</a>';
							fila += 	'</td></tr>';
//					  	$("table#clientes>tbody").append(fila);
					  	$("table#eventos>tbody").append(fila);
  					}
					});
//				  $( "#formulario" ).submit();
				});

				$("table#eventos>tbody").on("click","a",function(event) {
					id = this.id;
					tk = $('input[name=_token]').val();
					$.ajax({
				    url: "/eliminarevento/",
					  type: "POST",
					  dataType: "json",
					  data: { "id": id , "_token":tk },
					  success: function(result){
					  	$("table#eventos>tbody>tr#" + result.eliminado.id).remove(); 
  					}
					});
				});
				event.preventDefault();
    });
</script>
@endsection
