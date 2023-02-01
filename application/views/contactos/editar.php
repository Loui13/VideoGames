
  <form class="" action="<?php echo site_url("contactos/procesarEditar") ?>" method="post" required>
    <center>
    <input type="hidden" name="id_con_fry" value="<?php echo $contacto->id_con_fry ?>">
    </center>
    <br>
    <div class="row">
      <div class="col-md-4 text-right">
      <b>Sucursal:</b>
      <input type="text" id="sucursal_con_fry" name="sucursal_con_fry" value="<?php echo $contacto->sucursal_con_fry; ?>" placeholder="Ingrese la provincia" class="form-control">
      <br>
      <b>Telefono:</b>
      <input type="text" id="telefono_con_fry" name="telefono_con_fry" value="<?php echo $contacto->telefono_con_fry; ?>" placeholder="Ingrese la provincia" class="form-control">
      <br>
      <b>Email:</b>
      <input type="text" id="email_con_fry" name="email_con_fry" value="<?php echo $contacto->email_con_fry; ?>" placeholder="Ingrese la ciudad" class="form-control">
      <button type="submit" name="button" class="btn btn-success">
          <i class="glyphicon glyphicon-ok"></i> Guardar
      </button>
  </form>

  <!-- validacion y edicion con modal -->
  <script type="text/javascript">
  $("#frm_edicion_provincia").validate({
          rules:{
            nombre_provincia:{
              required:true,
            },
          },
          messages:{
            nombre_provincia:{
              required:"Por favor ingrese el nombre de la provincia",
            },
          },
        },
        submitHandler:function(form){//funcion para peticiones AJAX
            $.ajax({
              url:$(form).prop("action"),
              type:"post",
              data:$(form).serialize(),
              success:function(datosEditarContactos){
                consultarContactos();
                  $("#modalEditarContacto").modal("hide");
                  // $('body')
                  //backdrop
                  iziToast.success({
                      title: 'OK',
                      message: 'Contacto editada exitosamente.',
                      position: 'topRight',
                  });
                  // alert(data);
              }
            });
        },
  });
  </script>
    