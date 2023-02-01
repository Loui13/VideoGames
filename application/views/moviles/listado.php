<?php if ($moviles): ?>
  <table class="table table-bordered table-striped table-hover" id="tbl-moviles">
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
      <?php foreach ($moviles->result()as $movil): ?>
        <tr>
          <td><?php echo $movil->id_mov_fry; ?></td>
          <td><?php echo $movil->nombre_mov_fry; ?></td>
          <td><?php echo $movil->descripcion_mov_fry; ?></td>
          <td>
          <a href="<?php echo site_url('moviles/editar');?>" class="btn btn-warning" ><i class="glyphicon glyphicon-pencil"> Editar</i></a>
          <a href="<?php echo site_url('moviles/borrar');?>" class="btn btn-danger" onclick="return confirm ('¿Está seguro de eliminar?');"><i class="glyphicon glyphicon-trash"> Eliminar</i></a>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
<?php else: ?>
  <div class="alert alert-danger">
    No se encontraron juegos moviles.
  </div>
<?php endif; ?>
