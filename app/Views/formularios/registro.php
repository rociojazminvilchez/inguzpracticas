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
<form class="form" action="<?= base_url('noticias'); ?>" method="POST" enctype="multipart/form-data" autocomplete="off">
  <p style="text-align:right;">
    <a href="<?php echo base_url('/inguz/index')?>">
      <button type="button" class="btn-close" aria-label="Close"></button>
    </a>
  </p>
    
  <p style="text-align:left;"><span class="error"> (*) Campos obligatorios</span></p>
    <h4 style="text-align:left;"> Datos personales:</h4><br>

  <span class="error">*</span> E-mail: <br>   
    <input type="text" name="email" required ><br><br>

  <span class="error">*</span> Nombre: <br>   
    <input type="text" name="nombre" required ><br><br>
        
  <span class="error">*</span> Apellido:<br>
    <input type="text" name="apellido" required></input><br><br>
       
  <span class="error">*</span> Edad:<br>
    <input type="number" name="edad" required></input><br><br>
  
  <span class="error">*</span> Telefono:<br>
    <input type="number" name="telefono" required></input><br><br>
  
  <span class="error">*</span> Direcci&oacuten:<br>
    <input type="text" name="dire" required></input><br><br>

    Categor&iacute;a:<br>
      <select id="categoria" name="categoria" required>
        <option value="seleccione">Seleccione...</option>
        <option value="economia">Economia</option>
        <option value="politica">Politica</option>
        <option value="turismo">Turismo</option>
        <option value="deporte">Deporte</option>
      </select><br><br>

    Certificado M&eacutedico:<br>  
      <input type="file" name="image" id="image" accept="image/jpeg,image/png,pdf"><br>

<!-- Correo oculto-->
        <input type="hidden" name="usuario" value="">
        
        <input type="submit" name="noticia" value="REGISTRARSE" style="background-color: #df7718;">
  </form><br>
  <?php
    echo $this->include('plantilla/footer');
?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>