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

<?php   
    if (!session()->has('usuario')) {
        ?>

    <p style="text-align:center;">
    <h4 style="text-align: center;"> Para comprar cr&eacuteditos, debes: </h4><br>
          <p style="text-align: center;" >    
    <a href="<?= base_url('/formularios/ingreso'); ?>" class="btn btn-primary btn-lg" style="background-color: #df7718; border: none; ">Iniciar sesi&oacuten</a><br><br>
    <a href="<?= base_url('/formularios/registro'); ?>"class="btn btn-primary btn-lg" style="background-color: #df7718; border: none;">Crear cuenta</a>
</p>
  </form> 
<?php
    }else{    
?><br>
<div class="alert alert-warning" role="alert">
        <strong>Atención:</strong> Este panel es para comprar cr&eacuteditos.
    </div>
    <?php if (session()->getFlashdata('error')): ?>
    <div class="alert alert-danger">
        <?= session()->getFlashdata('error') ?>
    </div>
<?php endif; ?>

<form class="form" action="<?= base_url('creditos/create'); ?>" method="POST" enctype="multipart/form-data" autocomplete="off">
<?php if (session()->get('errors')): ?>
        <div class="alert alert-danger">
            <ul>
                <?php foreach (session()->get('errors') as $error): ?>
                    <li><?= esc($error) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>  
<p style="text-align:right;">
    <a href="<?php echo base_url('/inguz/actividades')?>">
      <button type="button" class="btn-close" aria-label="Close"></button>
    </a>
  </p>
    <h4 style="text-align:center;">Comprar Cr&eacuteditos</h4><br>
  <p style="text-align:left;"><span class="error"> (*) Selecciones obligatorias </span></p>
 
    E-mail: <br>  
    <strong>
    <?= $_SESSION['usuario'] ?>
  </strong><br><br>

  <input type="hidden" name="correo" value="<?= $_SESSION['usuario'] ?>">
  
    
  <span class="error">*</span>Actividad: <br>  
    <select name="actividad" id="act">
        <option value="">- Seleccione una actividad -</option>
        <option value="HIIT" <?= isset($actividad) && $actividad == 'hiit' ? 'selected' : '' ?>>Pilates HIIT</option>
        <option value="Terapeutico" <?= isset($actividad) && $actividad == 'terapeutico' ? 'selected' : '' ?>>Pilates Terapeutico</option>
        <option value="Reformer" <?= isset($actividad) && $actividad == 'reformer' ? 'selected' : '' ?>>Pilates Reformer</option>
    </select><br><br>

    <span class="error">*</span>Cantidad de clases: <br>  
    <select name="cantidad" id="cant">
        <option value="">- Seleccione cantidad -</option>
        <option value="4" <?= isset($cantidad) && $cantidad == '4' ? 'selected' : '' ?>>4</option>
        <option value="8" <?= isset($cantidad) && $cantidad == '8' ? 'selected' : '' ?>>8</option>
        <option value="12" <?= isset($cantidad) && $cantidad == '12' ? 'selected' : '' ?>>12</option>
    </select><br><br>

    <span class="error">*</span>Medio de pago: <br>  
    <select name="pago" id="pago">
        <option value="">- Seleccione medio de pago -</option>
        <option value="Efectivo" <?= isset($pago) && $pago == 'Efectivo' ? 'selected' : '' ?>>Efectivo</option>
        <option value="Transferencia" <?= isset($pago) && $pago == 'Transferencia' ? 'selected' : '' ?>>Transferencia</option>
    </select><br><br>

  
    <input type="submit" name="confirmar" value="Confirmar" style="background-color: #df7718;">
  </form><br><br><br>
 

  <?php
    }
    echo $this->include('plantilla/footer');
  ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>