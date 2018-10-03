<div class="container my-5">
	<div class="row">
		<div class="col"></div>
		<div class="col">
			<center>
				<img src="<?= base_url('assets/img/logo.png') ?>">
				<?php echo validation_errors(); ?>
				<?php echo form_open('C_InicioSesion/InicioSesion'); ?>
				<div class="form-group">
					<label for="usuario">Usuario</label>
					<input type="text" class="form-control" id="usuario" name="usuario" aria-describedby="emailHelp" placeholder="Ingrese usuario...">
				</div>
				<div class="form-group">
					<label for="contraseña">Contraseña</label>
					<input type="password" class="form-control" id="contraseña" name="contraseña" placeholder="Ingrese contraseña...">
				</div>
				<button type="submit" class="btn btn-primary">iniciar Sesion</button>
			</form>

		</center>
	</div>
	<div class="col"></div>
</div>
</div>