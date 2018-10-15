
<div class="container">
	<div class="row">
		<div class="col-3">
			<div class="card my-5">
				<center><h1 class="my-2"><i class="fas fa-bullhorn"></i></h1></center>
				<div class="card-body">
					<h5 class="card-title">Sección de Denuncias</h5>
					<p class="card-text">En esta sección podrás registrar denuncias a aquellos adoptantes registrados en el sistema que hayan incumplido las obligaciones legales del cuidado animal.</p>

					<div class="alert alert-warning" role="alert">
						<p class="font-italic"> <i class="fas fa-info"></i> Nuestro sistema usa este registro de denuncias para llevar el control de aquellas personas que yo no son aptas para adoptar</p>
					</div>
				</div>
			</div>
		</div>
		<div class="col-9">
			<div class="card my-5">
				<center><h1 class="my-2"><i class="fas fa-question-circle"></i> Formulario de denuncia</center>
    				<div class="card-body">
						<table class="table table-striped table-dark display" id="table_id">
						<thead>
							<tr>
                                <th scope="col">#</th>
								<th scope="col">Nombre y Apellido</th>
								<th scope="col">Dirección</th>
								<th scope="col">Email</th>
								<th scope="col">Teléfono</th>
								<th scope="col">Acción</th>
							</tr>
						</thead>
						<tbody>
						<?php foreach($adoptantes as $adoptante): ?>
							<tr>
                                <th scope="row"><?= $adoptante -> id_adoptante ?></th>
                                <th scope="row"><?= $adoptante ->nombre_adoptante." ".$adoptante->apellido_adoptante ?></th>
								<td><?= $adoptante->direccion_adoptante ?></td>
								<td><?= $adoptante->email_adoptante ?></td>
								<td><?= $adoptante->telefono_adoptante ?></td>
								<td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Registrar Denuncia</button></td>
							</tr>
							<?php endforeach ?>
						</tbody>
					</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>




<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Datos de la Denuncia</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="formDenuncia" id="formDenuncia" method="post" action="<?= base_url('/C_Denuncia/registraDenuncia') ?>">
        	<fieldset class="form-group">
        		<label for="formGroupExampleInput">Motivo de la denuncia</label>
        		<select class="custom-select selectDenuncia" id="selectMotivoDenuncia" >
                    <option selected>Seleccione motivo de la denuncia</option>
                    <option value="1">Maltrato</option>
                    <option value="2">Abandono</option>
                    <option value="3">Tenencia Irresponsable</option>
                    <option value="4">Otros</option>
				</select>
        	</fieldset>
        	<fieldset>
        	    <label for="nombre">Nombre y Apellido:</label>
                <input type="text" class="form-control nombreApellido" id="nombreApellido" placeholder="Ingrese nombre y apellido..." required >
        	</fieldset>
        	<fieldset>
        	    <label for="formGroupExampleInput" >Detalle de denuncia:</label>
                <textarea  class="form-control" id="descripcionDenuncia" placeholder="Ingrese un detalle de la denuncia..."></textarea>
        	</fieldset>
        	<div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary btn-registrar-denuncia">Regsitrar Denuncia</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>



<!-- Script para activar el datatable en la tabla -->
<script>
$(document).ready( function () {
    
    //------------> seteo las configuraciones de la tabla
    $('#table_id').DataTable({
        select: true,  //-----> hace que las filas sean seleccionables
        paging: true,  //--> habilita el paginado
        "language": {    //-------> en este array se puede perzonalizar el texto que se muestra en cada uno de los botones y labels de la tabla y como se muestran los datos
            "lengthMenu": "Muestra _MENU_ denuncias por página",
            "zeroRecords": "No se encontro resultados",
            "info": "Mostrando página _PAGE_ de _PAGES_ páginas",
            "infoEmpty": "No hay registros disponibles",
            "infoFiltered": "(Filtrando los _MAX_ registros)",
            "search": "<i class='fas fa-filter'></i> Buscar por dirección: ",
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
            { "searchable": false, "targets": [1,3,4], "orderable": true, "visible": true},      
            { "searchable": true, "targets": 2, "orderable": true, "visible": true},
             { "searchable": false, "targets": 5, "orderable": false, "visible": true}   
        ],
        "ordering": true,                     //-->  habilita el ordenamiento de columnas
        "search": {                           // -----> opciones para la busqueda de datos 
            "caseInsensitive": true,        //----> habilita el caseSensitive
            "search": " ",               //---> se le puede asignar un filtro por defecto a la busqueda asi los encuentra y ordena por ese filtro
            "smart": true                    //----->  activa la busqueda smart, no busca el String identico, busca los similares y las ocurrencias
        }
    });
 
    
} );
</script>


<script>
    
    function validoNombreApellido(){
        var nombreApellido = $('#nombreAlta').val();
        if((nombreApellido!="")&&(isNaN(nombreApellido))){
           alert('Ingrese el nombre y apellido del adoptante');
            return false;
        } else {
            return true;
        }
    }
    
    $('.btn-registrar-denuncia').click(function(event){
        var tipoDenuncia = $('#selectMotivoDenuncia').val();
        //----> si el motivo de la denuncia es correcto pasa al otro if
        if (tipoDenuncia != "Seleccione motivo de la denuncia"){
            //----> si el nombre y apellido es valido envia el formulario
            if (validoNombreApellido()){
                var formulario = document.forms['formDenuncia'];
                formulario.submit();
            }
        }else{
            alert('Seleccione un tipo de denuncia!');
        }
    });
    
</script>

