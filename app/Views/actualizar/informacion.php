<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Inguz</title>
    <meta name="description" content="The small framework with powerful features">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?= base_url('img/icon.png')?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= base_url('assets/css/actividades.css') ?>">
  </head>
<body>
<?php
    echo $this->include('plantilla/navbar');
?>

<br>
<?php if (session()->getFlashdata('mensaje')): ?>
    <div class="alert alert-success">
        <?= session()->getFlashdata('mensaje') ?>
    </div>
<?php endif; ?>
<div class="alert alert-warning" role="alert">
  <strong>Atención:</strong> Este panel es para actualizar informaci&oacuten.
</div>
<div class="card text-center">
  <div class="card-header">
    <ul class="nav nav-tabs card-header-tabs">
      <li class="nav-item">
        <a class="nav-link active" aria-current="true" href=<?= base_url('/actualizar/actualizar_reformer'); ?>>Pilates Reformer</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" aria-current="true" href="<?= base_url('/actualizar/hiit'); ?>">Pilates  HIIT</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" aria-current="true" href="<?= base_url('/actualizar/terapeutico'); ?>"> Pilates Terap&eacuteutico</label></a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" aria-current="true" href="<?= base_url('/actualizar/informacion'); ?>"> <label style="color:red; font-weight: bold;">*  Informaci&oacuten</label></a>
      </li>
    </ul>
</div><br>
<div class="container">
    <h3 style="text-align: center; color: red;">Informaci&oacuten</h3>
<form action="<?= base_url('/actualizar/informacion') ?>" method="post">
        <!-- Descripción -->
        <div class="mb-3">
       
        <?php foreach ($info as $i): 
          ?>
            <input type="hidden" name="id" value="<?= esc($i['id']) ?>">
          <h5 style= "text-align: left;">¿Quienes somos?</h5>
          <textarea class="form-control" id="quienes" name="quienes" rows="4"><?= esc($i['quienes']) ?></textarea><br>
          <h5 style= "text-align: left;">¿Donde estamos?</h5>
          <textarea class="form-control" id="lugar" name="lugar" rows="4"><?= esc($i['lugar']) ?></textarea><br>
          <h5 style= "text-align: left;">Horarios de atenci&oacuten:</h5>
          <textarea class="form-control" id="horarios" name="horarios" rows="4"><?= esc($i['horarios']) ?></textarea><br>
          <h5 style= "text-align: left;">Actividades:</h5>
          <textarea class="form-control" id="actividades" name="actividades" rows="4"><?= esc($i['actividades']) ?></textarea>
          
        <?php        
    endforeach; ?>
        </div>
        <button type="submit" class="btn btn-primary" style="background-color: #df7718; border: none;">GUARDAR CAMBIOS</button>
    </p>
    </form>
</div>
    </body> 
<?php
    echo $this->include('plantilla/footer');
?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>