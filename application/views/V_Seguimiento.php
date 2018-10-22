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
                                    case 'Vacunacion': 
                                        echo '<td><i class="fas fa-pills"></i> '.$periodo->tipo_periodo.'</td>';break;
                                    case 'Castracion': 
                                        echo '<td><i class="fas fa-cut"></i> '.$periodo->tipo_periodo.'</td>';break;
                                    case 'Seguimiento': 
                                        echo '<td><i class="fas fa-calendar-check"></i> '.$periodo->tipo_periodo.'</td>';break;
                                    endswitch
                                    ?>			
									<td><?= $periodo->fecha_inicio_periodo ?></td> 	
									<td><?= $periodo->fecha_fin_periodo ?></td>
								</tr>
								<?php endforeach ?>
								<?php  endif ?>
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
                <form id="formulario" class="formulario" method="post"> 
                    <fieldset class="form-group">
                        <label for="inputGroupSelect01">Tipo de Periodo</label>
                        <select class="custom-select" id="tipoPeriodo">
                            <option selected >Seleccione un tipo de periodo de seguimiento</option>
                            <option value="Vacunacion">Vacunación</option>
                            <option value="Castracion">Castración</option>
                            <option value="Seguimiento">Seguimiento</option>
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
                <input type="submit" class="btn btn-primary btn-periodo" id="btn_periodo" value="Iniciar Periodo">
            </div>
        </div>
    </div>
</div>
	
	
	
<!-- Modal que se muestra cuando se registro correctamente el periodo de seguimiento -->
<div class="modal fade" id="modalMensaje" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Periodo registrado</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <form>
                <fieldset>
                    <label id="mensaje"></label>
                </fieldset>
            </form>
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal">Ok</button>
      </div>
    </div>
  </div>
</div>



<!-- Script para hacer el ajax y las validaciones --> 	
<script>
    
    //------> validacion de fechas para mandar por el formulario
    function validoSeleccionFechas() {
        //------> obtengo el valor de las fechas que elige
        var fechaHasta = $('#fechaHasta').val();
        var fechaDesde = $('#fechaDesde').val();
        
        if(fechaDesde == fechaHasta){  //-----> si las cadenas son iguales entonces la validacion es invalida
            console.log('son iguales');
            return false;
        }
        // fechaHasta = fechaHasta.split('-',3).reverse().join('-'); //---> esto da vuelta la cadena y la vuelve a unir con '-'
        fechaHasta = fechaHasta.split('-',3);   //--> la fecha esta devuelta como un array separado con -
        console.log(fechaHasta); 
        fechaDesde = fechaDesde.split('-',3);    //--> la fecha esta devuelta como un array separado con -
        console.log(fechaDesde);
        
        //---> creo dos objetos Date con los datos de los array fechas
        fechaHasta = new Date(fechaHasta[0],fechaHasta[1],fechaHasta[2]);
        fechaDesde = new Date(fechaDesde[0],fechaDesde[1],fechaDesde[2]);
        
        if(fechaDesde<fechaHasta){   //----> si la fechaDesde es menor que hasta sale del validar sino no
            console.log('estan bien');
            return true;
        } else {
            console.log('estan mal');
            return false;
        }
        
    }
    
    
    //-------> Comportamiento cuando clickea el boton de iniciar periodo
    $('#btn_periodo').click(function(event){
        
        event.preventDefault();
        var tipo = $('#tipoPeriodo').val();
        var fechaHasta = $('#fechaHasta').val();
        var fechaDesde = $('#fechaDesde').val();
        console.log("algo loco "+tipo+" fecha hasta: "+fechaHasta+" fecha desde: "+fechaHasta);
        
        if(tipo != "Seleccione un tipo de periodo de seguimiento"){
            if (validoSeleccionFechas()){
                // creo un nuevo Ajax
                $.ajax({
                    url: "<?= base_url('/C_Seguimiento/validaFechas') ?>",     // The URL for the request
                    data: {              // The data to send (will be converted to a query string)
                        tipoPeriodo: tipo,
                        fechaDesde: fechaDesde,
                        fechaHasta: fechaHasta
                    },
                    type: "POST",         // Whether this is a POST or GET request
                    'beforeSend': function (data)
                    {
                        console.log('... cargando...');
                    },
                    'error': function (data) {
                        //si hay un error mostramos un mensaje
                        console.log('Tenemos problemas Houston ' + data);
                    },
                    'success': function (data) {
                        datos = JSON.parse(data);
                        console.log(datos);
                        if (datos['periodo_valido']){
                            $('#mensaje').html('El periodo se registro exitosamente!');
                        } else {
                            $('#mensaje').html('El periodo ingresado no es valido porque se superpone con otros periodos de seguimiento.');
                        }
                    }
                })
                // Code to run if the request succeeds (is done);
                // The response is passed to the function
                .done(function( json ) {         
                    console.log('se hizo bien man 👏👏');
                    $('#modalPeriodo').modal('hide');
                    $('#modalMensaje').modal('show');
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
                    console.log( "The request is complete!" );
                });
            } else {
                alert('Seleccione las fechas correctamente!');
            }
        } else {
            alert('Seleccion un tipo de periodo de seguimiento!');
        }
        
    });  
    
</script>







