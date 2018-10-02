<div class="container my-5">
	<div class="row">
		<div class="col-3 ">
			<div class="card">
				<div class="card-body">
					<center><h1><i class="fas fa-chart-pie"></i></h1></center>
					<center><h4 class="card-title">Generador de informes</h4></center>
					<p class="card-text">En este sección podras generar informes para poder contar con la información estadística de los Centros de Adopción de una manera mas util para su uso y/o seguimiento. Selecciona el intervalo de fechas y los Centros de Adopción y se genereara un PDF con el informe</p>
					<div class="alert alert-warning" role="alert">
						<p class="font-italic">
							<i class="fas fa-info"></i> Los informes disponibles son los siguientes:
							<ul>
								<li>Informe de Adopciones</li>
								<li>Informe de Denuncias</li>
								<li>Informe de animales disponibles para adoptar</li>	
							</ul>
						</p>
					</div>	
				</div>
			</div>
		</div>
		<div class="col-9">

			<div class="card">
				<div class="card-body">
					<center><h4 class="card-title"><i class="fas fa-chart-pie"></i> Generador de Informes</h4></center>
					<br>
					<form>	
						<center>
						<div class="form-group">
							<div class="col-sm-10">
								<input type="checkbox" checked> Centro de Adopcion 1
								<input type="checkbox" > Centro de Adopcion 2
								<input type="checkbox"> Centro de Adopcion 3
							</div>
						</div>
						</center>

						<div class="form-group">
							<label for="tipoInforme"></label>
							<select class="form-control" id="tipoInforme">
								<option>Informe de Adopciones</option>
								<option>Informe de Denuncias</option>
								<option>Informe de animales disponibles para adoptar</option>
							</select>
						</div>

						<div class="row">
							<div class="form-group col-6">
								<label>Fecha desde: </label> <input class="form-control" type="date" name="">
							</div>
							<div class="form-group col-6">

								<label>Fecha Hasta: </label> <input class="form-control" type="date" name="">
							</div>
						</div>
						<center><button type="button" class="btn btn-primary"><i class="fas fa-chart-pie"></i> Generar informe</button></center>
					</form>
				</div>


			</div>
		</div>
	</div>
</div>
</div>