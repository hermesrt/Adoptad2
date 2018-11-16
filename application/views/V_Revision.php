<?php     // var_dump($revisiones)       ?>
<div class="container">
	<div class="row">
		<div class="col-3">
			<div class="card my-5">
				<center><h1 class="my-2"><i class="fas fa-plus-square"></i></h1></center>
				<div class="card-body">
					<center><h5 class="card-title">Nueva Revisión</h5>
						<p class="card-text">
							En esta sección podras registrar una nueva revisión que se haya realizado a un animal.
						</p>
					</center>
					<div class="alert alert-warning" role="alert">
						<p class="font-italic"> <i class="fas fa-info"></i> Recuerda que necesitas el domicilio del adoptante para poder realizar esta acción.</p>
					</div>
					<center><button type="button" data-toggle="modal" data-target="#ModalNuevaRevision" class="btn btn-success">Nueva Revisión</button></center>
				</div>
			</div>
		</div>
		<div class="col-9">
			<div class="card my-5">
				<div class="card-body">

					<h4 class="card-title"><i class="fas fa-notes-medical"></i> Revisiones:</h4>
                    <div class="scroll" style="height: auto;">

                        <table class="table table-striped table-dark display" id="table_id">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Tipo de Revisión</th>
                                    <th scope="col">Fecha de Revisión</th>
                                    <th scope="col">Animal</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if ($revisiones): ?>                                
                                  <?php foreach($revisiones as $revision): ?>
                                     <tr>
                                        <th scope="row"><?= $revision -> id_revision ?></th>
                                        <td><?= $revision -> tipo_revision ?></td>
                                        <td><?= $revision -> fecha_revision ?></td>
                                        <td><a class="btn btn-primary" href="<?= base_url('C_Animal/VerAnimal/'.$revision->id_animal) ?>">Ver Animal</a></td>
                                    </tr>
                                <?php endforeach ?>
                            <?php endif ?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
</div>



<!-- Modal -->
<div class="modal fade" id="ModalNuevaRevision" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Buscar Adoptante</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
      </button>
  </div>
  <div class="modal-body">
    <div class="scroll" style="height: auto;">

     <table class="table table-striped table-dark display" id="tablaAdoptantes">
        <thead>
            <tr>
                <th scope="col"></th>              
                <th scope="col">Apellido</th>
                <th scope="col">Nombre</th>
                <th scope="col">Telefono</th>
                <th scope="col">Ciudad</th>
                <th scope="col">Dirección</th>
                <th scope="col">Acción</th>
            </tr>
        </thead>
        <tbody>     
        </tbody>
    </table>
</div>
</div>
</div>
</div>

</div>


<script>
    $(document).ready( function () {
// -- Script para activar el datatable en la tabla -- //
$('#table_id').DataTable({
        paging: true,  //--> habilita el paginado
        "language": {    //-------> en este array se puede perzonalizar el texto que se muestra en cada uno de los botones y labels de la tabla y como se muestran los datos
            "lengthMenu": "Muestra _MENU_ revisiones por página",
            "zeroRecords": "No se encontro resultados",
            "info": "Mostrando página _PAGE_ de _PAGES_",
            "infoEmpty": "No hay registros disponibles",
            "infoFiltered": "(Filtrando los _MAX_ registros)",
            "search": "<i class='fas fa-filter'></i> Búsqueda",
            select: {
                rows: "%d fila seleccionada"
            },
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
            { "searchable": false, "targets": 0, "orderable": false, "visible": false},   //---> columna del id
            { "searchable": true, "targets": 1, "orderable": true, "visible": true},      //---> busca por tipo_revision
            { "searchable": true, "targets": 2, "orderable": true, "visible": true},     //---> busca por fecha_revision
            { "searchable": false, "targets": [3], "orderable": false},                //---> columna del adoptante y animal
            ],
        "ordering": true,                     //-->  habilita el ordenamiento de columnas
        "search": {                           // -----> opciones para la busqueda de datos 
            "caseInsensitive": true,        //----> habilita el caseSensitive
            "search": " ",               //---> se le puede asignar un filtro por defecto a la busqueda asi los encuentra y ordena por ese filtro
            "smart": true                    //----->  activa la busqueda smart, no busca el String identico, busca los similares y las ocurrencias
        }
    });

$("#tablaAdoptantes").DataTable({
    ajax: {
        url: 'C_Revision/getAdoptantes',
        dataSrc: ''
    },
    columns: [
    {data: 'id_adoptante', className:"id"},
    {data:'apellido_adoptante', className:'apellido'},
    {data:'nombre_adoptante', className:'nombre'},
    {data:'telefono_adoptante', className:'telefono'},
    {data:'ciudad_adoptante', className:'ciudad'},
    {data:'direccion_adoptante', className:'direccion'}
    ],
    "aoColumnDefs": [
    {
        "aTargets": [6],
        "mData": null,
        "mRender": function (data, type, full) {
            return '<a class="btn btn-success mx-2 btn-ver-animal" href="<?= base_url('C_Adoptante/index/') ?>'+ data.id_adoptante +'">Continuar</a>';
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
        lengthMenu: [5,10,20],

    });
});
</script>
