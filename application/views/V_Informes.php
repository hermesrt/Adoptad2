<div class="container my-5">
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-3">
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
		<div class="col-xs-12 col-sm-12 col-md-9">

			<div class="card">
				<div class="card-body">
					<center><h4 class="card-title"><i class="fas fa-chart-pie"></i> Generador de Informes</h4></center>
					<br>
					<form>	
						<center>
							<div class="form-group">
								<div class="col-sm-10">
									<?php foreach($centros as $centro): ?> 
										<input type="checkbox" name="centro" value="<?= $centro -> id_centro ?>"><?= $centro -> nombre_ca ?>
									<?php endforeach ?>
								</div>
							</div>
						</center>

						<div class="form-group">
							<label for="tipoInforme">Seleccione el tipo de informe:</label>
							<select class="form-control" id="tipoInforme">
								<option value="adopciones">Informe de Adopciones</option>
								<option value="denuncias">Informe de Denuncias</option>
								<option value="animales">Informe de animales disponibles para adoptar</option>
							</select>
						</div>

						<div class="row">
							<div class="form-group col-6">
								<label data-toggle="tooltip" data-placement="right" title="Fecha desde donde se comienzan a recuperar los datos para generar el informe">Fecha desde: </label> <input class="form-control" type="date" id="desde">
							</div>
							<div class="form-group col-6">

								<label data-toggle="tooltip" data-placement="right" title="Fecha tope hasta donde se recuperan los datos para generar el informe">Fecha hasta: </label> <input class="form-control" type="date" id="hasta">
							</div>
						</div>
						<center><button type="button" class="btn btn-primary" id="btnInforme"><i class="fas fa-chart-pie"></i> Generar informe</button></center>
					</form>
				</div>


			</div>
		</div>
	</div>
</div>
</div>

<script type="text/javascript">
	
	$(document).ready(function() {
		$("#btnInforme").on('click', function(event) {

			var centros = [];
			$.each($("input[name='centro']:checked"), function(){            //get the CA's selected
				centros.push($(this).val());
			});
			var informe = $("#tipoInforme").val();
			var desde = $("#desde").val();
			var hasta = $("#hasta").val();

			$.ajax({
				url: '<?php echo base_url('C_Informes/generarInforme') ?>',
				type: 'POST',
				data: {
					centros: centros,
					informe: informe,
					desde: desde,
					hasta: hasta
				},
			})
			.done(function(a) {
				alert(informe)
				console.log(a);
			})
			.fail(function() {
				alert("error");
			});
			


		});
		
	});

</script>