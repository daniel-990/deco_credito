<?php
    include "./partials/header.php";
    require "./constantes/conectar.php";
?>

<section class="banner">
    <img src="./img/login.jpg" class="img-fluid banner" alt="">
</section>

<section class="contenedor-login-registros">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <?php 
                    //datos de inicio de sesion
                    session_start(); //se inicia la variable de sesion
                    if(isset($_SESSION['user_id'])){
                        header('Location: '.URLR.'/vista-registros.php');
                        echo "usuario logueado: ".$_SESSION['user_id'];
                    } else {
                        echo "<small class='text-left color-rojo'>Por favor inicie sesion para ver los registros completos</small>";
                    }
                    error_reporting(E_ALL ^ E_NOTICE);
                    
                    //datos inicio de sesion
                    if(!empty($_GET)){
                        $respuesta = $_GET['mensaje'];
                        $correo = $_GET['usermail'];
                        if($respuesta == ""){
                            echo "<h2 class='alert'>".$respuesta."</h2>";
                            echo "<br>";
                            echo $correo;
                        }else{
                            echo '<h4 class="alert"><i class="bi bi-exclamation-diamond-fill"></i> '.$respuesta.'</h4>';
                        }
                    }
                ?>
                <form action="./back_app/login.php" method="POST">
                    <div class="mb-3">
                        <label for="correoDeco" class="form-label">Correo</label>
                        <input type="email" name="correoDeco" class="form-control" id="correoDeco" aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text">Por favor ingrese un correo valido</div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Contraseña</label>
                        <input type="password" name="pass" class="form-control" id="exampleInputPassword1">
                    </div>
                    <button type="submit" class="btn btn-cerrar">Enviar</button>
                </form>
            </div>
            <div class="col-md-8"></div>
        </div>
    </div>
</section>

<?php include "./partials/footer.php"; ?>