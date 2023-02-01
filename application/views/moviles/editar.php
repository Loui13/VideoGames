<script type="text/javascript">
      $("#menu-moviles").addClass("active");
</script>
<div class="row">
  <div class="col-md-12 text-center well">
    <h3><b>EDITAR DATOS moviles</b> </h3>
  </div>
  <center>
    <a href="<?php echo site_url('moviles/index') ?>" class="btn btn-primary"><i class="glyphicon glyphicon-arrow-left"></i> REGRESAR</a>
  </center>
  <br>
  <div class="row">
    <div class="col-md-12">
      <?php if ($juegoEditar): ?>
        <!-- </?php print_r($juegoEditar); ?> -->
        <form  class="" action="<?php echo site_url('moviles/procesarActualizacion') ?>" method="post" >
          <center>
            <input type="hidden" name="id_jue_fry" value="<?php echo $juegoEditar->id_jue_fry; ?>">
          </center>
          <br>
            <div class="row">
              <div class="col-md-4 text-right">
                <label for="">NOMBRE:</label>
              </div>
              <div class="col-md-7">
                <input type="number" name="nombre_jue_fry" value="<?php echo $juegoEditar->nombre_jue_fry?>" class="form-control" placeholder="Ingrese el número de cédula" required>
              </div>
            </div>
            <br>
            <div class="row">
              <div class="col-md-4 text-right">
                <label for="">DESCRIPCION:</label>
              </div>
              <div class="col-md-7">
                <input type="text" name="descripcion_jue_fry" value="<?php echo $juegoEditar->descripcion_jue_fry?>" class="form-control" placeholder="Ingrese los dos apellidos" required>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4">
              </div>
              <div class="col-md-7">
                <button type="submit" name="button" class="btn btn-warning"><i class="glyphicon glyphicon-floppy-saved"></i> ACTUALIZAR</button>
                <a href="<?php echo site_url('moviles/index') ?>" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i>CANCELAR</a>
              </div>
            </div>
        </form>
      <?php else: ?>
        <div class="alert alert-danger">
          <b>NO SE ENCONTRÓ moviles</b>
        </div>
      <?php endif; ?>
    </div>
  </div>
</div>
