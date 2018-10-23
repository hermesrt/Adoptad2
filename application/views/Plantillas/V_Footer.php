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
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo.</p>
        </div>	
        <div class="col-4 my-2">
            <h6><i class="fas fa-code"></i> Desarrolladores:</h6>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo</p>
        </div>	
        <div class="col-4 my-2">
            <h6><i class="fas fa-address-card"></i> Avalado por:</h6>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo.</p>
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


</body>

</html>