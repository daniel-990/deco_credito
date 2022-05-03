<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="./css/main.css">

    <title>Deco Credito</title>
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="https://decohouse.com.co/">
        <img src="./img/logo2.png" class="img-fluid logo">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link btn btn-menu" aria-current="page" href="https://decohouse.com.co/">Volver a la tienda</a>
        </li>
        <?php 
            session_start(); //se inicia la variable de sesion
            //datos de inicio de sesion
            if(isset($_SESSION['user_id'])){
        ?>
            <li class="nav-item">
              <a class="nav-link btn-cerrar" href="./back_app/login-cerrar.php"><i class="bi bi-box-arrow-left"></i> Cerrar Cuenta</a>
            </li>
        <?php
            } else {
               
            }
            error_reporting(E_ALL ^ E_NOTICE);
        ?>
      </ul>
    </div>
  </div>
</nav>