<?php if ($editoriales): ?>
  <table class="table table-bordered table-striped table-hover" id="tbl-editoriales">
    <thead>
      <tr>
        <th>ID</th>
        <th>NOMBRE</th>
        <th>DIRECCION</th>
        <th>EMAIL</th>
        <th>ACCIONES</th>
      </tr>
    </thead>
    <br>
    <tbody>
      <?php foreach ($editoriales->result()as $editorial): ?>
        <tr>
          <td><?php echo $editorial->id_edi_fry; ?></td>
          <td><?php echo $editorial->nombre_edi_fry; ?></td>
          <td><?php echo $editorial->direccion_edi_fry; ?></td>
          <td><?php echo $editorial->email_edi_fry; ?></td>
          <td>
          <a href="<?php echo site_url('editoriales/editar');?>" class="btn btn-warning" ><i class="glyphicon glyphicon-pencil"> Editar</i></a>
          <a href="<?php echo site_url('editoriales/borrar');?>" class="btn btn-danger" onclick="return confirm ('¿Está seguro de eliminar?');"><i class="glyphicon glyphicon-trash"> Eliminar</i></a>
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
