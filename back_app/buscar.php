<?php

require "../constantes/conectar.php";

//busqueda
$btn_buscar = $_POST['busqueda'];
$select_sino = $_POST['opcionLaboral'];

//-----
$sql = "SELECT * FROM tbl_usuariocredito WHERE cedula_credito='$btn_buscar' OR correo='$btn_buscar' OR apellido='$btn_buscar' OR numerocontacto='$btn_buscar' OR labora='$select_sino'";
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
}else{
    echo "<br>";
    echo '<h2>No se encontraron resultados</h2>';
}
?>