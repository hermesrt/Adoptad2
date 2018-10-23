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
    <div class="col">
      <div class="card">
        <button class="btn btn-warning" onclick="toggleFiltros()">
          <h4 class=" my-2 mx-2"> <i class="fas fa-angle-double-down mx-4" id="icono"></i>Filtrar busqueda</h4>
        </button>
        <div class=" my-2 mx-2" style="display: none;" id="filtros">
          <div class="row">
           <div class="col">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <label class="input-group-text" for="centro">Centro de Adopcion</label>
              </div>
              <select class="custom-select" id="centro">
                <option selected value="-1">Todos</option>
                <?php foreach ($centros as $ca): ?>
                  <option value="<?php echo $ca->id_centro ?>"><?php echo $ca->nombre_ca ?></option>
                <?php endforeach ?>
              </select>
            </div>
          </div> 
        </div>
        <div class="row">
         <div class="col">
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <label class="input-group-text" for="especie">Especie</label>
            </div>
            <select class="custom-select" id="especie">
              <option selected value="-1">Todos</option>
              <?php foreach ($especies as $especie): ?>
                <option value="<?php echo $especie->especie_animal ?>"><?php echo $especie->especie_animal ?></option>                
              <?php endforeach ?>
            </select>
          </div>
        </div>
        <div class="col">
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <label class="input-group-text" for="raza">Raza</label>
            </div>
            <select class="custom-select" id="raza">
              <option selected value="-1">Todos</option>
              <?php foreach ($razas as $raza): ?>
                <option value="<?php echo $raza->raza_animal ?>"><?php echo $raza->raza_animal ?></option>                
              <?php endforeach ?>
            </select>
          </div>
        </div>
      </div>
      <div class="row">          
        <div class="col">
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <label class="input-group-text" for="sexo">Sexo</label>
            </div>
            <select class="custom-select" id="sexo">
              <option selected value="-1">Todos</option>
              <option value="Masculino">Masculino</option>
              <option value="Femenino">Femeninio</option>
            </select>
          </div>
        </div>
        <div class="col">
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <label class="input-group-text" for="castrado">Castrado</label>
            </div>
            <select class="custom-select" id="castrado">
              <option selected value="-1">Todos</option>
              <option value="1">Si</option>
              <option value="0">No</option>
            </select>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col">
        </div>
        <div class="col">
          <button class="btn btn-primary float-right" onclick="busquedaFiltrada()">Buscar</button>
          <button type="reset" class="btn btn-danger float-right mx-2" onclick="limpiarFiltros()">Limpiar</button>
        </div>
      </div>
    </div>
  </div>
</div>
</div>

<!-- <div class="row">
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
</div> -->
<div class="row" id="fila">
</div>
</div>



<script type="text/javascript">

  function toggleFiltros(){
    $("#filtros").toggle("slow",function() {
      if ($("#filtros").css('display')=="none") {
        $("#icono").removeClass('fas fa-angle-double-up').addClass('fas fa-angle-double-down');
      } else {
        $("#icono").removeClass('fas fa-angle-double-down').addClass('fas fa-angle-double-up');

      }
    }); 
  }

  function imprimirAnimales(animales) {

    for (var i = 0, len = animales.length; i < len; i++) {
      var html ='<div class="my-2 col-xs-12 col-sm-6 col-md-4 ">';
      html +='<div class="card" style="width: 18rem;">';        
      html +='<img class="card-img-top" src="'+window.location.origin+'/adopta2/assets/img/animales/'+animales[i].nombre_imagen_animal+'">';
      html +='<div class="card-body">';        
      html +=' <h5 class="card-title">'+animales[i].nombre_animal+'</h5>';        
      html +='<p class="card-text">';        
      html +='<ul><li>Raza:'+animales[i].raza_animal+'</li>';        
      html +='<li>Sexo:'+animales[i].sexo_animal+'</li></ul>';        
      html +='</p>';        
      html +='<a href="'+window.location.origin+'/Adopta2/C_Animal/verAnimal/'+animales[i].id_animal+'" class="btn btn-primary" ><i class="fas fa-plus"></i> Ver Animal</a></center></div></div></div>';
      $("#fila").append(html);        

    }
  }

  function busquedaFiltrada() {
    $.ajax({
      url: 'getAnimales',
      type: 'POST',
      dataType: 'json',
      data: {
        centro: $("#centro").val(),
        especie: $("#especie").val(),
        raza: $("#raza").val(),
        sexo: $("#sexo").val(),
        castrado: $("#castrado").val()
      },
    })
    .done(function(a) {
      $("#fila").html(" ");
      if (a) {
      imprimirAnimales(a);        
      } else {
      $("#fila").html("<center class='my-5'><div class='alert alert-warning' role='alert'><h4>No se encontraron animales con esas caracteristicas</h4></div></center>");
      }
    })
    .fail(function() {
      console.log("error");
    })
    .always(function() {
      console.log("complete");
    });
    
  }

  function limpiarFiltros() {
    $("select").val("-1");
    
  }

  $(document).ready(function() {
   $.ajax({
    url: 'getAnimales',
    type: 'POST',
    dataType: 'json',
  })
   .done(function(a) {
    imprimirAnimales(a);
  })
   .fail(function() {
    console.log("error");
  })
   .always(function() {
    console.log("complete");
  });

 });


</script>