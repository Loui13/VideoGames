<script type="text/javascript">
  $("#menu-juegos").addClass('active');
</script>

<br>
<center>
  <h1><b>Gestion de juegos</b></h1>
</center>
<center>
  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modalNuevoJuego"><i class="glyphicon glyphicon-plus"></i> Agregar</button>
</center>
<!-- Modal -->
<div id="modalNuevoJuego" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><b>Nuevo Juego</b> </h4>
      </div>
      <div class="modal-body">
        <form id="frm_nuevo_juego" class="" action="<?php echo site_url('juegos/guardar'); ?>" method="post">
          <b">Nombre:</b><br>
            <input type="text" id="nombre_jue_fry" name="nombre_jue_fry" value="" placeholder="Ingrese la cédula" class="form-control"> <br>
            <b>Descripcion:</b><br>
            <input type="text" name="descripcion_jue_fry" id="descripcion_jue_fry" value="" placeholder="Ingrese sus nombres" class="form-control"> <br>
            <b>Categoria:</b> <br>
            <select class="form-control" name="fk_id_cat_fry" id="fk_id_cat_fry" required data-live-search="true">
              <option value="">--Seleccione la Categoria--</option>
              <?php if ($categorias) : ?>
                <?php foreach ($categorias->result()as $categoria) : ?>
                  <option value="<?php echo $categoria->id_cat_fry; ?>">
                    <?php echo $categoria->nombre_cat_fry; ?>
                  </option>
                <?php endforeach; ?>
              <?php endif; ?>
            </select>
            <br>
            <button type="submit" name="button" class="btn btn-success">
              <i class="glyphicon glyphicon-ok"></i> Guardar
            </button>

        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<button onclick="consultarJuegos()"> Actualizar Datos</button>

<div class="container">
  <div id="contenedor-listado-juegos">


  </div>
</div>


<script>
  function consultarJuegos() {
    $("#contenedor-listado-juegos").html('<center> <i class="fa fa-spinner fa-spin fa-3x"></i>  <br>Espere por favor...</center>');
    $("#contenedor-listado-juegos").load("<?php echo site_url('juegos/listado'); ?>");
  }
  consultarJuegos(); //? Cargar datos de forma automatica
</script>

<script type="text/javascript">
  $("#frm_nuevo_juego").validate({
    rules: {
      nombre_jue_fry: {
        required: true

      },
      descripcion_jue_fry: {
        required: true
      }

    },
    messages: {
      nombre_jue_fry: {
        required: "Por favor ingrese la cedula"
      },
      descripcion_jue_fry: {
        required: "Por favor ingrese la cedula"
      }
    },
    submitHandler: function(formulario) {
      //!Ejecutando la peticion asincrona
      $.ajax({
        type: 'post',
        url: '<?php echo site_url("juegos/guardar"); ?>',
        data: $(formulario).serialize(),
        success: function(data) {
          var objetoRespuesta = JSON.parse(data);
          if (objetoRespuesta.estado == "ok") {
            Swal.fire(
              'Confirmacion',
              objetoRespuesta.mensaje,
              'success',

            )
            $("#modalNuevoJuego").modal("hide");
            consultarJuegos();
          } else {
            Swal.fire(
              'Error',
              'Error al insertar, intente nuevamente',
              'success')

          };


        }
      });
    }
  });
</script>