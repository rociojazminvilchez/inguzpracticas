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


<div class="alert alert-warning" role="alert">
    <strong>Atención:</strong> Este panel es para MODIFICAR la compra de créditos.
</div>

<?php if (session()->getFlashdata('error')): ?>
    <div class="alert alert-danger">
        <?= session()->getFlashdata('error') ?>
    </div>
<?php endif; ?>

<form class="form" action="<?= base_url('creditos/update/' . esc($id)); ?>" method="POST" enctype="multipart/form-data" autocomplete="off">
    <h4 style="text-align:center;">Modificar Créditos</h4><br>

    E-mail: <br>  
    <strong><?= esc($correo) ?></strong><br><br>

    <input type="hidden" name="correo" value="<?= esc($correo) ?>">

    <span class="error">*</span>Actividad: <br>  
    <select name="actividad" id="act" required>
        <option value="">- Seleccione una actividad -</option>
        <option value="hiit" <?= ($actividad == 'hiit') ? 'selected' : '' ?>>Pilates HIIT</option>
        <option value="terapeutico" <?= ($actividad == 'terapeutico') ? 'selected' : '' ?>>Pilates Terapeutico</option>
        <option value="reformer" <?= ($actividad == 'reformer') ? 'selected' : '' ?>>Pilates Reformer</option>
    </select><br><br>
    
    <span class="error">*</span>Cantidad de clases: <br>  
    <select name="cantidad" id="cant" required>
        <option value="">- Seleccione cantidad -</option>
        <option value="4" <?= ($cantidad == 4) ? 'selected' : '' ?>>4</option>
        <option value="8" <?= ($cantidad == 8) ? 'selected' : '' ?>>8</option>
        <option value="12" <?= ($cantidad == 12) ? 'selected' : '' ?>>12</option>
    </select><br><br>
   
    <span class="error">*</span>Medio de pago: <br>  
    <select name="pago" id="pago" required>
        <option value="">- Seleccione medio de pago -</option>
        <option value="Efectivo" <?= ($pago == 'Efectivo') ? 'selected' : '' ?>>Efectivo</option>
        <option value="Transferencia" <?= ($pago == 'Transferencia') ? 'selected' : '' ?>>Transferencia</option>
    </select><br><br>
  
    <input type="submit" name="confirmar" value="Modificar" style="background-color: #df7718;">
</form>
<br><br><br>

 

  <?php
    echo $this->include('plantilla/footer');
  ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>