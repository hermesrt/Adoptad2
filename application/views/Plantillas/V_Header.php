<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/bootstrap.min.css'); ?>">
  <!-- La libreria de FontAwesome -->
  <link rel="stylesheet" type="text/css" href="<?= base_url('assets/fontawesome/css/all.css') ?>">
  <!-- Cargo la libreria del DataTable -->
  <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/datatables.css') ?>">

  <title>A2!</title>
  <script type="text/javascript" src="<?= base_url('assets/js/jquery-3.3.1.min.js') ?>"></script>
  <script type="text/javascript" src="<?= base_url('assets/js/GoogleCharts') ?>"></script>
  
  
</head>
<body class="bg-light">
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
    <img height="50px" width="50px" src="<?= base_url('assets/img/logo.png') ?>">
    <a class="navbar-brand" href="<?= base_url() ?>">Adopta2</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="<?= base_url() ?>"><i class="fas fa-home"></i> Inicio</a>
        </li>
        <?php if ($this->session->has_userdata('nombre_usuario')): ?>
          <?php if ($this->session->userdata('tipo_usuario')=="veterinario"): ?>              
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url('C_Revision') ?>">  <i class="fas fa-notes-medical"></i> Revisiones</a>
            </li>
          <?php endif ?>
          <?php if ($this->session->userdata('tipo_usuario')=="administrativo"): ?>           
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url('C_Informes') ?>"><i class="fas fa-chart-pie"></i> Generador de informes</a>
            </li> 
          <?php endif ?>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('C_Denuncia') ?>"><i class="fas fa-bullhorn"></i> Denuncias</a>
          </li> 
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('C_Seguimiento') ?>"><i class="fas fa-book"></i> Periodos de Seguimientos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('C_Animal') ?>"><i class="fas fa-paw"></i> Gestion de Animales</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('C_InicioSesion/cerrarSesion') ?>"><i class="fas fa-user-alt"></i> Cerrar Sesión</a>
          </li>
          <?php else: ?>
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url('C_InicioSesion') ?>"><i class="fas fa-user-alt"></i> Iniciar Sesión</a>
            </li>
          <?php endif ?>
        </ul>
      </div>
    </nav>




