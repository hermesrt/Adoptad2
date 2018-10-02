<div class="container">
	<div class="row">
		<div class="col-3">
			<div class="card my-5">
				<center><h1 class="my-2"><i class="fas fa-bullhorn"></i></h1></center>
				<div class="card-body">
					<h5 class="card-title">Seccion de Denuncias</h5>
					<p class="card-text">En esta seccion podras registrar denuncias a aquellos adoptantes registrados en el sistema que hayan incumplido las obligaciones legales del cuidado animal.</p>

					<div class="alert alert-warning" role="alert">
						<p class="font-italic"> <i class="fas fa-info"></i> Nuestro sistema usa este el registro de denuncias para llevar el control de quellas personas que yo no son aptas para adoptar</p>
					</div>
				</div>
			</div>
		</div>
		<div class="col-9">
			<div class="card my-5">
				<center><h1 class="my-2"><i class="fas fa-question-circle"></i> Formulario de denuncia</center>
					<div class="card-body">
						<form>
							<fieldset class="form-group">
								<div class="row">
									<div class="col-3">
										<label for="direccion">Buscar por Direccion:</label>
									</div>
									<div class="col-9">
										<input type="text" class="form-control" id="direccion" placeholder="Ingrese Direccion">

									</div>
								</div>
							</fieldset>
						</form>
						<table class="table table-striped table-dark">
							<thead>
								<tr>
									<th scope="col">#</th>
									<th scope="col">Nombre y Apellido</th>
									<th scope="col">Direccion</th>
									<th scope="col">Email</th>
									<th scope="col">Telefono</th>
									<th scope="col">Accion</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<th scope="row">1</th>
									<td>Mark</td>
									<td>Otto</td>
									<td>mark@gmail.com</td>
									<td>1550145798</td>
									<td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Registrar Denuncia</button></td>
								</tr>
								<tr>
									<th scope="row">2</th>
									<td>Jacob</td>
									<td>Thornton</td>
									<td>jacob@Gmail.com</td>
									<td>154789878</td>
									<td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Registrar Denuncia</button></td>
									
								</tr>
								<tr>
									<th scope="row">3</th>
									<td>Larry</td>
									<td>the Bird</td>
									<td>LarryTB@Hotmail.com</td>
									<td>156258741</td>
									<td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Registrar Denuncia</button></td>
									
								</tr>
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
        <form>
        	<fieldset class="form-group">
        		<label for="formGroupExampleInput">Motivo de la denuncia</label>
        		<input type="text" class="form-control" id="formGroupExampleInput" placeholder="Ingrese Motivo">
        	</fieldset>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary">Regsitrar Denuncia</button>
      </div>
    </div>
  </div>
</div>