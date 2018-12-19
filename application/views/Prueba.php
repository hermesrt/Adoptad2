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





<div>
	<h5 id="labelEditar">Registrar Adoptante</h5>
    <form class="form" data-toggle="validator" role="form">
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
            <input type="number" class="form-control mx-2" name="telefonoAdoptante" id="telefonoAdoptante" placeholder="Ingrese teléfono del adoptante...">
        </div>
        <div class="form-group">
            <input required type="email" class="form-control mx-2" name="emailAdoptante" id="emailAdoptante" placeholder="Ingrese email del adoptante..." data-error="Bruh, that email address is invalid" required>
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
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
    <button type="submit" id="btnRegistrarAdoptante" class="btn btn-primary">Registrar Adoptante</button>
</div>



<div class="content">
    <form data-toggle="validator" role="form">
  <div class="form-group">
    <label for="inputName" class="control-label">Name</label>
    <input type="text" class="form-control" id="inputName" placeholder="Cina Saffary" required>
  </div>
  <div class="form-group has-feedback">
    <label for="inputTwitter" class="control-label">Twitter</label>
    <div class="input-group">
      <span class="input-group-addon">@</span>
      <input type="text" pattern="^[_A-z0-9]{1,}$" maxlength="15" class="form-control" id="inputTwitter" placeholder="1000hz" required>
    </div>
    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
    <div class="help-block with-errors">Hey look, this one has feedback icons!</div>
  </div>
  <div class="form-group">
    <label for="inputEmail" class="control-label">Email</label>
    <input type="email" class="form-control" id="inputEmail" placeholder="Email" data-error="Bruh, that email address is invalid" required>
    <div class="help-block with-errors"></div>
  </div>
  <div class="form-group">
    <label for="inputPassword" class="control-label">Password</label>
    <div class="form-inline row">
      <div class="form-group col-sm-6">
        <input type="password" data-minlength="6" class="form-control" id="inputPassword" placeholder="Password" required>
        <div class="help-block">Minimum of 6 characters</div>
      </div>
      <div class="form-group col-sm-6">
        <input type="password" class="form-control" id="inputPasswordConfirm" data-match="#inputPassword" data-match-error="Whoops, these don't match" placeholder="Confirm" required>
        <div class="help-block with-errors"></div>
      </div>
    </div>
  </div>
  <div class="form-group">
    <div class="radio">
      <label>
        <input type="radio" name="underwear" required>
        Boxers
      </label>
    </div>
    <div class="radio">
      <label>
        <input type="radio" name="underwear" required>
        Briefs
      </label>
    </div>
  </div>
  <div class="form-group">
    <div class="checkbox">
      <label>
        <input type="checkbox" id="terms" data-error="Before you wreck yourself" required>
        Check yourself
      </label>
      <div class="help-block with-errors"></div>
    </div>
  </div>
  <div class="form-group">
    <button type="submit" class="btn btn-primary">Submit</button>
  </div>
</form>
</div>





