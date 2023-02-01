<script type="text/javascript">
    $("#menu-sucursales").addClass('active');
</script>

<center>
    <h3>Gestion de Sucursales</h3>
</center>
<br>
<center>
    <!-- Trigger the modal with a button -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalNuevaSucursal">
        <i class="glyphicon glyphicon-plus"></i>Agregar</button>
</center>
<!-- Modal -->
<div id="modalNuevaSucursal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><b>Nueva Sucursal</b></h4>
            </div>
            <div class="modal-body">
                <form id="frm_nueva_sucursal" class="" action="<?php echo site_url('sucursales/guardar'); ?>" method="post">
                    <b>Provincia:</b>
                    <input type="text" id="provincia_suc_fry" name="provincia_suc_fry" value="" placeholder="Ingrese la provincia" class="form-control">
                    <br>
                    <b>Ciudad:</b>
                    <input type="text" id="ciudad_suc_fry" name="ciudad_suc_fry" value="" placeholder="Ingrese la ciudad" class="form-control">
                    <br>
                    <b>Estado:</b>
                    <input type="text" id="estado_suc_fry" name="estado_suc_fry" value="" placeholder="Ingrese el estado" class="form-control">
                    <br>
                    <b>Direccion:</b>
                    <input type="text" id="direccion_suc_fry" name="direccion_suc_fry" value="" placeholder="Ingrese la direccion" class="form-control">
                    <br>
                    <b>Email:</b>
                    <input type="text" id="email_suc_fry" name="email_suc_fry" value="" placeholder="Ingrese su email" class="form-control">
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
<button type="button" name="button" onclick="consultarSucursales()">Actualizar datos</button>

<div class="container">
    <div id="contenedor-listado-sucursales">

    </div>
</div>

<script type="text/javascript">
    function consultarSucursales() {
        $("#contenedor-listado-sucursales").html('<center><i class="fa fa-spinner  fa-3x fa-spin"></i><br>Espere porfavor..</center>'); //fa-spin para que gire el spinner, fa-1x a 3x el tamaño, fa fa-spinner figura
        $("#contenedor-listado-sucursales").load("<?php echo site_url('sucursales/listado'); ?>"); //capturar el id(#) que se ingreso en la parte de arriba
    }
    consultarSucursales(); //carga datos de froma automatica la tabla                                    //llamamos a la funcion listado profesores
</script>


<script type="text/javascript">
    $("#frm_nueva_sucursal").validate({
        rules: {
            provincia_suc_fry: {
                required: true
            },
            ciudad_suc_fry: {
                required: true
            },
            estado_suc_fry: {
                required: true
            },
            email_suc_fry: {
                required: true
            },
            direccion_suc_fry: {
                required: true
            }
        },
        messages: {
            provincia_suc_fry: {
                required: "Por favor ingrese su provincia"
            },
            ciudad_suc_fry: {
                required: "Por favor ingrese su ciudad"
            },
            estado_suc_fry: {
                required: "Porfavor ingreses su estado"
            },
            direccion_suc_fry: {
                required: "Porfavor ingrese su direccion"
            },
            email_suc_fry: {
                required: "Porfavor ingrese su email"
            }
        },
        submitHandler: function(formulario) {
            //!Ejecutando la peticion asincrona
            $.ajax({
                type: 'post',
                url: '<?php echo site_url("sucursales/guardar"); ?>',
                data: $(formulario).serialize(),
                success: function(data) {
                    var objetoRespuesta = JSON.parse(data);
                    if (objetoRespuesta.estado == "ok") {
                        Swal.fire(
                            'Confirmacion',
                            objetoRespuesta.mensaje,
                            'success',

                        )
                        $("#modalNuevaSucursal").modal("hide");
                        consultarSucursales();
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