<div class="container my-5">
	<div class="row">
		<div class="col">
			<div class="card">
				<div class="card-body">
					<div class="row">						
						<div class="col-3">
							<img class="card-img-top" src="<?= base_url() ?>assets/img/animales/<?= $animal -> nombre_imagen_animal ?>" alt="Card image cap">
						</div>
						<div class="col-9">				
							<h4 class="card-title"><?= $animal -> nombre_animal ?></h4>
							<p class="card-text">
								<ul>
									<li><i class="fab fa-sticker-mule"></i> Especie: <?= $animal -> especie_animal ?></li>
									<li><i class="fas fa-paw"></i> Raza: <?= $animal -> raza_animal ?></li>
									<li><i class="far fa-calendar-alt"></i> Edad: <?= $animal -> calculaEdad() ?></li>
									<li><i class="fas fa-venus-mars"></i> Sexo: <?= $animal -> sexo_animal ?></li>
									<li><i class="fas fa-cut"></i> Castrado: <?= ($animal->castrado == 0)?'No':'Sí' ?></li>
									<li><i class="fas fa-align-center"></i> Descripción: <?= $animal->descripcion_animal ?></li>
								</ul>
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
