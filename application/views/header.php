<?php if (!$this->session->userdata('conectad0')) : ?>
  <script type="text/javascript">
    window.location.href = "<?php echo site_url('seguridades/login'); ?>";
  </script>
<?php endif ?>
<!DOCTYPE html>
<html lang="es" dir="ltr">

<head>
  <meta charset="utf-8">
  <!-- importacion para dispocitivos moviles responsibilidad  -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>App Videogames</title>
  <!-- IMPORTACION JQUERY -->
  <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
  <!-- FIN DE IMPORTACION  -->
  <br>
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

  <!-- Optional theme -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

  <!-- Latest compiled and minified JavaScript -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

  <!-- Importacion de Jquery Validate -->
  <script type="text/javascript" src="<?php echo base_url('assets/librerias/validate/jquery.validate.min.js'); ?>"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/librerias/validate/additional-methods.min.js'); ?>"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/librerias/validate/messages_es_AR.min.js'); ?>"></script>

  <!-- Importación de DataTables -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
  <script type="text/javascript" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>

  <!-- Importación de SweetAlert2 -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.6.15/sweetalert2.css" integrity="sha512-JzSVRb7c802/njMbV97pjo1wuJAE/6v9CvthGTDxiaZij/TFpPQmQPTcdXyUVucsvLtJBT6YwRb5LhVxX3pQHQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.6.15/sweetalert2.js" integrity="sha512-9V+5wAdU/RmYn1TP+MbEp5Qy9sCDYmvD2/Ub8sZAoWE2o6QTLsKx/gigfub/DlOKAByfhfxG5VKSXtDlWTcBWQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  <!-- Importacion Bootstrap Select -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.18/js/bootstrap-select.min.js" integrity="sha512-yDlE7vpGDP7o2eftkCiPZ+yuUyEcaBwoJoIhdXv71KZWugFqEphIS3PU60lEkFaz8RxaVsMpSvQxMBaKVwA5xg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.18/css/bootstrap-select.min.css" integrity="sha512-ARJR74swou2y0Q2V9k0GbzQ/5vJ2RBSoCWokg4zkfM29Fb3vZEQyv0iWBMW/yvKgyHSR/7D64pFMmU8nYmbRkg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.18/js/i18n/defaults-es_ES.min.js" integrity="sha512-RN/dgJo36dNkKVnb1XGzePP4/8XGa/r+On4XYUy8I1C5z+9SsIEU2rFh6TrunAnddKwtXwMdI0Se8HZxd0GtiQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  <?php if ($this->session->flashdata('confirmacion')) : ?>
    <script type="text/javascript">
      $(document).ready(function() {
        Swal.fire(
          'CONFIRMACIÓN', //titulo
          '<?php echo $this->session->flashdata('confirmacion'); ?>', //Contenido o mensaje
          'success' //Tipo de alerta
        )
      });
    </script>
  <?php endif; ?>


  <?php if ($this->session->flashdata('error')) : ?>
    <script type="text/javascript">
      $(document).ready(function() {
        Swal.fire(
          'ERROR', //titulo
          '<?php echo $this->session->flashdata('error'); ?>', //Contenido o mensaje
          'error' //Tipo de alerta
        )
      });
    </script>
  <?php endif; ?>

</head>

<body>

  <nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigationnn</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="<?php echo site_url('welcome'); ?>">APP VIDEOGAMES</a>
      </div>
      <?php if (!$this->session->userdata('conectad0')->perfil_usu_fry == "ADMINISTRADOR") : ?>
            
            <?php endif; ?>
      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
          <li id="menu-juegos"><a href="<?php echo site_url('juegos/index'); ?>">Juegos PC</a></li>
          <li id="menu-moviles"><a href="<?php echo site_url('moviles/index'); ?>">Movil</a></li>
          <li id="menu-sucursales"><a href="<?php echo site_url('sucursales/index'); ?>">Sucursales</a></li>
          <li id="menu-usuarios"><a href="#">Usuarios</a></li>
          <li id="menu-configuracion"><a href="<?php echo site_url('configuraciones/index'); ?>">Configuracion</a></li>
          <li id="menu-categorias"><a href="<?php echo site_url('categorias/index'); ?>">Categorias</a></li>
          <li id="menu-descuentos"><a href="<?php echo site_url('descuentos/index'); ?>">Descuentos</a></li>
          <li id="menu-nuevos"><a href="<?php echo site_url('nuevos/index'); ?>">Nuevos</a></li>
          <li id="menu-editoriales"><a href="<?php echo site_url('editoriales/index'); ?>">Publishing</a></li>
          <li id="menu-noticias"><a href="<?php echo site_url('noticias/index'); ?>">Noticias</a></li>
          <li id="menu-noticias"><a href="<?php echo site_url('logs/index'); ?>">Logs</a></li>
          <li id="menu-contactos"><a href="<?php echo site_url('contactos/index'); ?>">Contactos</a></li>
        </ul>

      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>