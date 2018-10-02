<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/bootstrap.min.css'); ?>">

  <link rel="stylesheet" type="text/css" href="<?= base_url('assets/fontawesome/css/all.css') ?>">

  <title>A2!</title>
  <script type="text/javascript" src="<?= base_url('assets/js/jquery-3.3.1.min.js') ?>"></script>
</head>
<body class="bg-light">
  <header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
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
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('C_Denuncia') ?>"><i class="fas fa-bullhorn"></i> Denuncias</a>
          </li>   
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('C_Seguimiento') ?>"><i class="fas fa-book"></i> Periodos de Seguimientos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('C_Informes') ?>">  <i class="fas fa-chart-pie"></i> Generador de informes</a>
          </li> 
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('C_Revision') ?>">  <i class="fas fa-notes-medical"></i> Revisiones</a>
          </li> 
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('C_InicioSesion') ?>"><i class="fas fa-user-alt"></i> Iniciar Sesion</a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <main role="main" class="container">


