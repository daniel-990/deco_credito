<?php 

    require "../constantes/conectar.php";

    $registroNombreUser = $_POST['usuario-registro'];
    $registroPassUser = $_POST['pass-registro'];

    //encripta la contraseña
    $password = password_hash($registroPassUser, PASSWORD_BCRYPT);

    if(isset($_POST)){

        echo $registroNombreUser;
        echo "<hr>";
        echo $password;

        if($registroNombreUser == "" && $registroPassUser == ""){
            header("Location: ".URLR."/vista-registro-login.php?mensaje=Todos los campos son obligatorios");
            exit;
        }else{
            if($conexion){

                // Realizamos la consulta para saber si coincide con uno de esos criterios
                $sqlRevisar = "SELECT * FROM tbl_usuarioRegistrado WHERE correo='$registroNombreUser'";
                $result = mysqli_query($conexion, $sqlRevisar);
                
                // Validamos si hay resultados
                if(mysqli_num_rows($result)>0){
                    // Si es mayor a cero imprimimos que ya existe el usuario
                    echo "Si es mayor a cero imprimimos que ya existe el usuario";
                    header("Location: ".URLR."/vista-registro-login.php?mensaje=ya existe el usuario con el correo: ".$registroNombreUser);
                    exit;
                }else{

                    $sql = "INSERT INTO tbl_usuarioRegistrado (correo, pass) VALUES ('$registroNombreUser','$password')";
                    if(mysqli_query($conexion, $sql)){
                            $sql = "SELECT id FROM tbl_usuarioRegistrado";
                            $datos = array();
                            $result = $conexion->query($sql);
                                if($result->num_rows > 0){
                                    while($row = $result->fetch_assoc()) {
                                        header("Location: ".URLR."/vista-registro-login.php?mensaje=Usuario: ".$registroNombreUser." registrado&IdUser=".$row['IdUser']);
                                    }
                                }else{}
                    }else{
                        echo "error!";
                    }
                    
                }
                // Cerramos la conexión
                mysqli_close($conexion);
            }
        }
    }else{
        echo "no se reciben valores nuevos";
    }
?>