<script type="text/javascript">
    $("#menu-configuraciones").addClass('active');
</script>

<br>
<center>
    <h1><b>Gestion de Configuraciones</b></h1>
</center>
<center>
    <!-- Trigger the modal with a button -->
    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modalNuevaCategoria"><i class="glyphicon glyphicon-plus"></i> Agregar</button>
</center>
<!-- Modal -->
<div id="modalNuevaCategoria" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><b>Nuevas Configuraciones</b> </h4>
            </div>
            <div class="modal-body">
                <form id="frm_nueva_categoria" class="" action="<?php echo site_url('configuraciones/guardar'); ?>" method="post">
                    <b>Nombre:</b><br>
                    <input type="text" id="nombre_empresa_fry" name="nombre_empresa_fry" value="" placeholder="Ingrese la cédula" class="form-control" required> <br>
                    <b>Ruc:</b><br>
                    <input type="number" name="ruc_fry" id="ruc_fry" value="" placeholder="Ingrese sus nombres" class="form-control" required> <br>
                    <b>Telefono:</b><br>
                    <input type="number" name="telefono_fry" id="telefono_fry" value="" placeholder="Ingrese sus apellidos" class="form-control" required> <br>
                    <b>Direccion:</b><br>
                    <input type="text" name="direcion_fry" id="direcion_fry" value="" placeholder="Ingrese el titulo del profesor" class="form-control" required> <br>
                    <b>Representante:</b><br>
                    <input type="text" name="representante_fry" id="representante_fry" value="" placeholder="Ingrese el titulo del profesor" class="form-control" required> <br>


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

<button onclick="consultarConfiguraciones()"> Actualizar Datos</button>

<div class="container">
    <div id="contenedor-listado-categorias">

    </div>
</div>


<script>
    function consultarConfiguraciones() {
        $("#contenedor-listado-categorias").html('<center> <i class="fa fa-spinner fa-spin fa-3x"></i>  <br>Espere por favor...</center>');
        $("#contenedor-listado-categorias").load("<?php echo site_url('configuraciones/listado'); ?>");
    }
    consultarConfiguraciones(); //? Cargar datos de forma automatica
</script>


<script>
    function eliminar(id_fry) {

        //!Ejecutando la peticion asincrona
        $.ajax({
            type: 'post',
            url: '<?php echo site_url("configuraciones/borrar"); ?>',
            data: {
                "id_fry": id_fry
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
                    consultarConfiguraciones();
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

<script type="text/javascript">
    $("#frm_nueva_categoria").validate({
        rules: {
            nombre_empresa_fry: {
                required: true

            },
            ruc_fry: {
                required: true
            },
            nombre_pro: {
                required: true
            },
            telefono_fry: {
                required: true
            },
            direccion_fry: {
                required: true
            },
            representante_fry: {
                required: true
            }

        },
        messages: {
            nombre_empresa_fry: {
                required: "Por favor ingrese la cedula"
            },
            ruc_fry: {
                required: "Por favor ingrese sus apellidos"
            },
            telefono_fry: {
                required: "Por favor ingrese sus nombres"
            },
            direccion_fry: {
                required: "Por favor ingrese su titulo"
            },
            representante_fry: {
                required: "Por favor ingrese su titulo"
            }
        },
        submitHandler: function(formulario) {
            //!Ejecutando la peticion asincrona
            $.ajax({
                type: 'post',
                url: '<?php echo site_url("configuraciones/guardar"); ?>',
                data: $(formulario).serialize(),
                success: function(data) {
                    var objetoRespuesta = JSON.parse(data);
                    if (objetoRespuesta.estado == "ok") {
                        Swal.fire(
                            'Confirmacion',
                            objetoRespuesta.mensaje,
                            'success',

                        )
                        $("#modalNuevaCategoria").modal("hide");
                        consultarConfiguraciones();
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