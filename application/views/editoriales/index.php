<script type="text/javascript">
    $("#menu-editoriales").addClass('active');
</script>

<center>
    <h3>Gestion de editoriales</h3>
</center>
<br>
<center>
    <!-- Trigger the modal with a button -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalNuevaEditorial">
        <i class="glyphicon glyphicon-plus"></i>Agregar</button>
</center>
<!-- Modal -->
<div id="modalNuevaEditorial" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><b>Nueva editorial</b></h4>
            </div>
            <div class="modal-body">
                <form id="frm_nueva_editorial" class="" action="<?php echo site_url('editoriales/guardar'); ?>" method="post">
                    <b>Nombre:</b>
                    <input type="text" id="nombre_edi_fry" name="nombre_edi_fry" value="" placeholder="Ingrese la provincia" class="form-control">
                    <br>
                    <b>Direccion:</b>
                    <input type="text" id="direccion_edi_fry" name="direccion_edi_fry" value="" placeholder="Ingrese la ciudad" class="form-control">
                    <br>
                    <b>Email:</b>
                    <input type="text" id="email_edi_fry" name="email_edi_fry" value="" placeholder="Ingrese el estado" class="form-control">
                   
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
<button type="button" name="button" onclick="consultarEditoriales()">Actualizar datos</button>

<div class="container">
    <div id="contenedor-listado-editoriales">

    </div>
</div>

<script type="text/javascript">
    function consultarEditoriales() {
        $("#contenedor-listado-editoriales").html('<center><i class="fa fa-spinner  fa-3x fa-spin"></i><br>Espere porfavor..</center>'); //fa-spin para que gire el spinner, fa-1x a 3x el tamaño, fa fa-spinner figura
        $("#contenedor-listado-editoriales").load("<?php echo site_url('editoriales/listado'); ?>"); //capturar el id(#) que se ingreso en la parte de arriba
    }
    consultareditoriales(); //carga datos de froma automatica la tabla                                    //llamamos a la funcion listado profesores
</script>


<script type="text/javascript">
    $("#frm_nueva_editorial").validate({
        rules: {
            nombre_edi_fry: {
                required: true
            },
            direccion_edi_fry: {
                required: true
            },
            email_edi_fry: {
                required: true
            }
        },
        messages: {
            nombre_edi_fry: {
                required: "Por favor ingrese su provincia"
            },
            direccion_edi_fry: {
                required: "Por favor ingrese su ciudad"
            },
            email_edi_fry: {
                required: "Porfavor ingreses su estado"
            }
        },
        submitHandler: function(formulario) {
            //!Ejecutando la peticion asincrona
            $.ajax({
                type: 'post',
                url: '<?php echo site_url("editoriales/guardar"); ?>',
                data: $(formulario).serialize(),
                success: function(data) {
                    var objetoRespuesta = JSON.parse(data);
                    if (objetoRespuesta.estado == "ok") {
                        Swal.fire(
                            'Confirmacion',
                            objetoRespuesta.mensaje,
                            'success',

                        )
                        $("#modalNuevaEditorial").modal("hide");
                        consultarEditoriales();
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