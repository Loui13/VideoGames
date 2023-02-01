<?php if ($juegos): ?>
  <table class="table table-bordered table-striped table-hover" id="tbl-juegos">
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
      <?php foreach ($juegos->result()as $juego): ?>
        <tr>
          <td><?php echo $juego->id_jue_fry; ?></td>
          <td><?php echo $juego->nombre_jue_fry; ?></td>
          <td><?php echo $juego->descripcion_jue_fry; ?></td>
        
          <td>
          <a href="<?php echo site_url('juegos/editar');?>" class="btn btn-warning" ><i class="glyphicon glyphicon-pencil"> Editar</i></a>
          <a href="<?php echo site_url('juegos/borrar');?>" class="btn btn-danger" onclick="return confirm ('¿Está seguro de eliminar?');"><i class="glyphicon glyphicon-trash"> Eliminar</i></a>
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
