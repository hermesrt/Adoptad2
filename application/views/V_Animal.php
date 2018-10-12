<div class="container border my-3">
	<div class="row my-2">
		<div class="col">
			
			<a class="btn btn-success" href="#"><i class="fas fa-plus-square"></i> Agregar Animal</a>
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
						<th scope="col">Edad</th>
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
<div class="modal fade" id="md-edicion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Editar animal</h5>
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





<script type="text/javascript">

	function armarRegistro(dato){
		trEdicion = $(dato).closest('tr');
		registroSeleccionado = {
			idAnimal: $(trEdicion).find('.id').html(),
			nombre: $(trEdicion).find('.nombre').html(),
			especie: $(trEdicion).find('.especie').html(),
			raza: $(trEdicion).find('.raza').html(),
			sexo: $(trEdicion).find('.sexo').html(),
			edad: $(trEdicion).find('.edad').html()
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

	$(document).ready(function() {		
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
			{ data: 'sexo_animal',className: "sexo" },
			{ data: 'edad_animal' ,className: "edad"}
			],
			"aoColumnDefs": [
			{
				"aTargets": [6],
				"mData": null,
				"mRender": function (data, type, full) {     
                    var btns  = '<a class="btn btn-success mx-2 btn-ver-animal" href="<?= base_url('C_Animal/VerAnimal/') ?>'+ data.id_animal +'">Ver Animal</a>'+
					'<a class="btn btn-primary btn-editar"><i class="fas fa-edit"></i></a>';
                    
                    if (data.adoptado == 0){
                       btns += '<a class="btn btn-warning btn-adoptar mx-2"><i class="fas fa-plus"></i></a>';
                    } else{
                        btns += '<a class="btn btn-warning btn-revocar mx-2"><i class="fas fa-minus"></i></a>';
                    }
                    if(data.estado_animal == 'activo'){
                        btns+= '<a class="btn btn-danger btn-desactivar"><i class="fas fa-ban"></i></a>';
                    } else {
                        btns+= '<a class="btn btn-danger btn-activar"><i class="fas fa-undo"></i></a>'
                    }
					return btns;
				}
			}
			],
            "language": {    //-------> en este array se puede perzonalizar el texto que se muestra en cada uno de los botones y labels de la tabla y como se muestran los datos
            "lengthMenu": "Muestra _MENU_ revisiones por página",
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
					edad :$('#edad').val(),
					especie :$('#especie').val(),
					raza :$('#raza').val(),
					sexo: $('#sexo').val()
				}
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
