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
							<select class="form-control" id="tipoInforme" onclick="toggleFechas()">
								<option value="adopciones">Informe de Adopciones</option>
								<option value="denuncias">Informe de Denuncias</option>
								<option value="animales">Informe de animales disponibles para adoptar</option>
							</select>
						</div>

						<div class="row" id="divFechas">
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
			<div class="row border border border-success rounded mx-2 my-2 bg-info" id="graficos" style="display: none" >
				<div class="col-12">
					

					<center><h1>Informe de Animales Disponibles</h1> 
						<button class="btn btn-success mx-2 my-2 right" id="btnExportar"><i class="far fa-file-pdf"></i> Exportar Informe</button>
					</center>
				</div>

				<div class="col-12 my-3">
					<div id="disponiblesXcentro"></div>
				</div>
				<div class="col-12 my-3">
					<div id="disponiblesXespecie"></div>
				</div>
				<div class="col-12 my-3">
					<div id="disponiblesXedad"></div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>



<script type="text/javascript">
	var nombreImagenes=[]; //Variable global para almacenar temporalmente los nombres de las img's

	/*Oculta los inputs de fechas si se selecciona el informe de disponiobles*/
	function toggleFechas() {
		if ($("#tipoInforme").val()=="animales") {
			$("#divFechas").hide();
		}else {
			$("#divFechas").show();
		}
	}


	/*Calcula edad en base a "fechaNacimiento"*/
	function calcularEdad(fecha) {
		var hoy = new Date();
		var cumpleanos = new Date(fecha);
		var edad = hoy.getFullYear() - cumpleanos.getFullYear();
		var m = hoy.getMonth() - cumpleanos.getMonth();

		if (m < 0 || (m === 0 && hoy.getDate() < cumpleanos.getDate())) {
			edad--;
		}

		return edad;
	}
	/*Genera un color random para los graficos */
	function getRandomColor() {
		var letters = '0123456789ABCDEF';
		var color = '#';
		for (var i = 0; i < 6; i++) {
			color += letters[Math.floor(Math.random() * 16)];
		}
		return color
	}
	/*Obtiene las especies sin repetir para un centro pasado por parametro*/
	function distinctEspecies(centro) {
		var especies = [];
		$.each(centro.animales, function(k, animal) {
			if (!especies.includes(animal.especie_animal)) {
				especies.push(animal.especie_animal);
			}
		});
		return especies;/*devuelve array: ["perro, "gato", ...]*/
	}
	/*Cuenta la cantidad de animales de por especie*/
	function countEspecies(animales, distinctEspecies) {
		var count=[];
		$.each(distinctEspecies, function(i, val) {	
			count.push({
				especie: val,
				cantidad:0
			});
		});
		$.each(distinctEspecies, function(j, especie) {
			$.each(animales, function(k, animal) {
				if (animal.especie_animal == especie) {
					$.each(count, function(index, val) {
						if (val.especie==especie) {
							count[index].cantidad++
						}
					});
				}
			});
		});
		return count; /*devuelve array: ["perro" => 5, "gato" => 2, ...]*/
	}
	/*Cuenta la cantidad de animales S/rango de edad*/
	function countEdad(animales) {
		var count=[
		{
			rango: "Menor a 1 año",
			cantidad: 0
		},
		{
			rango: "Entre 1 y 5 años ",
			cantidad: 0
		},
		{
			rango: "Mayor a 5 año",
			cantidad: 0
		}
		];

		$.each(animales, function(index, animal) {
			var edad = calcularEdad(animal.fechaNacimiento);
			if (edad == 0) {
				count[0].cantidad++;
			}
			if (edad > 1 && edad < 5) {
				count[1].cantidad++;
			}
			if (edad > 5) {
				count[2].cantidad++;
			}
		});
		return count;
	}

	/*Genera y guarda como JPG un grafico disponibles por edad para cada centro*/
	function disponiblesXedad(datos) {
			$("#disponiblesXedad").empty(); //Borra el contenido del DIV para su siguiente utilizacion

			var divId=0; //variable que q le da el id al DIV de cada grafico

			$.each(datos, function(index, centro) {	//Recorro cada Centro

				google.charts.load("current", {packages:["corechart"]});
				google.charts.setOnLoadCallback(drawChart);
				function drawChart() {
					var datos2chart = [];
					/*Agrego titulo y DIV's que contendran los graficos*/
					$("#disponiblesXedad").append("<center><h5>Disponibles por edad en: "+centro.nombreCA+" </h5></center>");
					$("#disponiblesXedad").append("<div id='chart2"+divId+"'></div>");

					var count = countEdad(centro.animales); //Obtengo el countEdad para el centro acutal

					datos2chart[0]=["Especies", "Porcentaje"];	//Encabezado del grafico


					if (!(count[0].cantidad ==0 && count[1].cantidad ==0 && count[2].cantidad ==0 )) {	//Si hay datos proceso
						var i =1;
					$.each(count, function(index, val) {	//Recorro el countEdad y lo agrego al Array para el grafico
						datos2chart[i]=[val.rango,val.cantidad];
						i++;
					});

						var data = google.visualization.arrayToDataTable(datos2chart);	//Parse datos a GoogleCharts

						var options = {
							title: 'Animales disponibles por edad en: ' + centro.nombreCA,	//Opciones para el grafico actual
							is3D: true,
						};

						var chart = new google.visualization.PieChart(document.getElementById("chart2"+divId));	//genero el grafico en el DIV pasado por parametro

						/*Cuando el grafico termine de dibujarse lo guardo como imagen*/
						google.visualization.events.addListener(chart, 'ready', function () {
							$.ajax({
								url: '<?php echo base_url("C_Informes/guardarImagen") ?>',
								type: 'POST',
								data: {
									imagen: chart.getImageURI(),
					 			nombre: "animalesXedad"+divId+".jpg"	//Ej: "animalesXedad0.jpg", "animalesXedad1.jpg",...
					 		},
					 	})
							.done(function() {
					 		nombreImagenes.push("animalesXedad"+divId+".jpg");	//guardo el nombre de la imagen en un array para usarlo luego
					 		divId++;	//incremento para generar un DIV con distinto id
					 		console.log("success");
					 	})
							.fail(function() {
								console.log("error");
							});
						});
					 chart.draw(data,options);	//Dibujo el grafico
					} else {	//si no hay datos muestro muestro cartel
						$("#disponiblesXedad").append("<center><h6 class='alert alert-warning'>No hay datos suficientes para: "+centro.nombreCA+" </h6></center>");
					}
				}
			});
		}
		/*Genera y guarda como JPG un grafico disponibles por especie para cada centro*/
		function disponiblesXespecie(datos) {

			$("#disponiblesXespecie").empty();

			var divId=0; //variable que q le da el id al div de cada grafico
			$.each(datos, function(index, centro) {

				google.charts.load("current", {packages:["corechart"]});
				google.charts.setOnLoadCallback(drawChart);
				function drawChart() {
					var datos2chart = [];
					$("#disponiblesXespecie").append("<center><h5>Disponibles por especie en: "+centro.nombreCA+" </h5></center>");
					$("#disponiblesXespecie").append("<div id='chart"+divId+"'></div>");

					var especies = distinctEspecies(centro);
					var count = countEspecies(centro.animales,especies);

					if (count.length > 0) {
						datos2chart[0]=["Especies", "Porcentaje"];

						var i =1;
						$.each(count, function(index, val) {
							datos2chart[i]=[val.especie,val.cantidad];
							i++;
						});

						var data = google.visualization.arrayToDataTable(datos2chart);

						var options = {
							title: 'Animales disponibles por especies en: ' + centro.nombreCA,
							is3D: true,
						};
						var chart = new google.visualization.PieChart(document.getElementById("chart"+divId));
					 // Wait for the chart to finish dibujarse before call the getImageURI() method
					 google.visualization.events.addListener(chart, 'ready', function () {
					 	$.ajax({
					 		url: '<?php echo base_url("C_Informes/guardarImagen") ?>',
					 		type: 'POST',
					 		data: {
					 			imagen: chart.getImageURI(),
					 			nombre: "animalesXespecie"+divId+".jpg"
					 		},
					 	})
					 	.done(function() {
					 		nombreImagenes.push("animalesXespecie"+divId+".jpg");
					 		divId++;

					 		console.log("success");
					 	})
					 	.fail(function() {
					 		console.log("error");
					 	});
					 });
					 chart.draw(data,options);
					} else {
						$("#disponiblesXespecie").append("<center><h6 class='alert alert-warning'>No hay datos suficientes para: "+centro.nombreCA+" </h6></center>");
					}
				}
			});
		}
		/*Genera y guarda como JPG un grafico disponibles centro(un solo grafico) */
		function disponiblesXcentro(datos) {
			$("#disponiblesXcentro").empty();
			$("#disponiblesXcentro").append("<center><h5>Disponibles por Centro</h5></center>");
			$("#disponiblesXcentro").append("<div id='xCentro'></div>");
			google.charts.load("current", {packages:['corechart']});
			google.charts.setOnLoadCallback(drawChart);
			function drawChart() {
				var datos2chart = [];
				datos2chart[0] = ['Centro', 'Cantidad', { role: 'style' }];

				var color = getRandomColor();
				$.each(datos, function(indice,valor) {
					var cantidad=0;
					if (valor.animales != false){
						cantidad=valor.animales.length;
					}

					datos2chart[indice+1] = [valor.nombreCA, cantidad, color]
				});
				var data = google.visualization.arrayToDataTable(datos2chart);

				var options = {
					title: "Animales disponibles para adoptar por centro",
					bar: {groupWidth: '25%'},
					legend: 'none',
				};

				var xCentro = document.getElementById('xCentro');
				var chart = new google.visualization.ColumnChart(xCentro);
				google.visualization.events.addListener(chart, 'ready', function () {
					$.ajax({
						url: '<?php echo base_url("C_Informes/guardarImagen") ?>',
						type: 'POST',
						data: {
							imagen: chart.getImageURI(),
							nombre: "animalesXcentro.jpg"
						},
					})
					.done(function() {
						nombreImagenes.push("animalesXcentro.jpg");
						console.log("success");
					})
					.fail(function() {
						console.log("error");
					});
				});
				chart.draw(data,options);
			}
		}

		$(document).ready(function() {

			$("#btnInforme").on('click', function(event) {

			var centros = []; // Array de centros seleccionados
			$.each($("input[name='centro']:checked"), function(){            //get the CA's selected
				centros.push($(this).val());
			});
			var informe = $("#tipoInforme").val();
			var desde = $("#desde").val();	//Las fechas deben estar aunque no se utilizen!!!
			var hasta = $("#hasta").val();

			if (centros.length != 0) { //Si se selecciono almenos 1 CA
				//obtengo la info segun el informe
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
				.done(function(rta) {

					switch (informe) {
						case "animales":
						nombreImagenes = [];		//vacio el array para su proximo uso
						var datos = JSON.parse(rta);
						disponiblesXcentro(datos);
						disponiblesXespecie(datos);	//dibuja y guarda img's de los graficos
						disponiblesXedad(datos);
						$("#graficos").show(); //Muestra el DIV que los contiene
						break;

						case "denuncias":					
						alert("Informe denuncias pendiente!");
						break;

						case "adopciones":					
						alert("Informe adopciones pendiente!");
						break;
					}

				})
				.fail(function() {
					alert("error");
				});
			} else {
				alert("Debe seleccionar almenos un Centro de Adopcion!");
			}
		});

			$("#btnExportar").click(function(event) {

				$.ajax({
					url: '<?php echo base_url('C_Informes/salvarNombres') ?>',	//Guardo los nombres de las img's en SESSION
					type: 'POST',
					data: {nombreImagenes: JSON.stringify(nombreImagenes)},
				})
				.done(function(rta) {
					if (rta=="ok") {
						window.location.href = "<?php echo base_url('C_Informes/exportarPDF'); ?>";	//si todo esta OK genero el PDF
					} else {
						alert("Error al exportar informe, intente nuevamente!")
					}
				})
				.fail(function() {
					console.log("error");
				})
				.always(function() {
					console.log("complete");
				});
			});
		});

	</script>