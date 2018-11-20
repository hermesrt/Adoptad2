    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script type="text/javascript" src="<?= base_url('assets/js/jquery-3.3.1.min.js') ?>"></script>
    <script type="text/javascript" src="<?= base_url('assets/js/popper.min.js') ?>"></script>
    <script type="text/javascript" src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script>
    <!-- Cargo el script que utiliza el datatable -->
    <script type="text/javascript" charset="utf8" src="<?= base_url('assets/js/datatables.js') ?>"></script>
    
    <footer>
        <div class="container-fluid text-light bg-dark">
          <center><div class="row">
             <div class="col-4 my-2">
                <h6><i class="fas fa-users"></i> Nosotros:</h6>
                <p>Adopta2 es una aplicación que se encarga de permitir a los centros de adopción de animales publicar información sobre estos, así como también llevar un registro de denuncias por maltrato animal relacionadas a los animales que se hayan adoptado a través de dicha plataforma. Con el fin de incentivar a la comunidad a la adopción y tenencia responsable de animales.
                </p>
            </div>	
            <div class="col-4 my-2">
                <h6><i class="fas fa-code"></i> Desarrolladores:</h6>
                <p><i class="fas fa-envelope"></i> Vejar Lucas: lucasficus@gmail.com <br>
                <i class="fas fa-envelope"></i> Flores Hermes: hermesrt@gmail.com <br>
                <i class="fas fa-envelope"></i> Saez Abigail: meliito7545@gmail.com</p>
            </div>	
            <div class="col-4 my-2">
                <h6><i class="fas fa-address-card"></i> Avaládo por:</h6>
                <p>Cátedra Desarrollo de Software de la Universidad de la Patagonia San Juan Bosco.(2018)</p>
            </div>	
        </div></center>
    </div>

    <!-- Script para habilitar los PopOvers y ToolTips en toda la aplicacion -->
    <script>
        $(document).ready(function(){
            $('[data-toggle="popover"]').popover();
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
</footer>

<style type="text/css">
.scroll {
  height:150px;
  overflow-y: scroll;
}
</style>
</body>

</html>