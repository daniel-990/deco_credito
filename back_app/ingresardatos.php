<?php

    require '../constantes/conectar.php';
    require '../vendor/verot/class.upload.php/src/class.upload.php';
    include('../vendor/autoload.php');

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
            $imagen->clean();
        } else {
            echo 'error de carga de la imagen de perfil: ' . $imagen->error;
        }
    } 

    //bot
    use \unreal4u\TelegramAPI\HttpClientRequestHandler;
    use \unreal4u\TelegramAPI\TgLog;
    use \unreal4u\TelegramAPI\Telegram\Methods\SendMessage;
    
    $loop = \React\EventLoop\Factory::create();
    $handler = new HttpClientRequestHandler($loop);
    $tgLog = new TgLog(API, $handler);


    //revisar si el usuario ya esta registrado
    $sqlRevisar = "SELECT * FROM tbl_usuariocredito WHERE cedula_credito='$cedula_credito' OR correo='$correo'";
    $result = mysqli_query($conexion, $sqlRevisar);
    if(mysqli_num_rows($result)>0){
        header("Location: ".URLR."/index.php?mensaje=El usuario con CC: ".$cedula_credito." ya esta existe");
        exit;
    }else{
        // registro de datos
        if(isset($_POST)){
            if($nombre == "" && $apellido == "" && $cedula_credito == "" && $direccion == "" && $correo == "" && $numerocontacto == "" && $labora == "seleccione" && $quetrabaja == ""){
                header("Location: ".URLR."/index.php?mensaje=Todos los campos son obligatorios");
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
                        
                        //se activa el bot
                            $sendMessage = new SendMessage();
                            $sendMessage->chat_id = USERID;
                            //referencias
                            $sendMessage->text = "<b>Solicitud a nombre de:</b> \n".$nombre." ".$apellido."\n correo: ".$correo."\n Telefono: ".$numerocontacto."\n Direccion: ".$direccion."\n Cedula: ".$cedula_credito." \n Trabaja actualmente: ".$labora;
                            $sendMessage->parse_mode = "HTML";
                            $tgLog->performApiRequest($sendMessage);
                            $loop->run();
                        
                        header("Location: ".URLR."/index.php?mensaje=Datos enviados");
                        exit;
                    }else{
                        echo "error enviado datos";
                    }
                    mysqli_close($conexion);
                }
            }
        }
        // registro de datos
    }


?>