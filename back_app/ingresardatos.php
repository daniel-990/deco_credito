<?php

    require '../constantes/conectar.php';
    require '../vendor/verot/class.upload.php/src/class.upload.php';

    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $cedula_credito = $_POST['cedula_credito'];
    $direccion = $_POST['direccion'];
    $correo = $_POST['correo'];
    $numerocontacto = $_POST['numerocontacto'];
    $labora = $_POST['labora'];
    $quetrabaja = $_POST['quetrabaja'];

    //nombre contacto laboral 1
    $nombre_laboral1 = $_POST['nombre_laboral1'];
    $apellido_laboral1 = $_POST['apellido_laboral1'];
    $cedula_laboral1 = $_POST['cedula_laboral1'];
    $numero_laboral1 = $_POST['numero_laboral1'];
    
    //nombre contacto laboral 2
    $nombre_laboral2 = $_POST['nombre_laboral2'];
    $apellido_laboral2 = $_POST['apellido_laboral2'];
    $cedula_laboral2 = $_POST['cedula_laboral2'];
    $numero_laboral2 = $_POST['numero_laboral2'];

    //nombre contacto familiar 3
    $nombre_familiar3 = $_POST['nombre_familiar3'];
    $apellido_familiar3 = $_POST['apellido_familiar3'];
    $cedula_familiar3 = $_POST['cedula_familiar3'];
    $numero_familiar3 = $_POST['numero_familiar3'];

    //nombre contacto familiar 4
    $nombre_familiar4 = $_POST['nombre_familiar4'];
    $apellido_familiar4 = $_POST['apellido_familiar4'];
    $cedula_familiar4 = $_POST['cedula_familiar4'];
    $numero_familiar4 = $_POST['numero_familiar4'];

    //se carga la firma en base de datos y servidor
    //ruta de la firma
    $ruta = "";
    $rutaArchivos = URL.'/archivos';

    //echo $rutaArchivos;

    //carga de la firma digital
    $imagen = new \Verot\Upload\Upload($_FILES['documento']);

    if ($imagen->uploaded){
        $imagen->file_new_name_body   = 'firma_digital';
        $imagen->image_resize         = true;
        $imagen->image_x              = 400;
        $imagen->image_ratio_y        = true;
        $imagen->process('../archivos');
        if ($imagen->processed) {
            $ruta = $imagen->file_dst_name;
            echo $ruta;
            $imagen->clean();
        } else {
            echo 'error de carga de la imagen de perfil: ' . $imagen->error;
        }
    } 

    if(isset($_POST)){
        if($nombre == "" && $apellido == "" && $cedula_credito == "" && $direccion == "" && $correo == "" && $numerocontacto == "" && $labora == "seleccione" && $quetrabaja == ""){
            header("Location: http://localhost:8888/deco_credito/index.php?mensaje=Todos los campos son obligatorios");
            exit;
        }else{
            if($conexion){
                $sql = "INSERT INTO tbl_usuariocredito (
                    nombre, 
                    apellido, 
                    cedula_credito, 
                    direccion, 
                    correo, 
                    numerocontacto, 
                    documento, 
                    labora, 
                    quetrabaja,
                    nombre_laboral1,
                    apellido_laboral1,
                    cedula_laboral1,
                    numero_laboral1,
                    nombre_laboral2,
                    apellido_laboral2,
                    cedula_laboral2,
                    numero_laboral2,
                    nombre_familiar3,
                    apellido_familiar3,
                    cedula_familiar3,
                    numero_familiar3,
                    nombre_familiar4,
                    apellido_familiar4,
                    cedula_familiar4,
                    numero_familiar4) VALUES (
                        '$nombre',
                        '$apellido',
                        '$cedula_credito',
                        '$direccion',
                        '$correo',
                        '$numerocontacto',
                        '$ruta',
                        '$labora',
                        '$quetrabaja',
                        '$nombre_laboral1',
                        '$apellido_laboral1',
                        '$cedula_laboral1',
                        '$numero_laboral1',
                        '$nombre_laboral2',
                        '$apellido_laboral2',
                        '$cedula_laboral2',
                        '$numero_laboral2',
                        '$nombre_familiar3',
                        '$apellido_familiar3',
                        '$cedula_familiar3',
                        '$numero_familiar3',
                        '$nombre_familiar4',
                        '$apellido_familiar4',
                        '$cedula_familiar4',
                        '$numero_familiar4')";

                //se envian los datos a la base de datos
                if(mysqli_query($conexion, $sql)){
                    header("Location: http://localhost:8888/deco_credito/index.php?mensaje=Datos enviados&rutaImg=".$ruta);
                    exit;
                }else{
                    echo "error enviado datos";
                }
                mysqli_close($conexion);
            }
        }
    }


?>