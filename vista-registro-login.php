<?php
    include "./partials/header.php";
    require "./constantes/conectar.php";
?>
<br>
<div class="container">
    <?php 

        if(!empty($_GET)){
            $respuesta = $_GET['mensaje'];
            if($respuesta == ""){
                echo "<h2 class='alert'>".$respuesta."</h2>";
                echo "<br>";
                echo $correo;
            }else{
                echo '<h4 class="alert"><i class="bi bi-exclamation-diamond-fill"></i> '.$respuesta.'</h4>';
            }
        }
    
    ?>
    <h2>Registrar</h2>
    <form class="form-control" action="./back_app/registro.php" method="POST">
        <input type="email" name="usuario-registro" placeholder="correo electronico">
        <br>
        <input type="password" name="pass-registro" placeholder="contraseña">
        <hr>
        <button class="btn btn-danger">Registrar</button>
    </form>
</div>

<?php 
    include "./partials/footer.php"
?>