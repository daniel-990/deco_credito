$(document).ready(function () {
  //variables
  const siTrabaja = $("#siTrabaja");
  //buscador
  const selectBuscar = $("#select-buscar");
  const buscador = $("#buscador");
  const buscar = $("#formulario-busqueda");

  $(document).on("change", "#trabaja", function () {
    const trabaja = $("#trabaja").val();
    if (trabaja == "si") {
      html1 = `
                <div class="row">
                <label>Ingrese dos referencias laborales</label>
                <div class="col-md-6">
                    <span class="badge bg-info alerta-titulo">Referencia laboral 1</span> 
                    <hr/>
                    <div class="mb-3"><label for="nombreReferencia1" class="form-label">Nombre</label> <input type="text" name="nombre_laboral1" class="form-control" id="nombreReferencia1" required/></div>
                    <div class="mb-3"><label for="apellido1" class="form-label">Apellido</label> <input type="text" name="apellido_laboral1" class="form-control" id="apellido1" required/></div>
                    <div class="mb-3"><label for="cedula1" class="form-label">Cedula</label> <input type="number" name="cedula_laboral1" class="form-control" id="cedula1" required/></div>
                    <div class="mb-3"><label for="numeroRefencia1" class="form-label">Numero fijo o movil</label> <input name="numero_laboral1" type="number" class="form-control" id="numeroRefencia1" required/></div>
                </div>
                <div class="col-md-6">
                    <span class="badge bg-info alerta-titulo">Referencia laboral 2</span> 
                    <hr/>
                    <div class="mb-3"><label for="nombreReferencia2" class="form-label">Nombre</label> <input name="nombre_laboral2" type="text" class="form-control" id="nombreReferencia2" required/></div>
                    <div class="mb-3"><label for="apellido2" class="form-label">Apellido</label> <input name="apellido_laboral2" type="text" class="form-control" id="apellido2" required/></div>
                    <div class="mb-3"><label for="cedula2" class="form-label">Cedula</label> <input name="cedula_laboral2" type="number" class="form-control" id="cedula2" required/></div>
                    <div class="mb-3"><label for="numeroRefencia2" class="form-label">Numero fijo o movil</label> <input name="numero_laboral2" type="number" class="form-control" id="numeroRefencia2" required/></div>
                </div>
                </div>
            `;
      $("#cajatexto").prop("disabled", false);
      siTrabaja.html(html1);
    } else if (trabaja == "no") {
      html2 = `
                <div class="row">
                <label>Ingrese dos referencias familiares</label> 
                <div class="col-md-6">
                    <span class="badge bg-danger alerta-titulo">Referencia 1</span> 
                    <hr/>
                    <div class="mb-3"><label for="nombreReferencia3" class="form-label">Nombre</label> <input name="nombre_familiar3" type="text" class="form-control" id="nombreReferencia3"/></div>
                    <div class="mb-3"><label for="apellido3" class="form-label">Apellido</label> <input name="apellido_familiar3" type="text" class="form-control" id="apellido3"/></div>
                    <div class="mb-3"><label for="cedula3" class="form-label">Cedula</label> <input name="cedula_familiar3" type="number" class="form-control" id="cedula3"/></div>
                    <div class="mb-3"><label for="numeroRefencia3" class="form-label">Numero fijo o movil</label> <input name="numero_familiar3" type="number" class="form-control" id="numeroRefencia3"/></div>
                </div>
                <div class="col-md-6">
                    <span class="badge bg-danger alerta-titulo">Referencia 2</span> 
                    <hr/>
                    <div class="mb-3"><label for="nombreReferencia3" class="form-label">Nombre</label> <input name="nombre_familiar4" type="text" class="form-control" id="nombreReferencia3"/></div>
                    <div class="mb-3"><label for="apellido3" class="form-label">Apellido</label> <input name="apellido_familiar4" type="text" class="form-control" id="apellido3"/></div>
                    <div class="mb-3"><label for="cedula3" class="form-label">Cedula</label> <input name="cedula_familiar4" type="number" class="form-control" id="cedula3"/></div>
                    <div class="mb-3"><label for="numeroRefencia3" class="form-label">Numero fijo o movil</label> <input name="numero_familiar4" type="number" class="form-control" id="numeroRefencia3"/></div>
                </div>
                </div>
            `;
      $("#cajatexto").prop("disabled", true);
      siTrabaja.html(html2);
      $(".myModal").modal();
    }
  });

  buscar.submit(function (e) {
    e.preventDefault();

    var formularioBusqueda = $(this);
    var url = formularioBusqueda.attr("action");

    $.ajax({
      type: "POST",
      url: url,
      data: formularioBusqueda.serialize(),
      success: function (data) {
        
        $("#resultados").html("");
        $("#resultados").html(data);
        selectBuscar.val("Seleccionar");
        buscador.val("");

            //notificaciones
            // Comprobamos si el navegador soporta las notificaciones
            if (!("Notification" in window)){
                console.log("Este navegador no es compatible con las notificaciones de escritorio");
            }else if (Notification.permission === "granted"){
                // Si es correcto, lanzamos una notificación
                var notification = new Notification("Se realizo la busqueda");
                

            }else if (Notification.permission !== "denied" || Notification.permission === "default"){ 
                Notification.requestPermission(function (permission){
                // Si el usuario nos lo concede, creamos la notificación
                if (permission === "granted"){
                    var notification = new Notification("");
                }
            });
        }
        //notificaciones


      },
      error: function (error) {
        alert(error);
      },
    });
  });

});
