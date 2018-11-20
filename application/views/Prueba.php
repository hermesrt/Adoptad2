<!-- <img src="<?php //  echo base_url('assets/img/graficos/animalesXcentro') ?>">  -->
<?php // echo base_url('assets/img/graficos/animalesXcentro.jpg') ?>


<h2>Imagen de cargando</h2>
<button onclick="loco();" id="btnLoco" value="Loco">Loco</button>


<div class="modal fade" id="modalMensaje" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="cartelModal">HOILA</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
         </button>
        </div>
        <div class="modal-body">
            <form>
                <fieldset>
                    <label id="mensaje">JEJEJEJJE</label>
                    <div class="loading">
                        <img id="l" src="<?= base_url('/assets/img/ajax-loader.gif') ?>" alt="cargando" >
                    </div>
                </fieldset>
            </form>
        </div>
        <div class="modal-footer">
            <div class="loader"></div><button type="button" class="btn btn-primary" data-dismiss="modal">Ok</button>
        </div>
    </div>
   </div>
</div>

<form class="form">
					<div class="form-group">
                        <input required type="number" class="form-control mx-2" name="dniAdoptante" id="dniAdoptante" placeholder="Ingrese DNI del adoptante..." max="99999999" min="1000000" >
					</div>
					<div class="form-group">
						<input required type="text" class="form-control mx-2" name="nombreAdoptante" id="nombreAdoptante" placeholder="Ingrese nombre del adoptante...">
					</div>
					<div class="form-group">
						<input required type="text" class="form-control mx-2" name="apellidoAdoptante" id="apellidoAdoptante" placeholder="Ingrese apellido del adoptante...">
                    </div>
					<div class="form-group">
						<input type="number" class="form-control mx-2" name="telefonoAdoptante" id="telefonoAdoptante" placeholder="Ingrese telefono del adoptante...">
					</div>
					<div class="form-group">
						<input required type="email" class="form-control mx-2" name="emailAdoptante" id="emailAdoptante" placeholder="Ingrese email del adoptante...">
					</div>
					<div class="form-group">
						<input required type="text" class="form-control mx-2" name="ciudadAdoptante" id="ciudadAdoptante" placeholder="Ingrese ciudad del adoptante...">
					</div>
					<div class="row">
                        <div class="col">
                          <input required type="text" class="form-control " name="direccionAdoptante" id="direccionAdoptante" placeholder="Dirección del adoptante...">
                        </div>
                        <div class="col">
                            <input required type="number" class="form-control " name="alturaDireccion" id="alturaDireccion" min="0" max="9999" placeholder="altura de la dirección">
                        </div>
                    </div>
				</form>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
					<button type="button" id="btnRegistrarAdoptante" class="btn btn-primary">Registrar Adoptante</button>
				</div>



<script>
    
    setTimeout(function() {
        $(".loader").fadeOut(1500);
    },3000);
    
    function loco(){
        console.log('esta en loco');
        $('#modalMensaje').modal('show');
        //$('.loader').hide();
    }
    
    
    
</script>