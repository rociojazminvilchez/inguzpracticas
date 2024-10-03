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

<body>
<div class="alert alert-warning" role="alert">
  <strong>Atención:</strong> Este panel es para actualizar informaci&oacuten.
</div>
<form class="form" action="<?= base_url('/instructor/perfil'); ?>" method="POST" enctype="multipart/form-data" autocomplete="off">
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
      <a href="<?php echo base_url('/inguz/index')?>">
        <button type="button" class="btn-close" aria-label="Close"> </button>
      </a>
    </p>
<?php foreach ($instructor as $inst):  
 ?>
    <h5 style="text-align:center; color:red;"> Actualizar informaci&oacuten:</h5><br>
   <h5 style="text-align:left;"> Datos personales </h5>
  <span class="error">*</span> Nombre: <br>   
    <input type="text" name="nombre" value="<?= esc($inst['nombre']) ?>" required ><br><br>
       
  <span class="error">*</span> Apellido:<br>
    <input type="text" name="apellido" value="<?= esc($inst['apellido']) ?>" required></input><br><br>
       
  <span class="error">*</span> Edad:<br>
    <input type="number" name="edad" value="<?= esc($inst['edad']) ?>" required></input><br><br>
  
 Tel&eacutefono:<br>
    <input type="number" name="telefono" value="<?= esc($inst['telefono']) ?>" ></input><br><br>
    
   <span class="error">*</span> Formaci&oacuten:<br>
     <textarea name="formacion" required><?= esc($inst['formacion']) ?></textarea><br>
     
 Tipo de pilates:<br>
    <strong>   <?= esc($inst['tipo']) ?> </strong>
    <br><br>

  <h5 style="text-align:left;"> Datos registro:</h5><br>  
  
  <span class="error">*</span> Contraseña: <br>   
  <input type="password" name="contra" value="<?= esc($inst['contraseña']) ?>" required ><br><br>  
  
  <span class="error">*</span> Confirmar contraseña: <br>   
  <input type="password" name="contra2" value="<?= esc($inst['contraseña2']) ?>"required ><br><br> 
<!-- Campo oculto -->
  <input type="hidden" name="tipo_usuario" value="instructor">
  <input type="hidden" name="correo" value="<?= esc($inst['correo'])?>">
  <?php
   endforeach;
?> 
      <input type="submit" name="perfil" value="ACTUALIZAR" style="background-color: #df7718;">
  </form><br><br><br>
  <?php
    echo $this->include('plantilla/footer');
  ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>