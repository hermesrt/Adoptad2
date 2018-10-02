<div class="container">
	<div class="row">
		<div class="col-3">
			<div class="card my-5">
				<center><h1 class="my-2"><i class="fas fa-user-circle"></i></h1></center>
				<div class="card-body">
					<center><h5 class="card-title">Adoptante</h5></center>
					<p class="card-text">
						<ul>
							<li>Nombre y apellido:</li>
							<li>Direccion:</li>
							<li>Email:</li>
							<li>Telefono:</li>
						</ul>
					</p>					
					<div class="alert alert-warning" role="alert">
						<p class="font-italic"> <i class="fas fa-info"></i> A izquierda puedes visualizar los animales adoptados por esta persona. Seleciona el boton "Registrar Revision" en que desees.</p>
					</div>
				</div>
			</div>
		</div>
		<div class="col-9">
			<div class="card my-5">
				<div class="card-body">

					<h4 class="card-title"><i class="fas fa-user-circle"></i> Animales:</h4>
					<ul class="list-group">
						<li class="list-group-item">
							<div class="row">
								<div class="col-6">
									<img src="https://loremflickr.com/320/240?random=1">
								</div>
								<div class="col-6">
									<h4>Firulais</h4>
									<ul>
										<li>Edad: </li>
										<li>Sexo: </li>
										<li>Raza: </li>
									</ul>
								</div>
							</div>
							<br>
							<center><button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
  Registrar Revision
</button></center>
						</li>
						<li class="list-group-item">
							<div class="row">
								<div class="col-6">
									<img src="https://loremflickr.com/320/240?random=2">
								</div>
								<div class="col-6">
									<h4>Firulais</h4>
									<ul>
										<li>Edad: </li>
										<li>Sexo: </li>
										<li>Raza: </li>
									</ul>
								</div>
							</div>
							<br>
							<center><button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
  Registrar Revision
</button></center>

						</li>
					</ul>
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
        <h5 class="modal-title" id="exampleModalLabel">Nueva Revision</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary">Registrar Revision</button>
      </div>
    </div>
  </div>
</div>