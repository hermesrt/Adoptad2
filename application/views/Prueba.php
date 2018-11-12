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