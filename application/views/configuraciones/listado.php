<?php if ($Configuraciones) : ?>
    <center>
        <table class="table table-bordered table-striped table-hover" id="tbl-configuraciones">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Ruc</th>
                    <th>Telefono</th>
                    <th>Direccion</th>
                    <th>Representante</th>

                </tr>
            </thead>
            <tbody>
                <?php foreach ($Configuraciones->result() as $configuracion) : ?>
                    <tr>
                        <td><?php echo $configuracion->id_fry; ?>
                            <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#detalle_<?php echo $configuracion->id_fry; ?>">detalle </button>
                            <div id="detalle_<?php echo $configuracion->id_fry; ?>" class="collapse">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                                sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                            </div>
                            </div>
                        </td>
                        <td><?php echo $configuracion->nombre_empresa_fry; ?></td>
                        <td><?php echo $configuracion->ruc_fry; ?></td>
                        <td><?php echo $configuracion->telefono_fry; ?></td>
                        <td><?php echo $configuracion->direcion_fry; ?></td>
                        <td><?php echo $configuracion->representante_fry; ?></td>

                        <td>
                            <a>Editar</a>
                            <a onclick="eliminar(<?php echo $configuracion->id_fry; ?>)" class="btn btn-danger"><i class="glyphicon glyphicon-trash"> Eliminar</i></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>

        </table>
    </center>
<?php else : ?>
    <div class="alert alert-danger">No se encotraron unidades</div>

<?php endif; ?>



<script>

</script>