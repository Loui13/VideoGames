<script type="text/javascript">
    $("#menu-descuentos").addClass('active');
</script>

<center>
    <h3>Gestion de descuentos</h3>
</center>
<br>
<center>
    <!-- Trigger the modal with a button -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalNuevoDescuento">
        <i class="glyphicon glyphicon-plus"></i>Agregar</button>
</center>
<!-- Modal -->
<div id="modalNuevoDescuento" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><b>Nueva descuento</b></h4>
            </div>
            <div class="modal-body">
                <form id="frm_nuevo_descuento" class="" action="<?php echo site_url('descuentos/guardar'); ?>" method="post">
                    <b>Juego:</b>
                    <input type="text" id="juego_des_fry" name="juego_des_fry" value="" placeholder="Ingrese la provincia" class="form-control">
                    <br>
                    <b>Porsentaje:</b>
                    <input type="text" id="porcentaje_des_fry" name="porcentaje_des_fry" value="" placeholder="Ingrese la ciudad" class="form-control">
                    
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
<button type="button" name="button" onclick="consultarDescuentos()">Actualizar datos</button>

<div class="container">
    <div id="contenedor-listado-descuentos">

    </div>
</div>

<script type="text/javascript">
    function consultarDescuentos() {
        $("#contenedor-listado-descuentos").html('<center><i class="fa fa-spinner  fa-3x fa-spin"></i><br>Espere porfavor..</center>'); //fa-spin para que gire el spinner, fa-1x a 3x el tamaño, fa fa-spinner figura
        $("#contenedor-listado-descuentos").load("<?php echo site_url('descuentos/listado'); ?>"); //capturar el id(#) que se ingreso en la parte de arriba
    }
    consultarDescuentos(); //carga datos de froma automatica la tabla                                    //llamamos a la funcion listado profesores
</script>


<script type="text/javascript">
    $("#frm_nuevo_descuento").validate({
        rules: {
            juego_des_fry: {
                required: true
            },
            porcentaje_des_fry: {
                required: true
            }
        },
        messages: {
            juego_des_fry: {
                required: "Por favor ingrese su provincia"
            },
            porcentaje_des_fry: {
                required: "Por favor ingrese su ciudad"
            }
        },
        submitHandler: function(formulario) {
            //!Ejecutando la peticion asincrona
            $.ajax({
                type: 'post',
                url: '<?php echo site_url("descuentos/guardar"); ?>',
                data: $(formulario).serialize(),
                success: function(data) {
                    var objetoRespuesta = JSON.parse(data);
                    if (objetoRespuesta.estado == "ok") {
                        Swal.fire(
                            'Confirmacion',
                            objetoRespuesta.mensaje,
                            'success',

                        )
                        $("#modalNuevoDescuento").modal("hide");
                        consultarDescuentos();
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

<script>
    function eliminar(id_des_fry) {

        //!Ejecutando la peticion asincrona
        $.ajax({
            type: 'post',
            url: '<?php echo site_url("descuentos/borrar"); ?>',
            data: {
                "id_des_fry": id_des_fry
            },
            success: function(data) {
                var objetoRespuesta = JSON.parse(data);
                if (objetoRespuesta.estado == "ok") {
                    Swal.fire(
                        'Confirmacion',
                        objetoRespuesta.mensaje,
                        'success',

                    )
                    /* $("#modalNuevaCategoria").modal("hide"); */
                    consultarDescuentos();
                } else {
                    Swal.fire(
                        'Error',
                        'Error al eliminar, intente nuevamente',
                        'success')

                }


            }
        });


    }
</script>