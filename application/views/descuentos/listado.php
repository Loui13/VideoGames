<?php if ($descuentos): ?>
  <table class="table table-bordered table-striped table-hover" id="tbl-descuentos">
    <thead>
      <tr>
        <th>ID</th>
        <th>JUEGO</th>
        <th>PORECENTAJE</th>
        <th>ACCIONES</th>
      </tr>
    </thead>
    <br>
    <tbody>
      <?php foreach ($descuentos->result()as $descuento): ?>
        <tr>
          <td><?php echo $descuento->id_des_fry; ?></td>
          <td><?php echo $descuento->juego_des_fry; ?></td>
          <td><?php echo $descuento->porcentaje_des_fry; ?></td>
          <td>
          <a href="<?php echo site_url('descuentos/editar');?>" class="btn btn-warning" ><i class="glyphicon glyphicon-pencil"> Editar</i></a>
          <a onclick="eliminar(<?php echo $descuento->id_des_fry; ?>)" class="btn btn-danger"><i class="glyphicon glyphicon-trash"> Eliminar</i></a>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
<?php else: ?>
  <div class="alert alert-danger">
    No se encontraron Descuentos.
  </div>
<?php endif; ?>
