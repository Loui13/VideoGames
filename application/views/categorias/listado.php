<?php if ($categorias): ?>
  <table class="table table-bordered table-striped table-hover" id="tbl-categorias">
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
      <?php foreach ($categorias->result()as $categoria): ?>
        <tr>
          <td><?php echo $categoria->id_cat_fry; ?></td>
          <td><?php echo $categoria->nombre_cat_fry; ?></td>
          <td><?php echo $categoria->descripcion_cat_fry; ?></td>
      
          <td>
          <a onclick="editar(<?php echo $categoria->id_cat_fry; ?>)" class="btn btn-warning"><i class="glyphicon glyphicon-pencil"> Editar</i></a>
          <a onclick="eliminar(<?php echo $categoria->id_cat_fry; ?>)" class="btn btn-danger"><i class="glyphicon glyphicon-trash"> Eliminar</i></a>
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
