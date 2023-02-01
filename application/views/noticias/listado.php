<?php if ($noticias): ?>
  <table class="table table-bordered table-striped table-hover" id="tbl-noticias">
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
      <?php foreach ($noticias->result()as $noticia): ?>
        <tr>
          <td><?php echo $noticia->id_not_fry; ?></td>
          <td><?php echo $noticia->nombre_not_fry; ?></td>
          <td><?php echo $noticia->descripcion_not_fry; ?></td>
          <td>
          <a href="<?php echo site_url('noticias/editar');?>" class="btn btn-warning" ><i class="glyphicon glyphicon-pencil"> Editar</i></a>
          <a href="<?php echo site_url('noticias/borrar');?>" class="btn btn-danger" onclick="return confirm ('¿Está seguro de eliminar?');"><i class="glyphicon glyphicon-trash"> Eliminar</i></a>
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
