<div class="container my-5">
	<div class="row">
		<div class="col-sm-12 col-md-3 ">
			<div class="card">
				<div class="card-body">
					<center><h1 class="my-2"><i class="fas fa-book"></i></h1></center>

					<center><h4 class="card-title">Periodos de Seguimiento</h4></center>
					<p class="card-text">En esta sección encontrarás los seguimientos activos de los Centros de Adopción, en caso de ser personal del Centro de Adopción, aquí tambien podrás iniciar nuevos periodos</p>
					<div class="alert alert-warning" role="alert">
						<p class="font-italic"> <i class="fas fa-info"></i> Cuando se inicia un Periodo de Seguimiento nuestro sistema envía automáticamente un email a aquellos adoptantes que que cumplan con las condiciones relacionadas a este.</p>
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-12 col-md-9">
			<div class="card">
				<div class="card-body">
					<center><h1 class="my-2"><i class="fas fa-check"></i></center>						
						<center><h4 class="card-title">Periodos de Seguimiento Activos:</h4></center>
						<button type="button" class="btn btn-primary my-2" data-toggle="modal" data-target="#modalPeriodo" data-placement="right" title="Presione para agregar un nuevo periodo de seguimiento"><i class="far fa-calendar-plus"></i> Agregar Nuevo</button>
						<table class="table table-striped table-dark">
							<thead>
								<tr>
									<th>Tipo de Periodo</th>
									<th>Fecha Inicio Periodo</th>
									<th>Fecha Fin Periodo</th>
								</tr>
							</thead>
							<tbody>
							<?php if ($periodos != false): ?>
							<?php foreach($periodos as $periodo): ?>
								<tr>
                                   <?php switch($periodo->tipo_periodo):
                                    case 'vacunación': 
                                        echo '<td><i class="fas fa-pills"></i> '.$periodo->tipo_periodo.'</td>';break;
                                    case 'castración': 
                                        echo '<td><i class="fas fa-cut"></i> '.$periodo->tipo_periodo.'</td>';break;
                                    case 'seguimiento': 
                                        echo '<td><i class="fas fa-calendar-check"></i> '.$periodo->tipo_periodo.'</td>';break;
                                    endswitch
                                    ?>			
									<td><?= $periodo->fecha_inicio_periodo ?></td> 	
									<td><?= $periodo->fecha_fin_periodo ?></td>
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



	<!-- Modal -->
	<div class="modal fade" id="modalPeriodo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Nuevo Periodo de Seguimiento</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form id="formSeguimiento" method="post" > 
						<fieldset class="form-group">
							<label for="inputGroupSelect01">Tipo de Periodo</label>
							<select class="custom-select" id="inputGroupSelect01">
								<option selected>Seleccione un tipo de periodo de seguimiento</option>
								<option value="1">Vacunación</option>
								<option value="2">Castración</option>
								<option value="3">Seguimiento</option>
							</select>
						</fieldset>
						<fieldset class="form-group">
							<label for="fechaDesde">Fecha Inicio Periodo</label>
							<input type="date" class="form-control" name="" id="fechaDesde">
						</fieldset>
						<fieldset class="form-group">
							<label for="fechaHasta">Fecha Fin Periodo</label>
							<input type="date" name="" class="form-control" id="fechaHasta">
						</fieldset>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
					<button type="submit" class="btn btn-primary btn-iniciar-periodo">Iniciar Periodo</button>
				</div>
			</div>
		</div>
	</div>
	
<script>
    
    
    $('#formSeguimiento').on('submit',function(event){
    
        function validoFechas() {
            $('#fechaDesde').val();
            $('#fehcaHasta').val();
        }

        function recuperoFecha(dato) {
            var fecha = Date(2018,10,17);
            console.log(fecha);
        }
        
        
        event.preventDefault();
        // creo un nuevo Ajax
        $.ajax({
            url: "<?= base_url() ?>/C_Seguimiento/validaFechas",     // The URL for the request
            data: {              // The data to send (will be converted to a query string)
                
            },
            type: "POST",         // Whether this is a POST or GET request
            'beforeSend': function (data)
            {
                recuperoFecha();
                console.log('... cargando...');
            },
            'error': function (data) {
                //si hay un error mostramos un mensaje
                console.log('Tenemos problemas Houston ' + data);
            },
            'success': function (data) {
                var datos = JSON.parse(data);
            }
        })
        // Code to run if the request succeeds (is done);
        // The response is passed to the function
        .done(function( json ) {         
            //  si hizo lo del ajax 
        })
        // Code to run if the request fails; the raw request and
        // status codes are passed to the function
        .fail(function( xhr, status, errorThrown ) {
            alert( "Sorry, there was a problem!" );
            console.log( "Error: " + errorThrown );
            console.log( "Status: " + status );
            console.dir( xhr );
        })
        // Code to run regardless of success or failure;
        .always(function( xhr, status ) {
            alert( "The request is complete!" );
        });
        
    });
    
</script>







