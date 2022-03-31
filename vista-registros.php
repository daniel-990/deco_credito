<?php
include "./partials/header.php";
require "./constantes/conectar.php";
session_start(); //se inicia la variable de sesion
?>

<section class="banner">
    <img src="./img/vista.jpg" class="img-fluid banner" alt="">
</section>

<section class="contenedor-vista-registros">
    <div id="vista" class="container table-responsive">
        <?php 
            //datos de inicio de sesion
            if(isset($_SESSION['user_id'])){
                //header('Location: '.URLR.'/vista-registros.php?user_'.$_SESSION['user_id']);
            } else {
                header('Location: '.URLR.'/vista-login.php');
            }
            error_reporting(E_ALL ^ E_NOTICE);

            //datos inicio de sesion
            if(!empty($_GET)){
                $respuesta = $_GET['mensaje'];
                $correo = $_GET['usermail'];
                if($respuesta == ""){
                    echo $respuesta;
                    echo "<br>";
                    echo $correo;
                }else{
                    echo '<h4 class="alerta"><i class="fas fa-exclamation-circle color-rojo"></i> '.$respuesta.'</h4>';
                }
            }
        ?>
        <!-- buscador -->
        <form id="formulario-busqueda" action="<?php echo URLR; ?>/back_app/buscar.php" method="POST">
            <h2 class="text-left">Usuarios Registrados</h2>
            <div class="row">
                <div class="col">
                    <input id="buscador" type="text" name="busqueda" class="form-control" placeholder="Buscar usuario por cedula, correo, telefono/celular, apellido">
                    <br>
                    <label for="select">Filtrar si esta laborando o no</label>
                    <hr>
                    <select class="form-control" id="select-buscar" name="opcionLaboral">
                        <option selected>Seleccionar</option>
                        <option value="si">si</option>
                        <option value="no">no</option>
                    </select>
                </div>
                <div class="col">
                    <button type="submit" class="btn mb-2 color-verde">Aplicar busqueda <i class="bi bi-search"></i></button>
                    <a class="btn mb-2 color-gris" href="/deco_credito/vista-registros.php">Limpiar busqueda</a>
                </div>
            </div>
        </form>
        <!-- buscador -->
        <div id="resultados_">
            <!-- resultados de la busqueda -->
        </div>
        <hr>
        <table class="table table-sm">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellido</th>
                    <th scope="col">Direccion</th>
                    <th scope="col">Correo</th>
                    <th scope="col">Cedula</th>
                    <th scope="col">Celular</th>
                    <th scope="col">Firma</th>
                    <th scope="col">Labora</th>
                </tr>
            </thead>
            <tbody id="resultados">
                <?php
                $sql = "SELECT * FROM tbl_usuariocredito";
                $datos = array();
                $result = $conexion->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                ?>
                        <tr>
                            <td><?php echo $row['id_credito']; ?></td>
                            <td><?php echo $row['nombre']; ?></td>
                            <td><?php echo $row['apellido']; ?></td>
                            <td><?php echo $row['direccion']; ?></td>
                            <td><?php echo $row['correo'] ?></td>
                            <td><?php echo $row['cedula_credito']; ?></td>


                            <td><?php echo $row['numerocontacto']; ?></td>
                            <td><a target="firma_" href="./archivos/<?php echo $row['documento']; ?>">Firma digital</a></td>
                            <td>
                                <button type="button" class="btn
                                    <?php

                                    if ($row['labora'] == "si") {
                                        echo "color-verde";
                                    } else {
                                        echo "color-naranja";
                                    }

                                    ?>
                                " data-toggle="modal" data-target="#laboral_<?php echo $row['id_credito']; ?>">
                                    <?php
                                    if ($row['labora'] == "si") {
                                        echo '<i class="bi bi-check-all"></i> ' . $row['labora'];
                                    } else {
                                        echo '<i class="bi bi-check-lg"></i> ' . $row['labora'];
                                    }
                                    ?>
                                </button>
                            </td>
                        </tr>
                        <!-- modales -->
                        <div class="modal fade myModal" id="laboral_<?php echo $row['id_credito']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">
                                            <?php
                                            if ($row['labora'] == "si") {
                                                echo "Datos Laborales";
                                            } else {
                                                echo "Datos Familiares";
                                            }
                                            ?>
                                        </h5>
                                    </div>
                                    <div class="modal-body">
                                        <?php
                                        if ($row['labora'] == "si") {
                                        ?>
                                            <h6><i class="bi bi-person-video2"></i> Trabaja en: </h6>
                                            <div class="contenedor-trabaja">
                                                <?php echo $row['quetrabaja']; ?></br>
                                            </div>
                                            <hr>
                                            <!-- datos laborales -->
                                            <div class="datos-referencias">
                                                <h6>Referencias laborales</h6>
                                                <div class="referencias">
                                                    <i class="bi bi-person-badge"></i> Nombre(s): <?php echo $row['nombre_laboral1']; ?><br>
                                                    <i class="bi bi-person-badge"></i> Apellido(s): <?php echo $row['apellido_laboral1']; ?><br>
                                                    <i class="bi bi-person-badge"></i> Cedula: <?php echo $row['cedula_laboral1']; ?><br>
                                                    <i class="bi bi-person-badge"></i> Numero: <?php echo $row['numero_laboral1']; ?>
                                                    <hr>
                                                    <i class="bi bi-person-badge"></i> Nombre(s): <?php echo $row['nombre_laboral2']; ?><br>
                                                    <i class="bi bi-person-badge"></i> Apellido(s): <?php echo $row['apellido_laboral2']; ?><br>
                                                    <i class="bi bi-person-badge"></i> Cedula: <?php echo $row['cedula_laboral2']; ?><br>
                                                    <i class="bi bi-person-badge"></i> Numero: <?php echo $row['numero_laboral2']; ?><br>
                                                </div>
                                            </div>
                                        <?php
                                        } else {
                                        ?>
                                            <div class="datos-referencias">
                                                <h6><i class="bi bi-people-fill"></i> Referencias familiares</h6>
                                                <div class="referencias">
                                                    <!-- referencias familiares -->
                                                    <i class="bi bi-person-bounding-box"></i> Nombre(s): <?php echo $row['nombre_familiar3']; ?><br>
                                                    <i class="bi bi-person-bounding-box"></i> Apellido(s): <?php echo $row['apellido_familiar3']; ?><br>
                                                    <i class="bi bi-person-bounding-box"></i> Cedula: <?php echo $row['cedula_familiar3']; ?><br>
                                                    <i class="bi bi-person-bounding-box"></i> Numero: <?php echo $row['numero_familiar3']; ?>
                                                    <hr>
                                                    <i class="bi bi-person-bounding-box"></i> Nombre(s): <?php echo $row['nombre_familiar4']; ?><br>
                                                    <i class="bi bi-person-bounding-box"></i> Apellido(s): <?php echo $row['apellido_familiar4']; ?><br>
                                                    <i class="bi bi-person-bounding-box"></i> Cedula: <?php echo $row['cedula_familiar4']; ?><br>
                                                    <i class="bi bi-person-bounding-box"></i> Numero: <?php echo $row['numero_familiar4']; ?><br>
                                                </div>
                                            </div>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">
                                            <i class="bi bi-x-circle-fill"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                <?php
                    }
                } else {
                    echo "0 resultados";
                }

                ?>
            </tbody>
        </table>
    </div>
</section>

<?php include "./partials/footer.php"; ?>