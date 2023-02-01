<script type="text/javascript">
    $("#menu-noticias").addClass('active');
</script>

<center>
    <h3>Gestion de noticias</h3>
</center>
<br>
<center>
    <!-- Trigger the modal with a button -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalNuevaNoticia">
        <i class="glyphicon glyphicon-plus"></i>Agregar</button>
</center>
<!-- Modal -->
<div id="modalNuevaNoticia" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><b>Nueva noticia</b></h4>
            </div>
            <div class="modal-body">
                <form id="frm_nueva_noticia" class="" action="<?php echo site_url('noticias/guardar'); ?>" method="post">
                    <b>Nombre:</b>
                    <input type="text" id="nombre_not_fry" name="nombre_not_fry" value="" placeholder="Ingrese la provincia" class="form-control">
                    <br>
                    <b>Descripcion:</b>
                    <input type="text" id="descripcion_not_fry" name="descripcion_not_fry" value="" placeholder="Ingrese la ciudad" class="form-control">
                    <br>
                   
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
<button type="button" name="button" onclick="consultarNoticias()">Actualizar datos</button>

<div class="container">
    <div id="contenedor-listado-noticias">

    </div>
</div>

<script type="text/javascript">
    function consultarNoticias() {
        $("#contenedor-listado-noticias").html('<center><i class="fa fa-spinner  fa-3x fa-spin"></i><br>Espere porfavor..</center>'); //fa-spin para que gire el spinner, fa-1x a 3x el tamaño, fa fa-spinner figura
        $("#contenedor-listado-noticias").load("<?php echo site_url('noticias/listado'); ?>"); //capturar el id(#) que se ingreso en la parte de arriba
    }
    consultarNoticias(); //carga datos de froma automatica la tabla                                    //llamamos a la funcion listado profesores
</script>


<script type="text/javascript">
    $("#frm_nueva_noticia").validate({
        rules: {
            nombre_not_fry: {
                required: true
            },
            descripcion_not_fry: {
                required: true
            }
        },
        messages: {
            nombre_not_fry: {
                required: "Por favor ingrese su provincia"
            },
            descripcion_not_fry: {
                required: "Por favor ingrese su ciudad"
            }
        },
        submitHandler: function(formulario) {
            //!Ejecutando la peticion asincrona
            $.ajax({
                type: 'post',
                url: '<?php echo site_url("noticias/guardar"); ?>',
                data: $(formulario).serialize(),
                success: function(data) {
                    var objetoRespuesta = JSON.parse(data);
                    if (objetoRespuesta.estado == "ok") {
                        Swal.fire(
                            'Confirmacion',
                            objetoRespuesta.mensaje,
                            'success',

                        )
                        $("#modalNuevaNoticia").modal("hide");
                        consultarNoticias();
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