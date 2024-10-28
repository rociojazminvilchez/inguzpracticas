<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Inguz</title>
    <meta name="description" content="The small framework with powerful features">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?= base_url('img/icon.png')?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= base_url('assets/css/index.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/formularios.css') ?>">

  </head>
<body>
<?php
    echo $this->include('plantilla/navbar');
?>

<?php if (session()->getFlashdata('mensajeError')): ?>
    <div class="alert alert-danger">
        <?= session()->getFlashdata('mensajeError') ?>
    </div>
<?php endif; ?>
<?php if (session()->getFlashdata('mensaje')): ?>
    <div class="alert alert-success">
        <?= session()->getFlashdata('mensaje') ?>
    </div>
<?php endif; ?>

    <div class="alert alert-warning" role="alert">
        <strong>Atención:</strong> Este inicio de sesi&oacuten es únicamente para instructores. Por favor, asegúrate de cumplir con los requisitos antes de continuar.
    </div>

  <form class="form" action="<?php echo base_url('/home/logininstructor')?>" method="POST">
    <p style="text-align:right;">
      <a href="<?php echo base_url('/inguz/index')?>">
        <button type="button" class="btn-close" aria-label="Close"> </button>
      </a>
    </p>

    <h3> Iniciar sesi&oacuten:</h3><br>
      E-mail:<br>    
        <input type="email" name="usuario" required> <br>
        <span class="error"> </span><br>

      Contrase&ntildea:<br>
          <input type="password" name="contra" required><br>
          <span class="error"> </span><br>
               
      <input type="submit" name="ingresar" value="Ingresar" style="background-color: #df7718;"><br><br>
      
  </form> <br><br><br>

<?php
    echo $this->include('plantilla/footer');
?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>