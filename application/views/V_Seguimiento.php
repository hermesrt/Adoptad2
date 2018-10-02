<div class="container my-5">
	<div class="row">
		<div class="col-sm-12 col-md-3 ">
			<div class="card">
				<div class="card-body">
					<center><h1 class="my-2"><i class="fas fa-book"></i></h1></center>

					<center><h4 class="card-title">Periodos de Seguimiento</h4></center>
					<p class="card-text">En esta sección encontraras los seguimientos activos de los Centros de Adopción, en caso de ser personal del Centro de Adopción, aqui tambien podras iniciar nuevos periodos</p>
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
						<button type="button" class="btn btn-primary my-2" data-toggle="modal" data-target="#modalPeriodo"><i class="far fa-calendar-plus"></i> Agregar nuevo</button>
						<table class="table table-striped table-dark">
							<thead>
								<tr>
									<th>Tipo de Periodo</th>
									<th>Fecha Desde</th>
									<th>Fecha Hasta</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td><i class="fas fa-pills"></i> Vacunación</td>
									<td>23/04/18</td>
									<td>23/09/18</td>
								</tr>
								<tr>
									<td><i class="fas fa-cut"></i> Castración</td>
									<td>23/04/18</td>
									<td>23/09/18</td>
								</tr>
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
					<form>
						<fieldset class="form-group">
							<label for="inputGroupSelect01">Tipo de Periodo</label>
							<select class="custom-select" id="inputGroupSelect01">
								<option selected>Seleccione un periodo de vacunación</option>
								<option value="1">Vacunación</option>
								<option value="2">Castración</option>
								<option value="3">Seguimiento</option>
							</select>
						</fieldset>
						<fieldset class="form-group">
							<label for="fechaDesde">Fecha Desde</label>
							<input type="date" class="form-control" name="" id="fechaDesde">
						</fieldset>
						<fieldset class="form-group">
							<label for="fechaHasta">Fecha Desde</label>
							<input type="date" name="" class="form-control" id="fechaHasta">
						</fieldset>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
					<button type="button" class="btn btn-primary">Iniciar Periodo</button>
				</div>
			</div>
		</div>
	</div>