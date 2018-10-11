<div class="container">
  <div class="row">
    <div class="col">
      <div class="card my-3">
        <img class="card-img-top" height="300px" src="<?= base_url('assets/img/banner-inicio.jpg') ?>" alt="Card image cap">
        <div class="card-body">
          <center><h1 class="card-title">Bienvenidos a Adpota2!</h1></center>
          <p class="card-text">
            Buscá tu próxima mascota en nuestro sitio web desde la comodidad de tu casa.
            Cuando decidas cual es el indicado para vos, acercate al "Centro de Adopción" correspondiente.
            Registramos tus datos, y ante cualquier necesidad nosotros nos comunicamos!
          </p>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <?php foreach ($animales as $animal) { ?>
        <div class="my-2 col-xs-12 col-sm-6 col-md-4 ">
            <div class="card" style="width: 18rem;">
              <img class="card-img-top" src="<?= base_url() ?>assets/img/animales/<?= $animal->nombre_imagen_animal ?>" alt="Card image cap">
              <div class="card-body">
                <h5 class="card-title"><?= $animal -> nombre_animal ?></h5>
                <p class="card-text">
                  <ul>
                    <li>Raza: <?= $animal -> raza_animal ?></li>
                    <li>Sexo: <?= $animal -> sexo_animal ?></li>
                    <li>Edad: <?= ($animal->cachorro)?$animal -> edad_animal." meses":$animal->edad_animal." años" ?></li>
                  </ul>
                </p>
                <center>
                 <?php if ($this-> session->userdata('id_centro')): ?>
                  <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#modalAdoptar" ><i class="fas fa-plus"></i> Adoptar</a>
                  <?php endif ?>
                  <a href="<?= base_url('C_Animal/verAnimal/'.$animal -> id_animal) ?>" class="btn btn-primary" ><i class="fas fa-plus"></i> Ver Animal</a>
                </center>
              </div>
            </div>
          </div>
    <?php } ?>
    </div>
</div>



<!-- Modal -->
<div class="modal fade" id="modalAdoptar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Adoptar Animal</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <fieldset class="form-group">
            <center><label for="formGroupExampleInput">DNI: </label></center>
            <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Ingrese DNI del adoptante">
          </fieldset>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <a class="btn btn-primary" href="<?= base_url('C_Adoptante') ?>">Adoptar</a>
      </div>
    </div>
  </div>
</div>