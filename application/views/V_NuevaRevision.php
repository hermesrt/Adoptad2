<div class="container">
	<div class="row">
		<div class="col-3">
			<div class="card my-5">
				<center><h1 class="my-2"><i class="fas fa-user-circle"></i></h1></center>
				<div class="card-body">
					<center><h5 class="card-title">Adoptante</h5></center>
					<p class="card-text">
						<ul>
							<li>Nombre y apellido:</li> <?= $adoptante->nombre_adoptante ?>, <?= $adoptante->apellido_adoptante ?>  
							<li>Dirección: </li><?= $adoptante->direccion_adoptante ?>
							<li>Email: </li><?= $adoptante->email_adoptante ?>
							<li>Teléfono:</li> <?= $adoptante->telefono_adoptante ?>
						</ul>
					</p>					
					<div class="alert alert-warning" role="alert">
						<p class="font-italic"> <i class="fas fa-info"></i> En esta sección puedes visualizar los datos del adoptante y los animales adoptados por este. Seleciona el botón "Registrar Revisión" en el animal que desees.</p>
					</div>
				</div>
			</div>
		</div>
		<div class="col-9">
			<div class="card my-5">
				<div class="card-body">

					<h4 class="card-title"><i class="fas fa-user-circle"></i> Animales:</h4>
					<ul class="list-group">
						<?php if ($adopciones): ?>							
							<?php foreach ($adopciones as $adopcion): ?>
								<li class="list-group-item">
									<div class="row">
										<div class="col-6">
											<img src="<?= base_url('assets/img/animales/').$adopcion->animal->nombre_imagen_animal ?>">
										</div>
										<div class="col-6">
											<h4><?= $adopcion->animal->nombre_animal ?></h4>
											<ul>
												<li>Especie: <?= $adopcion->animal->especie_animal ?></li>
												<li>Raza: <?= $adopcion->animal->raza_animal ?></li>
												<li>Edad: <?= $adopcion->animal->fechaNacimiento ?></li>
												<li>Sexo: <?= $adopcion->animal->sexo_animal ?></li>
												<li>Castrado:
													<?php if ($adopcion->animal->castrado==1): ?>
														Si
														<?php else: ?>
															No
														<?php endif ?>

													</li>
												</ul>
											</div>
										</div>
										<br>
										<center>
											<button type="button" class="btn btn-success btn-registrar" id="<?=  $adopcion->animal->id_animal ?>">
												Registrar Revisión
											</button>
										</center>
									</li>
									<input type="hidden" id="id_usuario" value="<?= $this->session->userdata('id_usuario') ?>">
								<?php endforeach ?>
							<?php endif ?>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Modal -->
	<div class="modal fade" id="modalRevision" tabindex="-1" role="dialog">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Nueva Revisión</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form id="formRevision" method="post">
						
						<div class="form-group">
							<label for="fecha">Fecha revisión</label>
							<input type="date" class="form-control" id="fecha" placeholder="Fecha">
						</div>
						<div class="form-group">
							<label for="TipoRevision">Tipo de revisión</label>
							<select class="form-control" id="TipoRevision" onclick="MostrarTipoVacuna();">
								<option value="Castracion">Castración</option>
								<option value="Seguimiento">Seguimiento</option>
								<option value="Vacunacion">Vacunación</option>						
							</select>
						</div>
						<div class="form-group" style="display: none;" id="divVacuna">
							<label for="tipoVacuna">Tipo de vacuna</label>
							<select class="form-control" id="tipoVacuna">
								<?php foreach($vacunas as $vacuna): ?>
									<option value="<?=  $vacuna->id_vacuna ?>"><?= $vacuna->nombre_vacuna ?></option>
								<?php endforeach ?>						
							</select>
						</div>
						<div class="form-group" >
							<label for="detalle">Detalle de revisión</label>
							<textarea class="form-control" id="detalle"></textarea>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
						<button type="submit" class="btn btn-primary" id="guardar">Registrar Revisión</button>
					</div>
				</form>
			</div>
		</div>
	</div>


	<script type="text/javascript">

	//--------Muestra u Oculta el input tipo vacuna------------//
	function MostrarTipoVacuna() {
		if ($('#TipoRevision').val()=='Vacunacion') {
			$('#divVacuna').show();
		} else {
			$('#divVacuna').hide();
		}
	}

	$(document).ready(function() {
		$(".btn-registrar").click(function(event) {
			$("#modalRevision").modal("show");
			var idAnimal = this.closest('button').id;
			$("#formRevision").on("submit",function(e) {
				e.preventDefault();
				//var fechaActual = Date();
				if ($("#fecha").val()) {
					$.ajax({
						url: '<?= base_url('C_Adoptante/registrarRevision') ?>',
						type: 'POST',
						data: {
							id_animal: idAnimal,
							fecha: $("#fecha").val(),
							TipoRevision: $("#TipoRevision").val(),
							tipoVacuna: $("#tipoVacuna").val(),
							detalle: $("#detalle").val()

						},
					})
					.done(function(msg) {
						alert(msg);
						$("#modalRevision").modal("hide");
						window.location = "";
						// probar en IE (agregar window.location.href )
						// no se deberia refrescar la pagina


					})
					.error(function(a) {
						alert(a);
					});;
				} else {
					alert("Ingrese una fecha valida!");
				}
			});

		});
	});	
</script>