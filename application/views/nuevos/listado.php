<?php if ($nuevos): ?>
  <table class="table table-bordered table-striped table-hover" id="tbl-nuevos">
    <thead>
      <tr>
        <th>ID</th>
        <th>NOMBRE</th>
        <th>DESCRIPCION</th>
        <th>ACCIONES</th>
      </tr>
    </thead>
    <br>
    <tbody>
      <?php foreach ($nuevos->result()as $nuevo): ?>
        <tr>
          <td><?php echo $nuevo->id_nue_fry; ?></td>
          <td><?php echo $nuevo->nombre_nue_fry; ?></td>
          <td><?php echo $nuevo->descripcion_nue_fry; ?></td>
          <td>
          <a href="<?php echo site_url('nuevos/editar');?>" class="btn btn-warning" ><i class="glyphicon glyphicon-pencil"> Editar</i></a>
          <a href="<?php echo site_url('nuevos/borrar');?>" class="btn btn-danger" onclick="return confirm ('¿Está seguro de eliminar?');"><i class="glyphicon glyphicon-trash"> Eliminar</i></a>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
<?php else: ?>
  <div class="alert alert-danger">
    No se encontraron profesores.
  </div>
<?php endif; ?>
