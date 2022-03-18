<?php include "./partials/header.php"; ?>
<section class="banner">
    <img src="./img/banner.jpg" class="img-fluid banner" alt="">
</section>
<section class="container">
    <div class="contenedor-registro">
        <h2>
            Solicita tu crédito 
            <br>
            <span class="badge bg-secondary alerta-titulo">Sistema de credito</span>
            <hr>
        </h2> 
        <?php 
            if(!empty($_GET)){
                $mensaje = $_GET['mensaje'];
                $rutaFirma = $_GET['rutaImg'];
                if($mensaje == "" || $rutaFirma == ""){
                    echo "";
                }else{
                    echo '<div class="contenedor-mensajes">';
                        echo '<h4 class="mensaje-alerta badge rounded-pill bg-success">'.$mensaje.' <i class="bi bi-check-all color_alert"></i></h4>';
                        echo '<br>';
                        echo '<a href="http://localhost:8888/deco_credito/archivos/'.$rutaFirma.'">ver imagen</a>';
                    echo '</div>';
                    echo '<br>';
                }
            }
        ?>
        <form action="./back_app/ingresardatos.php" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" name="nombre" class="form-control" id="nombre">
                    </div>
                    <div class="mb-3">
                        <label for="apellido" class="form-label">Apellido</label>
                        <input type="text" name="apellido" class="form-control" id="apellido">
                    </div>
                    <div class="mb-3">
                        <label for="cedula" class="form-label">Numero de cedula</label>
                        <input type="number" name="cedula_credito" class="form-control" id="cedula">
                    </div>
                    <div class="mb-3">
                        <label for="direccion" class="form-label">Direccion</label>
                        <input type="text" name="direccion" class="form-control" id="direccion">
                    </div>
                    <div class="mb-3">
                        <label for="correoElectronico" class="form-label">Correo electronico</label>
                        <input type="email" name="correo" class="form-control" id="correoElectronico">
                    </div>
                    <div class="mb-3">
                        <label for="numerocontacto" class="form-label">Numero de contacto</label>
                        <input type="number" name="numerocontacto" class="form-control" id="numerocontacto">
                    </div>
                    <p>Adjunte una copia de su documento de indentidad en formato jpg o pdf</p>
                    <div class="input-group mb-3">
                        <input type="file" name="documento" class="form-control" id="adjuntaridentificacion">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Trabaja Actualmente?</label>
                        <select id="trabaja" name="labora" class="form-select">
                            <option>seleccione</option>
                            <option value="si">Si</option>
                            <option value="no">No</option>
                        </select>
                    </div>
                    <div class="mb-3 caja-texto"><label for="cajatexto" class="form-label">En que trabaja</label> 
                    <textarea class="form-control" placeholder="Describa brevemente en que trabaja" name="quetrabaja" id="cajatexto"></textarea></div>
                </div>
                <div class="col-md-6">
                    <div id="siTrabaja">
                        <!-- render -->
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-app">Enviar datos <i class="bi bi-send-fill"></i></button>
        </form>
    </div>
</section>

<?php include "./partials/footer.php"; ?>
