<div class="container-fluid border mx-3 my-3">
	
	<div class="row my-3">
		<div class="col-xs-12 col-sm-12 col-md-3">
			<div class="card">
				<div class="card-body">
					<center><h1><i class="fas fa-paw"></i></h1></center>
					<center><h4 class="card-title">Gestión de Animales</h4></center>
					<p class="card-text">En este sección podras realizar tadas aquellas acciones relacionadas a la gestión de los animales, cada botón corresponde a una accion determinada:</p>
					<div class="alert alert-warning" role="alert">
						<p class="font-italic">
							<ul>
								<li>Ver una información mas detallada del animal:<br> <center><a class="btn btn-success mx-2" href="#">Ver Animal</a></center></li>
								<li>Editar la información del animal: <br><center><a class="btn btn-primary"><i class="text-white fas fa-edit"></i></a></center></li>
								<li>Registrar/Revocar una adopción <br><center><a class="btn btn-warning"><i class="text-white fas fa-plus"></i></a><a class="btn btn-warning mx-2"><i class="text-white fas fa-minus"></i></a></center></li>
								<li>Deshabilitar/Habilitar un animal <br><center><a class="btn btn-danger "><i class="text-white fas fa-ban"></i></a><a class="btn btn-danger mx-2"><i class="text-white fas fa-undo"></i></a></center></li>
							</ul>				
						</p>
					</div>	
				</div>
			</div>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-9">	
			<a class="btn btn-success my-2" id="btnAlta" href="#"><i class="fas fa-plus-square"></i> Agregar Animal</a>
			<div class=" scroll" style="height: auto;">
				
				<table class="table table-striped table-dark display" id="table_id">
					<thead>
						<tr>
							<th scope="col">Id Animal</th>				
							<th scope="col">Nombre</th>
							<th scope="col">Especie</th>
							<th scope="col">Raza</th>
							<th scope="col">Sexo</th>
							<th scope="col">Accion</th>
						</tr>
					</thead>
					<tbody>		
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>




<!-- Modal para editar el animal  -->
<div class="modal fade" id="md-edicion" tabindex="-1" role="dialog" aria-labelledby="labelEditar" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="labelEditar">Editar animal</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form id="formEditar">
					<input type="hidden" id="idAnimal">
					<fieldset class="form-group">
						<label for="nombre">Nombre</label>
						<input type="text" class="form-control" id="nombre" placeholder="Nombre">
					</fieldset>
					<fieldset class="form-group">
						<label for="especie">Especie</label>
						<input type="text" class="form-control" id="especie" placeholder="Especie">
					</fieldset>
					<fieldset class="form-group">
						<label for="raza">Raza</label>
						<input type="text" class="form-control" id="raza" placeholder="Raza">
					</fieldset>
					<fieldset class="form-group">
						<label for="sexo">Sexo</label>
						<input type="text" class="form-control" id="sexo" placeholder="Sexo">
					</fieldset>
					<fieldset class="form-group">
						<label for="fechaEditar">Fecha de nacimiento</label>
						<input type="date" class="form-control" id="fechaEditar" placeholder="Fecha de nacimiento">
					</fieldset>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
						<button type="submit" id="btnGuardarEdicion" class="btn btn-primary">Guardar Cambios</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<!-- Modal para registrar adopcion  -->
<div class="modal fade" id="md-adopcion" tabindex="-1" role="dialog" aria-labelledby="labelEditar" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="labelEditar">Registrar Adopcion</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form class="form">
					<center><p>Ingrese el DNI del adoptatne para buscarlo, u oprima <button type="button" class="mx-2 my-2 btn btn-success" id="registrarAdopcion">Registrar <br> Adoptante</button> para registrar uno nuevo</p></center>					
					<div class="form-group">
						<input type="text" class="form-control mx-2" name="dni" id="dni" placeholder="Ingrese DNI del adoptante...">
					</div>
				</form>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
					
					<button type="button" id="btnRegistrarAdopcion" class="btn btn-primary">Registrar Adopcion</button>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Modal para registrar adoptante  -->
<div class="modal fade" id="md-altaAdoptante" tabindex="-1" role="dialog" aria-labelledby="labelEditar" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="labelEditar">Registrar Adoptante</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form class="form">
					<div class="form-group">
						<input type="number" class="form-control mx-2" name="dniAdoptante" id="dniAdoptante" placeholder="Ingrese DNI del adoptante...">
					</div>
					<div class="form-group">
						<input type="text" class="form-control mx-2" name="nombreAdoptante" id="nombreAdoptante" placeholder="Ingrese nombre del adoptante...">
					</div>
					<div class="form-group">
						<input type="text" class="form-control mx-2" name="apellidoAdoptante" id="apellidoAdoptante" placeholder="Ingrese apellido del adoptante...">
					</div>
					<div class="form-group">
						<input type="text" class="form-control mx-2" name="direccionAdoptante" id="direccionAdoptante" placeholder="Ingrese direccion del adoptante...">
					</div>
					<div class="form-group">
						<input type="number" class="form-control mx-2" name="telefonoAdoptante" id="telefonoAdoptante" placeholder="Ingrese telefono del adoptante...">
					</div>
					<div class="form-group">
						<input type="email" class="form-control mx-2" name="emailAdoptante" id="emailAdoptante" placeholder="Ingrese email del adoptante...">
					</div>
					<div class="form-group">
						<input type="text" class="form-control mx-2" name="ciudadAdoptante" id="ciudadAdoptante" placeholder="Ingrese ciudad del adoptante...">
					</div>
				</form>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
					
					<button type="button" id="btnRegistrarAdoptante" class="btn btn-primary">Registrar Adoptante</button>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Modal para Alta animal  -->
<div class="modal fade" id="md-alta" tabindex="-1" role="dialog" aria-labelledby="modalAltaAnimal" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" >Alta animal</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form enctype="multipart/form-data" method="post" id="formuploadajax">
					<div class="container">
						<div class="row">
							<div class="col-6">
								<fieldset class="form-group">
									<label for="nombre">Nombre</label>
									<input type="text" class="form-control" id="nombreAlta" name="nombreAlta" placeholder="Nombre">
								</fieldset>
								<fieldset class="form-group">
									<label for="especie">Especie</label>
									<div class="input-group">
										<select class="form-control" id="especieAlta" onclick="imprimirRazas()" name="especieAlta">
											<!-- OPCIONES CARGADAS CON AJAX -->
										</select>
										<button class="btn btn-success mx-2" id="addEspecie"><i class="fas fa-plus-circle"></i></button>
									</div>
									
								</fieldset>
								<fieldset class="form-group">
									<label for="raza">Raza</label>
									<div class="input-group">
										
										<select class="form-control" id="razaAlta" name="razaAlta">
											<!-- OPCIONES CARGADAS CON AJAX -->
										</select>
										<button class="btn btn-success mx-2" id="addRaza"><i class="fas fa-plus-circle"></i></button>

									</div>
								</fieldset>
								<fieldset class="form-group">
									<label for="sexoAlta">Sexo</label>
									<select class="form-control" id="sexoAlta" name="sexoAlta" placeholder="Sexo">
										<option>Masculino</option>
										<option selected>Femenino</option>
									</select>
								</fieldset>
							</div>
							<div class="col-6">
								
								<fieldset class="form-group">
									<label for="imagenAlta">Imagen</label>
									<input type="file" class="form-control" id="imagenAlta" name="imagenAlta" placeholder="Imagen">
								</fieldset>
								<fieldset class="form-group">
									<label for="castradoAlta">Castrado</label>
									<select class="form-control" id="castradoAlta" name="castradoAlta" placeholder="Castrado">
										<option value="1">Si</option>
										<option selected value="0" >No</option>
									</select>
								</fieldset>
								<fieldset class="form-group">
									<label for="fechaAlta">Fecha de Nacimiento</label>
									<input type="date" class="form-control" id="fechaAlta" name="fechaAlta" placeholder="Fecha de Nacimiento">
								</fieldset>
							</div>
						</div>
						<div class="row">
							<div class="col-12">
								<fieldset class="form-group">
									<label for="descripcionAlta">Descripión</label>
									<textarea  class="form-control" id="descripcionAlta" name="descripcionAlta" placeholder="Descripcion"></textarea>
								</fieldset>
							</div>
						</div>
					</div>
					<input type="hidden" id="idAnimal">
					

					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
						<input type="submit"  class="btn btn-primary" value="Enviar">
					</div>
				</form>
			</div>
		</div>
	</div>
</div>


<!-- Modal para revocar adopcion  -->
<div class="modal fade" id="md-revocar" tabindex="-1" role="dialog" aria-labelledby="labelEditar" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="labelEditar">Revocar Adopción</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form id="formRevocar">
					<div class="form-group">

						<label for="motivo">Seleccione el motivo de la revocacion:</label>
						<select class="form-control" id="motivo" name="motivo">
							<option value="Perro agresivo">Perro agresivo</option>
							<option value="Problemas presonales">Problemas presonales</option>
							<option value="Falta de espacio">Falta de espacio</option>
							<option value="Problemas economicos">Problemas economicos</option>
							<option value="Mal comportamiento">Mal comportamiento</option>
							<option value="Otro">Otro</option>
						</select>
					</div>
					<div class="form-group">
						<label for="detalleRevocacion">Detalle de la revocacion:</label>
						<textarea class="form-control mx-2" name="detalleRevocacion" id="detalleRevocacion" placeholder="Ingrese detalle de revocacion (opcional)..."></textarea>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

						<button type="submit" id="btnRevocarAdopcion" class="btn btn-primary">Revocar Adopcion</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>




<!-- Script con todo el comportamiento de los modales de la vista  --> 
<script type="text/javascript">

	function armarRegistro(dato){
		trEdicion = $(dato).closest('tr');
		registroSeleccionado = {
			idAnimal: $(trEdicion).find('.id').html(),
			nombre: $(trEdicion).find('.nombre').html(),
			especie: $(trEdicion).find('.especie').html(),
			raza: $(trEdicion).find('.raza').html(),
			sexo: $(trEdicion).find('.sexo').html(),
		}
		return registroSeleccionado;
	}

	function llenarModal(registro){
		$('#nombre').val(registro.nombre)
		$('#especie').val(registro.especie)
		$('#raza').val(registro.raza)
		$('#sexo').val(registro.sexo)
		$('#idAnimal').val(registro.idAnimal)
	}

	function imprimirRazas() {
		$.ajax({
			url: 'getRazas',
			type: 'POST',
			dataType: 'json',
			data: {especie: $("#especieAlta").val()},
		})
		.done(function(razas) {
			$("#razaAlta").empty();

			$.each(razas, function(index, val) {
				$("#razaAlta").append("<option value='"+val.raza+"' >" + val.raza + "</option>");
			});
		})
		.fail(function() {
			console.log("Error al imprimir las razas");
		});
		
	}
	function imprimirEspecies() {
		$.ajax({
			url: 'getEspecies',
			type: 'POST',
			dataType: 'json',
		})
		.done(function(especies) {
			$("#especieAlta").empty();

			$.each(especies, function(index, val) {
				$("#especieAlta").append("<option value='"+val.especie+"' >" + val.especie + "</option>");
			});
			imprimirRazas();
		})
		.fail(function() {
			console.log("Error al cargar las especies");
		});
	}

	$(document).ready(function() {	

		$("#addEspecie").click(function(event) {
			event.preventDefault();
			var especie = prompt("Ingrese la nueva especie");
			if (especie) {
				$.ajax({
					url: 'nuevaEspecie',
					type: 'POST',
					data: {especie: especie},
				})
				.done(function(rta) {
					alert(rta);
					imprimirEspecies();
				})
				.fail(function() {
					console.log("error");
				})
				.always(function() {
					console.log("complete");
				});
			}
			
		});

		$("#addRaza").click(function(event) {
			event.preventDefault();
			var raza = prompt("Ingrese la nueva raza")
			if (raza) {
				$.ajax({
					url: 'nuevaRaza',
					type: 'POST',
					data: {
						especie: $("#especieAlta").val(),
						raza: raza
					},
				})
				.done(function(rta) {
					alert(rta);
					imprimirRazas();
				})
				.fail(function() {
					console.log("error");
				})
				.always(function() {
					console.log("complete");
				});
			}
			
		});

// -------------------------<AJAX ALTA ANIMAL>------------------------//
$("#formuploadajax").on("submit", function(e){
	e.preventDefault();
	registro ={
		nombre: $("#nombreAlta").val(),
		especie: $("#especieAlta").val(),
		raza: $("#razaAlta").val(),
		sexo: $("#sexoAlta").val(),
		castrado: $("#castradoAlta").val(),
		fecha: $("#fechaAlta").val(),
		descripcion: $("#descripcionAlta").val(),
		imagen: $('#imagenAlta').prop('files')[0]
	}
	if (registro.nombre && registro.especie && registro.raza && registro.fecha) {
		$.ajax({
			url: "altaAnimal",
			type: "post",
			dataType: "html",
			data:new FormData(this), 
			cache: false,
			contentType: false,
			processData: false
		})
		.done(function(res){
			$("#md-alta").modal("hide");
			alert(res);
			$('#table_id').DataTable().ajax.reload();
		});
	}else{
		alert("Ingrese todos los campos")

	}
});

$("#btnAlta").off().click(function(event) {
	$("#md-alta").modal("show");
	imprimirEspecies();
	
});	
// -------------------------</AJAX ALTA ANIMAL>------------------------//




/*--------------<Renderizado de la tabla obteniendo datos con ajax>-----------*/
$('#table_id').DataTable({	
	ajax: {
		url: 'getAnimales',
		dataSrc: ''
	},
	columns: [ 
	{ data: 'id_animal',className: "id"},
	{ data: 'nombre_animal',className: "nombre" },
	{ data: 'especie_animal',className: "especie" },
	{ data: 'raza_animal',className: "raza" },
	{ data: 'sexo_animal',className: "sexo" }
	],
	"aoColumnDefs": [
	{
		"aTargets": [5],
		"mData": null,
		"mRender": function (data, type, full) {     
			var btns  = '<a class="btn btn-success mx-2 btn-ver-animal" href="<?= base_url('C_Animal/VerAnimal/') ?>'+ data.id_animal +'">Ver Animal</a>'+
			'<a class="btn btn-primary btn-editar"><i class="fas fa-edit"></i></a>';


			if(data.estado_animal == 'activo'){
				if (data.adoptado == 0){
					btns += '<a class="btn btn-warning btn-adoptar mx-2"><i class="fas fa-plus"></i></a>';
				} else{
					btns += '<a class="btn btn-warning btn-revocar mx-2"><i class="fas fa-minus"></i></a>';
				}
				btns+= '<a class="btn btn-danger btn-desactivar mx-2"><i class="fas fa-ban"></i></a>';
			} else {
				btns+= '<a class="btn btn-danger btn-activar mx-2"><i class="fas fa-undo"></i></a>'
			}
			return btns;
		}
	}
	],
            "language": {    //-------> en este array se puede perzonalizar el texto que se muestra en cada uno de los botones y labels de la tabla y como se muestran los datos
            	"lengthMenu": "Muestra _MENU_ animales por página",
            	"zeroRecords": "No se encontro resultados",
            	"info": "Mostrando página _PAGE_ de _PAGES_",
            	"infoEmpty": "No hay registros disponibles",
            	"infoFiltered": "(Filtrando los _MAX_ registros)",
            	"search": "<i class='fas fa-filter'></i> Búsqueda",
            	"paginate": {
            		"first": "Primero",
            		"last": "Último",
            		"previous": "Anterior",
            		"next": "Siguiente"
            	}
            },
        pagingType: 'full_numbers',   //---> es el tipo de botonsitos del paginado, ej: next,previous,first,last
        lengthChange: true,           //----> le habilita el combo box para que el usuario cambie el numero de paginas que quiere ver
        lengthMenu: [5,10,20],       //--> longitud del menu del paginado
    });
/*--------------</Renderizado de la tabla obteniendo datos con ajax>-----------*/

// --------------------------------<SETEA COMPORTAMIENTOS A LOS BOTONES CADA VEZ QUE SE DIBUJA LA TABLA>----------//
var table = $('#table_id').DataTable();
table.on( 'draw', function () {
		// -----<BTN EDITAR>------//
		$('.btn-editar').click(function(event) {
			var dato = armarRegistro(this);
			llenarModal(dato);
			$('#md-edicion').modal('show');
		});

		$('#formEditar').off().on("submit", function(event) {
			event.preventDefault();
			var registro;
			$.ajax({
				url: '<?= base_url('C_Animal/guardarEdicion') ?>',
				type: 'POST',
				data: {idAnimal:$('#idAnimal').val(),
				nombre :$('#nombre').val(),
				especie :$('#especie').val(),
				raza :$('#raza').val(),
				sexo: $('#sexo').val()},
			})
			.done(function() {
				$('#md-edicion').modal('hide');
				$('#table_id').DataTable().ajax.reload();
			})
			.fail(function() {
				console.log("error");
			});
		});
		// -----</BTN EDITAR>------//
		
		// -----<BTN DESACTIVAR>------//
		$(".btn-desactivar").click(function(event) {
			var r = confirm("Seguro desea desactivar el animal?");
			if (r) {
				id = $(this).closest('tr').find('.id').html();
				$.ajax({
					url: 'C_Animal/comprobarAdoptado',
					type: 'POST',
					data: {id: id},
				})
				.done(function(a) {
					if (a) {
						alert("No se puede deshabilitar un animal con una adopcion vigente. Revoque la adopcion primero.")

					} else {
						var motivo = prompt("Por favor ingrese motivo de la deshabilitacion", "Fallecimiento");
						if (motivo != null) {

							$.ajax({
								url: 'C_Animal/deshabilitarAnimal',
								type: 'POST',
								data: {
									id: id,
									motivo: motivo
								},
							})
							.done(function() {
								alert("Animal deshabilitado con exito!");
								$('#table_id').DataTable().ajax.reload();

							});

						}
					}
				})
				
				
			}
		});
		// -----</BTN DESACTIVAR>------//

		// -----<BTN ACTIVAR>------//
		$(".btn-activar").click(function(event) {
			var r = confirm("Seguro que quiere activar este animal?");
			if (r) {
				id = $(this).closest('tr').find('.id').html();
				$.ajax({
					url: 'C_Animal/habilitarAnimal',
					type: 'post',
					dataType: 'json',
					data: {id: id},
				})
				.done(function() {
					alert("Animal habilitado con exito!");
					$('#table_id').DataTable().ajax.reload();;
				});
			}
		});
		// -----</BTN ACTIVAR>------//

		// -----<BTN Registrar Adopcion>------//
		$(".btn-adoptar").click(function(event) {
			$("#md-adopcion").modal("show");
			id_animal = $(this).closest('tr').find('.id').html();
			$("#registrarAdopcion").click(function(event) {
				$("#md-altaAdoptante").modal("show");
				$("#btnRegistrarAdoptante").click(function(event) {
					if ($("#nombreAdoptante").val() && $("#apellidoAdoptante").val() && $("#dniAdoptante").val() && $("#direccionAdoptante").val() && $("#telefonoAdoptante").val() && $("#emailAdoptante").val() && $("#ciudadAdoptante").val()) {
						$.ajax({
							url: 'C_Animal/registrarAdoptanteYAdopcion',
							type: 'POST',
							data: {
								nombreAdoptante: $("#nombreAdoptante").val(),
								apellidoAdoptante: $("#apellidoAdoptante").val(),
								direccionAdoptante:$("#direccionAdoptante").val(),
								dniAdoptante: $("#dniAdoptante").val(),
								telefonoAdoptante: $("#telefonoAdoptante").val(),
								emailAdoptante: $("#emailAdoptante").val(),
								ciudadAdoptante: $("#ciudadAdoptante").val(),
								id_animal: id_animal
							},
						})
						.done(function(rta) {
							alert(rta);
							$("#md-altaAdoptante").modal("hide");
							$("#md-adopcion").modal("hide");

							$('#table_id').DataTable().ajax.reload();
						});

					} else {
						alert("Ingrese todos los campos!")
					}
				})
			});

			$("#btnRegistrarAdopcion").off().click(function(event) {
				dni = $("#dni").val();
				$.ajax({
					url: 'C_Animal/buscarAdoptante',
					type: 'POST',
					data: {dni: dni},
				})
				.done(function(adoptante) {
					if (adoptante) {
						var obj = $.parseJSON(adoptante);
						var a = confirm("Seguro que desae registrar la adopcion a nombre de "+ obj.nombre_adoptante+" "+ obj.apellido_adoptante);
						if (a) {
							$.ajax({
								url: 'C_Animal/registrarAdopcion',
								type: 'POST',
								data: {
									id_animal: id_animal,
									id_adoptante: obj.id_adoptante
								},
							})
							.done(function(msg) {
								alert(msg);
								$("#md-adopcion").modal("hide");
								$('#table_id').DataTable().ajax.reload();
							});

						}
					} else {
						var conf = confirm("No se encontro el adoptante desea registrarlo?");
						if (conf) {
							$("#md-altaAdoptante").modal("show");
							$("#btnRegistrarAdoptante").click(function(event) {
								if ($("#nombreAdoptante").val() && $("#apellidoAdoptante").val() && $("#dniAdoptante").val() && $("#direccionAdoptante").val() && $("#telefonoAdoptante").val() && $("#emailAdoptante").val() && $("#ciudadAdoptante").val()) {
									$.ajax({
										url: 'C_Animal/registrarAdoptanteYAdopcion',
										type: 'POST',
										data: {
											nombreAdoptante: $("#nombreAdoptante").val(),
											apellidoAdoptante: $("#apellidoAdoptante").val(),
											direccionAdoptante:$("#direccionAdoptante").val(),
											dniAdoptante: $("#dniAdoptante").val(),
											telefonoAdoptante: $("#telefonoAdoptante").val(),
											emailAdoptante: $("#emailAdoptante").val(),
											ciudadAdoptante: $("#ciudadAdoptante").val(),
											id_animal: id_animal
										},
									})
									.done(function(rta) {
										alert(rta);
										$("#md-altaAdoptante").modal("hide");
										$("#md-adopcion").modal("hide");

										$('#table_id').DataTable().ajax.reload();
									});

								} else {
									alert("Ingrese todos los campos!")
								}
							});

						}
					}
				});
			});

		});
		// -----</BTN Registrar Adopcion>------//

		// -----<BTN Revocar Adopcion>------//
		$(".btn-revocar").click(function(event) {
			var t = confirm("Seguro que desea revocar la adopcion?");
			if (t) {
				$("#md-revocar").modal("show");
				id_animal = $(this).closest('tr').find('.id').html();
				$("#formRevocar").off().on("submit", function(event) {
					event.preventDefault();
					$.ajax({
						url: 'C_Animal/revocarAdopcion',
						type: 'POST',
						data: {
							id_animal: id_animal,
							detalle: $("#detalleRevocacion").val(),
							motivo: $("#motivo").val() 
						},
					})
					.done(function(msg) {
						alert(msg);
						$("#md-revocar").modal("hide");
						$('#table_id').DataTable().ajax.reload();

					});

				});
			}
			
		});

		// -----</BTN Revoacar Adopcion>------//





	});
// --------------------------------</SETEA COMPORTAMIENTOS A LOS BOTONES CADA VEZ QUE SE DIBUJA LA TABLA>----------//

});

</script>
