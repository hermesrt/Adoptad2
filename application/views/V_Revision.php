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
						<p class="font-italic"> <i class="fas fa-info"></i> Recuerda que necesitas el domicilio del adptante para poder realizar esta acción.</p>
					</div>
					<center><a  data-toggle="modal" data-target="#ModalNuevaRevision" class="btn btn-success">Nueva Revisión</a></center>
				</div>
			</div>
		</div>
		<div class="col-9">
			<div class="card my-5">
				<div class="card-body">

					<h4 class="card-title"><i class="fas fa-notes-medical"></i> Revisiones:</h4>

					<h6><i class="fas fa-filter"></i> Filtros</h6>	
					<form>
						<fieldset class="form-group">
							<div class="row">
								<div class="col-1">
									<label for="Fecha">Fecha:</label>
								</div>
								<div class="col-5">
									<input type="date" class="form-control" id="Fecha">
								</div>
								<div class="col-1">
									<label for="tipo">Tipo:</label>
								</div>
								<div class="col-5">
									<select  class="form-control">
										<option>Vacuncaión</option>
										<option>Castración</option>
										<option>Seguimiento</option>
									</select>
								</div>
							</div>
						</fieldset>
					</form>
					<table class="table table-striped table-dark">
						<thead>
							<tr>
								<th scope="col">#</th>
								<th scope="col">Tipo</th>
								<th scope="col">Fecha</th>
								<th scope="col">Adoptante</th>
								<th scope="col">Animal</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<th scope="row">1</th>
								<td>Vacunación</td>
								<td>23/04/1997</td>
								<td><a href="#">Jorge Perez</a></td>
								<td><a class="btn btn-primary" href="#">Ver Animal</a></td>
							</tr>
							<tr>
								<th scope="row">1</th>
								<td>Vacunación</td>
								<td>23/04/1997</td>
								<td><a href="#">Jorge Perez</a></td>
								<td><a class="btn btn-primary" href="#">Ver Animal</a></td>
							</tr>
							<tr>
								<th scope="row">1</th>
								<td>Vacunación</td>
								<td>23/04/1997</td>
								<td><a href="#">Jorge Perez</a></td>
								<td><a class="btn btn-primary" href="#">Ver Animal</a></td>
							</tr>
						</tbody>
					</table>

				</div>
			</div>
		</div>
	</div>
</div>



<!-- Modal -->
<div class="modal fade" id="ModalNuevaRevision" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Buscar Adoptante</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form-inline">
        	<div class="form-group">
        		<label class="mx-5" for="Direccion">Dirección:</label>
        		<input type="text" class="form-control" name="Direccion" id="Direccion" placeholder="Ingrese Direccion...">
        	</div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <a class="btn btn-primary" href="<?= base_url('C_Revision/NuevaRevision'); ?>">Continuar con la Revisión</a>
      </div>
    </div>
  </div>
</div>