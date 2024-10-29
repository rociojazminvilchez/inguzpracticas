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
  <style>
    .inline-text, .select-tamano {
  display: inline-block;
  vertical-align: middle; /* Alinea verticalmente ambos elementos */
  }

    .select-tamano {
  width: 200px; /* Ajusta el ancho según tus necesidades */
  height: 60px; /* Ajusta la altura según tus necesidades */
  font-size: 16px; /* Tamaño de la fuente de las opciones */
  margin-left: 50px; /* Espacio entre el texto y el selector */
}

    </style>
<body>
<?php
    echo $this->include('plantilla/navbar');
?>

<?php   
$mensaje = "";  // Variable para almacenar el mensaje de éxito
$mensajeError = "";  // Variable para almacenar el mensaje de error

if (!session()->has('usuario')) {
    $mensajeError = "Para realizar una reserva, debe iniciar sesión o registrarse.";
} else {
    if (count($membresia) != 0) {
        $mensaje = "Usted posee una membresía activa.";
        // Agregar el mensaje flash si existe
        if (session()->getFlashdata('mensaje')) {
            $mensaje .= "<br>" . session()->getFlashdata('mensaje');
        }
    } else {
        $mensajeError = "Usted no registra membresías activas.";
        if (session()->getFlashdata('mensaje')) {
            $mensajeError .= "<br>" . session()->getFlashdata('mensaje');
        }
    }
}
?>

<div style="text-align: left;">
    <?php if (!empty($mensaje)): ?>
        <div class="alert alert-success">
            <h6><?= $mensaje ?></h6>
        </div>
    <?php endif; ?>

    <?php if (!empty($mensajeError)): ?>
        <div class="alert alert-danger">
            <h6><?= $mensajeError ?></h6>
        </div>
    <?php endif; ?>
    
    <?php if (!session()->has('usuario')): ?>
      <div style="text-align: center;">
        <a href="<?= base_url('/formularios/ingreso'); ?>" class="btn btn-primary btn-lg" style="background-color: #df7718; border: none;">Iniciar sesión</a><br><br>
        <a href="<?= base_url('/formularios/registro'); ?>" class="btn btn-primary btn-lg" style="background-color: #df7718; border: none;">Registrarse</a>
    </div>
      <?php endif; ?>
</div>
<?php
   echo $this->include('plantilla/footer');
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>