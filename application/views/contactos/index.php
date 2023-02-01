<script type="text/javascript">
    $("#menu-contactos").addClass('active');
</script>

<center>
    <h3>Gestion de contactos</h3>
</center>
<br>
<center>
    <!-- Trigger the modal with a button -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalNuevoContacto">
        <i class="glyphicon glyphicon-plus"></i>Agregar</button>
</center>
<!-- Modal -->
<div id="modalNuevoContacto" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><b>Nueva contacto</b></h4>
            </div>
            <div class="modal-body">
                <form id="frm_nuevo_contacto" class="" action="<?php echo site_url('contactos/guardar'); ?>" method="post">
                    <b>Sucursal:</b>
                    <input type="text" id="sucursal_con_fry" name="sucursal_con_fry" value="" placeholder="Ingrese la provincia" class="form-control">
                    <br>
                    <b>Telefono:</b>
                    <input type="text" id="telefono_con_fry" name="telefono_con_fry" value="" placeholder="Ingrese la provincia" class="form-control">
                    <br>
                    <b>Email:</b>
                    <input type="text" id="email_con_fry" name="email_con_fry" value="" placeholder="Ingrese la ciudad" class="form-control">
                    <button type="submit" name="button" class="btn btn-success">
                        <i class="glyphicon glyphicon-ok"></i> Guardar
                    </button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
        </div>

    </div>
</div>
<button type="button" name="button" onclick="consultarContactos()">Actualizar datos</button>

<div class="container">
    <div id="contenedor-listado-contactos">

    </div>
</div>

<!-- Modal Editar -->
<div id="modalEditarContacto" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><b>Editar contacto</b></h4>
            </div>
            <div class="modal-body">
                <form id="frm_editar_contacto" class="" action="<?php echo site_url('contactos/editar'); ?>" method="post">
                    <b>Sucursal:</b>
                    <input type="text" id="sucursal_con_fry" name="sucursal_con_fry" value="" placeholder="Ingrese la provincia" class="form-control">
                    <br>
                    <b>Telefono:</b>
                    <input type="text" id="telefono_con_fry" name="telefono_con_fry" value="" placeholder="Ingrese la provincia" class="form-control">
                    <br>
                    <b>Email:</b>
                    <input type="text" id="email_con_fry" name="email_con_fry" value="" placeholder="Ingrese la ciudad" class="form-control">
                    <button type="submit" name="button" class="btn btn-success">
                        <i class="glyphicon glyphicon-ok"></i> Guardar
                    </button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
        </div>

    </div>
</div>

<script type="text/javascript">
    function consultarContactos() {
        $("#contenedor-listado-contactos").html('<center><i class="fa fa-spinner  fa-3x fa-spin"></i><br>Espere porfavor..</center>'); //fa-spin para que gire el spinner, fa-1x a 3x el tamaño, fa fa-spinner figura
        $("#contenedor-listado-contactos").load("<?php echo site_url('contactos/listado'); ?>"); //capturar el id(#) que se ingreso en la parte de arriba
    }
    consultarContactos(); //carga datos de froma automatica la tabla                                    //llamamos a la funcion listado profesores
</script>



<script type="text/javascript">
    $("#frm_nuevo_contacto").validate({
        rules: {
            sucursal_con_fry: {
                required: true
            },
            telefono_con_fry: {
                required: true
            },
            email_con_fry: {
                required: true
            }
        },
        messages: {
            sucursal_con_fry: {
                required: "Por favor ingrese su provincia"
            },
            telefono_con_fry: {
                required: "Por favor ingrese su ciudad"
            },
            email_con_fry: {
                required: "Porfavor ingreses su estado"
            }

        },
        submitHandler: function(formulario) {
            //!Ejecutando la peticion asincrona
            $.ajax({
                type: 'post',
                url: '<?php echo site_url("contactos/guardar"); ?>',
                data: $(formulario).serialize(),
                success: function(data) {
                    var objetoRespuesta = JSON.parse(data);
                    if (objetoRespuesta.estado == "ok") {
                        Swal.fire(
                            'Confirmacion',
                            objetoRespuesta.mensaje,
                            'success',

                        )
                        $("#modalNuevoContacto").modal("hide");
                        consultarContactos();
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

<script type="text/javascript">
    $("#frm_editar_contacto").data()
    $(selector).data(key);
</script>