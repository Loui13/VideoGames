<?php if ($sucursales): ?>
  <table class="table table-bordered table-striped table-hover" id="tbl-sucursales">
    <thead>
      <tr>
        <th>ID</th>
        <th>PROVINCIA</th>
        <th>CIUDAD</th>
        <th>ESTADO</th>
        <th>DIRECCION</th>
        <th>EMAIL</th>
        <th>ACCIONES</th>
      </tr>
    </thead>
    <br>
    <tbody>
      <?php foreach ($sucursales->result()as $sucursal): ?>
        <tr>
          <td><?php echo $sucursal->id_suc_fry; ?></td>
          <td><?php echo $sucursal->provincia_suc_fry; ?></td>
          <td><?php echo $sucursal->ciudad_suc_fry; ?></td>
          <td><?php echo $sucursal->estado_suc_fry; ?></td>
          <td><?php echo $sucursal->direccion_suc_fry; ?></td>
          <td><?php echo $sucursal->email_suc_fry; ?></td>
          <td>
          <a href="<?php echo site_url('sucursales/editar');?>" class="btn btn-warning" ><i class="glyphicon glyphicon-pencil"> Editar</i></a>
          <a href="<?php echo site_url('sucursales/borrar');?>" class="btn btn-danger" onclick="return confirm ('¿Está seguro de eliminar?');"><i class="glyphicon glyphicon-trash"> Eliminar</i></a>
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
