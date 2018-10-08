	<div class="container my-5">
		<div class="row">
			<div class="col-12">
				
				<table class="table table-striped table-dark display" id="table_id">
					<thead>
						<tr>
							<th scope="col">Id Animal</th>				
							<th scope="col">Nombre</th>
							<th scope="col">Especie</th>
							<th scope="col">Raza</th>
							<th scope="col">Sexo</th>
							<th scope="col">Edad</th>
							<th scope="col">Castrado</th>
							<th scope="col">Accion</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($animales as $animal): ?>
							<tr>
								<td class="id"><?= $animal -> id_animal ?></td>	
								<td scope="row" class="nombre"><?= $animal -> nombre_animal ?></th>
									<td class="especie"><?= $animal -> especie_animal ?></td>
									<td class="raza"><?= $animal -> raza_animal ?></td>
									<td class="sexo"><?= $animal -> sexo_animal ?></td>
									<td class="edad"><?= $animal -> edad_animal ?></td>
									<td class="castrado"><?php if ($animal->castrado == 1): ?>
									si
									<?php else: ?>
										no
										<?php endif ?></td>
										<td>
											<a class="btn btn-success" href="<?= base_url('C_Animal/VerAnimal/'.$animal->id_animal) ?>">Ver Animal</a>
											<a class="btn btn-primary btn-editar"><i class="fas fa-edit"></i></a>
										</td>
									</tr>
								<?php endforeach ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>



			<!-- Modal -->
			<div class="modal fade" id="md-edicion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
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
									<label for="edad">Edad</label>
									<input type="text" class="form-control" id="edad" placeholder="Edad">
								</fieldset>
							</form>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
							<button type="button" id="btnGuardarEdicion" class="btn btn-primary">Guardar Cambios</button>
						</div>
					</div>
				</div>
			</div>

			<!-- Script para activar el datatable en la tabla -->
			<script>

function dibujarTabla(){
    $('#table_id').DataTable({
        select: false,  //-----> hace que las filas sean seleccionables
        paging: true,  //--> habilita el paginado
        "language": {    //-------> en este array se puede perzonalizar el texto que se muestra en cada uno de los botones y labels de la tabla y como se muestran los datos
        	"lengthMenu": "Muestra _MENU_ animales por página",
        	"zeroRecords": "No se encontro resultados",
        	"info": "Mostrando página _PAGE_ of _PAGES_",
        	"infoEmpty": "No hay registros disponibles",
        	"infoFiltered": "(Filtrando los _MAX_ registros)",
        	"search": "Búsqueda",
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
        searching: true,             //---> habilita la busqueda de registros
        "columnDefs": [              //-----> se le cambia propiedades a las columnas, cuales son buscables por filtros, visibles, ordenables
        { "searchable": true, "targets": 0, "orderable": true, "visible": false},         
        { "searchable": true, "targets": 1, "orderable": true}, 
        { "searchable": true, "targets": 2, "orderable": true}, 
        { "searchable": true, "targets": 3, "orderable": true}, 
        { "searchable": true, "targets": 4, "orderable": true},            
        { "searchable": true, "targets": 5, "orderable": true},        
        { "searchable": true, "targets": 6, "orderable": true},           
        { "searchable": false, "targets": 7, "orderable": false}            


        ],
        "ordering": true,                     //-->  habilita el ordenamiento de columnas
        "search": {                           // -----> opciones para la busqueda de datos 
            "caseInsensitive": true,        //----> habilita el caseSensitive
            "search": " ",               //---> se le puede asignar un filtro por defecto a la busqueda asi los encuentra y ordena por ese filtro
            "smart": true                    //----->  activa la busqueda smart, no busca el String identico, busca los similares y las ocurrencias
        }
    });
				}

				function armarRegistro(dato){
					$trEdicion = $(dato).closest('tr');
					registroSeleccionado = {
						idAnimal: $($trEdicion).find('.id').html(),
						nombre: $($trEdicion).find('.nombre').html(),
						especie: $($trEdicion).find('.especie').html(),
						raza: $($trEdicion).find('.raza').html(),
						sexo: $($trEdicion).find('.sexo').html(),
						edad: $($trEdicion).find('.edad').html()
					}
					return registroSeleccionado;
				}
				function llenarModal(registro){
					$('#nombre').val(registro.nombre)
					$('#especie').val(registro.especie)
					$('#raza').val(registro.raza)
					$('#sexo').val(registro.sexo)
					$('#edad').val(registro.edad)
					$('#idAnimal').val(registro.idAnimal)
				}

				$(document).ready( function () {
					dibujarTabla();
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
							edad :$('#edad').val(),
							especie :$('#especie').val(),
							raza :$('#raza').val(),
							sexo: $('#sexo').val()
						}
						console.log(registro);

						$.ajax({
							url: '<?= base_url('C_Animal/guardarEdicion') ?>',
							type: 'POST',
							data: {idAnimal:$('#idAnimal').val(),
							nombre :$('#nombre').val(),
							edad :$('#edad').val(),
							especie :$('#especie').val(),
							raza :$('#raza').val(),
							sexo: $('#sexo').val()},
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

						$('#md-edicion').modal('hide');
						 location.href ="<?= base_url('c_animal') ?>";		//problmea 001= estoa estaria mal, habria que cargar la tabla con ajax y cuando se cierre el modal que se actualize tambien con ajax, no recargar la pagina completa. Funciona pero estaria bueno cambiarlo.
						});
				} );
			</script>


