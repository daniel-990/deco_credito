<?php 

    require "../constantes/conectar.php";

    session_start(); //se inicia la variable de sesion

    if(isset($_POST)){
         $correo = $_POST['correoDeco'];
         $pass = $_POST['pass'];

         if($correo == "" && $pass == ""){
            header('Location: '.URLR.'/vista-login.php?mensaje=Campos obligatorios');
         }else{
            if ($conexion) {
                $sql = "SELECT * FROM tbl_usuarioRegistrado WHERE correo='$correo'";
                $result = $conexion->query($sql);
                if($result->num_rows > 0){
                    while($row = $result->fetch_assoc()) {
                      if (!$result){
                          echo '<p class="error">la convinacion es incorrecta!</p>';
                      } else {
                          if (password_verify($pass, $row['pass'])) {
                              $_SESSION['user_id'] = $row['id'];
                              header('Location: '.URLR.'/vista-registros.php?mensaje='.$row['id'].'/'.$row['correo']);
                          } else {
                              header('Location: '.URLR.'/vista-login.php?mensaje=Usuario o contraseña incorrectos');
                          }
                      }
                    }
                }else{
                  header('Location: '.URLR.'/vista-login.php?mensaje=Usuario no existe');
                }
          }
         }
    }


?>