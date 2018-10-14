<div class="container border my-3">
	<div class="row my-2">
		<div class="col">
			
			<a class="btn btn-success" id="btnAlta" href="#"><i class="fas fa-plus-square"></i> Agregar Animal</a>
		</div>
	</div>
	<div class="row my-3">
		<div class="col-12">			
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
				<form>
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
						<input type="text" class="form-control" id="fechaEditar" placeholder="Fecha de nacimiento">
					</fieldset>
				</form>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
					<button type="button" id="btnGuardarEdicion" class="btn btn-primary">Guardar Cambios</button>
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
				<form>
					<div class="container">
						<div class="row">
							<div class="col-6">
								<fieldset class="form-group">
									<label for="nombre">Nombre</label>
									<input type="text" class="form-control" id="nombreAlta" placeholder="Nombre">
								</fieldset>
								<fieldset class="form-group">
									<label for="especie">Especie</label>
									<input type="text" class="form-control" id="especieAlta" placeholder="Especie">
								</fieldset>
								<fieldset class="form-group">
									<label for="raza">Raza</label>
									<input type="text" class="form-control" id="razaAlta" placeholder="Raza">
								</fieldset>
								<fieldset class="form-group">
									<label for="sexoAlta">Sexo</label>
									<select class="form-control" id="sexoAlta" placeholder="Sexo">
										<option>Masculino</option>
										<option selected>Femenino</option>
									</select>
								</fieldset>
							</div>
							<div class="col-6">
								
								<fieldset class="form-group">
									<label for="imagenAlta">Imagen</label>
									<input type="file" class="form-control" id="imagenAlta" placeholder="Imagen">
								</fieldset>
								<fieldset class="form-group">
									<label for="castradoAlta">Castrado</label>
									<select class="form-control" id="castradoAlta" placeholder="Castrado">
										<option>Si</option>
										<option selected>No</option>
									</select>
								</fieldset>
								<fieldset class="form-group">
									<label for="fechaAlta">Fecha de Nacimiento</label>
									<input type="date" class="form-control" id="fechaAlta" placeholder="Fecha de Nacimiento">
								</fieldset>
							</div>
						</div>
						<div class="row">
							<div class="col-12">
								<fieldset class="form-group">
									<label for="descripcionAlta">Descripcion</label>
									<textarea  class="form-control" id="descripcionAlta" placeholder="Descripcion"></textarea>
								</fieldset>
							</div>
						</div>
					</div>
					<input type="hidden" id="idAnimal">
					
					

				</form>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
					<button type="button" id="btnGuardarAlta" onclick="armarRegistroAlta();" class="btn btn-primary">Guardar</button>
				</div>
			</div>
		</div>
	</div>
</div>





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

	function armarRegistroAlta(){
		registro ={
			nombre: $("#nombreAlta").val(),
			especie: $("#especieAlta").val(),
			raza: $("#razaAlta").val(),
			sexo: $("#sexoAlta").val(),
			castrado: $("#castradoAlta").val(),
			fecha: $("#fechaAlta").val(),
			descripcion: $("#descripcionAlta").val(),
			imagen: $("#imagenAlta").val()
		}
		if (registro.nombre && registro.especie && registro.raza && registro.fecha) {
			$.ajax({
				url: 'C_Animal/altaAnimal',
				type: 'POST',
				data: {
					nombre: $("#nombreAlta").val(),
					especie: $("#especieAlta").val(),
					raza: $("#razaAlta").val(),
					sexo: $("#sexoAlta").val(),
					castrado: $("#castradoAlta").val(),
					fecha: $("#fechaAlta").val(),
					descripcion: $("#descripcionAlta").val(),
					imagen: $("#imagenAlta").val()
				},
			})
			.done(function() {
				console.log("success");
			})
			.fail(function() {
				console.log("error");
			})
			.always(function() {
				console.log("complete");
			});

			$("#md-alta").modal("hide");
			$('#table_id').DataTable().ajax.reload();

		}else{
			alert("Ingrese todos los campos")

		}
		console.log(registro)
	}

	$(document).ready(function() {	



		$("#btnAlta").click(function(event) {
			$("#md-alta").modal("show");
		});	




		/*--------------<Renderizado de la tabla obteniendo datos con ajax>-----------*/
		$('#table_id').DataTable({	
			ajax: {
				url: 'C_Animal/getAnimales',
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
                    //-----> a la variable btns se le agrega un string con todos los botones que se va a llenar la tabla
                    var btns  = '<a class="btn btn-success mx-2 btn-ver-animal" href="<?= base_url('C_Animal/VerAnimal/')  ?>'+ data.id_animal +'" data-toggle="tooltip" data-placement="right" title="Presione este botón para ver la información del animal" >Ver Animal</a>'+
					'<a class="btn btn-primary btn-editar" data-toggle="tooltip" data-placement="right" title="Presione este botón para editar la información del animal"><i class="fas fa-edit"></i></a>';
                    
                    //----> si el perro es adoptado se le cargan botones con opciones diferentes a si no esta adoptado
                    if (data.adoptado == 0){
                       btns += '<a class="btn btn-warning btn-adoptar mx-2" data-toggle="tooltip" data-placement="right" title="Presione este botón para Adoptar a el animal" ><i class="fas fa-plus"></i></a>';    //----> este boton le permite adoptar
                    } else{
                        btns += '<a class="btn btn-warning btn-revocar mx-2" data-toggle="tooltip" data-placement="right" title="Presione este botón para Revocar la adopción de este animal" ><i class="fas fa-minus"></i></a>';   //--> este boton le permite revocar una adopcion
                    }
                    //-------> si el estado del animal es activo o inactivo se le cargan botones diferentes
                    if(data.estado_animal == 'activo'){
                        btns+= '<a class="btn btn-danger btn-desactivar" data-toggle="tooltip" data-placement="right" title="Presione este botón para Dar de Baja este animal" ><i class="fas fa-ban"></i></a>';   //----> este boton le permite Dar de baja un perro
                    } else {
                        btns+= '<a class="btn btn-danger btn-activar" data-toggle="tooltip" data-placement="right" title="Presione este botón para Dar de alta este animal"><i class="fas fa-undo"></i></a>'  //----> este boton le permite dar de alta el perro
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

		var table = $('#table_id').DataTable();

		table.on( 'draw', function () {
			console.log( 'Redraw occurred at: '+new Date().getTime());

			$('.btn-editar').click(function(event) {
				var dato = armarRegistro(this);
				llenarModal(dato);
				$('#md-edicion').modal('show');
			})

			$('#btnGuardarEdicion').click(function(event) {
				var registro;
				registro =
				{
					idAnimal:$('#idAnimal').val(),
					nombre :$('#nombre').val(),
					especie :$('#especie').val(),
					raza :$('#raza').val(),
					sexo: $('#sexo').val()
				}
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
					$('#table_id').DataTable().ajax.reload();
				})
				.fail(function() {
					console.log("error");
				});


				$('#md-edicion').modal('hide');

			});

		} );
	});

	
</script>
