<?php if ($contactos) : ?>
  <table class="table table-bordered table-striped table-hover" id="tbl-contactos">
    <thead>
      <tr>
        <th>ID</th>
        <th>SUCURSAL</th>
        <th>TELEFONO</th>
        <th>EMAIL</th>
        <th>ACCIONES</th>
      </tr>
    </thead>
    <br>
    <tbody>
      <?php foreach ($contactos->result() as $contacto) : ?>
        <tr>
          <td><?php echo $contacto->id_con_fry; ?></td>
          <td><?php echo $contacto->sucursal_con_fry; ?></td>
          <td><?php echo $contacto->telefono_con_fry; ?></td>
          <td><?php echo $contacto->email_con_fry; ?></td>
          <td>
            <a href="#" onclick="abrirEditarContacto(<?php echo $contacto->id_con_fry; ?>);"><i class="btn-edit"> Editar</i></a>
            <a href="<?php echo site_url('contactos/borrar'); ?>" class="btn btn-danger" onclick="return confirm ('¿Está seguro de eliminar?');"><i class="glyphicon glyphicon-trash"> Eliminar</i></a>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
<?php else : ?>
  <div class="alert alert-danger">
    No se encontraron profesores.
  </div>
<?php endif; ?>


<script type="text/javascript">
  function abrirEditarContacto(id_con_fry) {
    $("#contenedor-editar-contactos").html('<center><i class="fa fa-spinner  fa-3x fa-spin"></i><br>Espere porfavor..</center>'); //fa-spin para que gire el spinner, fa-1x a 3x el tamaño, fa fa-spinner figura
    $("#contenedor-editar-contactos").load("<?php echo site_url('contactos/editar'); ?>/" + id_con_fry); //capturar el id(#) que se ingreso en la parte de arriba
    $("#modalEditarContacto").modal("show");
  }
</script>