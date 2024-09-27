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
    <link rel="stylesheet" href="<?= base_url('css/formularios.css') ?>">
  </head>
<body>
<?php
    echo $this->include('plantilla/navbar');
?>
<br>
<H3 style="text-align: center;"> Actividades </H3><br>
<section style="text-align: center;">
Este es el momento perfecto para ejercitar tu cuerpo de manera entretenida y consciente.<br>
En INGUZ, te invitamos a: <br>
<section style="">
Despejar la mente y encontrar la tranquilidad. <br>
Mejorar tu postura, equilibrio y coordinación. <br>
Aumentar tu flexibilidad y reducir el estrés. <br>
Fortalecer tu sistema inmunológico.<br>
</section>
¡Todo esto con un entrenamiento moderado, sin impacto y, lo más importante, con PLACER! <br>

</section><br>

<div class="container">
  <div class="row">
    <div class="col-md-4">
      <div class="card" style="width: 18rem;">
        <img src="\inguz\public\assets\img\reformer.jpg" class="card-img-top" alt="reformer" width="400" height="300">
        <div class="card-body">
          <h5 class="card-title">Pilates Reformer</h5>
          <p class="card-text">Mejora la fuerza, flexibilidad, equilibrio y postura mediante ejercicios controlados y precisos.</p>
          <a href="<?= base_url('/actividades/reformer'); ?>" class="btn btn-primary">Ver m&aacutes informaci&oacuten</a>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card" style="width: 18rem;">
        <img src="\inguz\public\assets\img\hiit.jpeg" class="card-img-top" alt="hitt" width="400" height="300">
        <div class="card-body">
          <h5 class="card-title">Pilates HIIT</h5>
          <p class="card-text">Combina Pilates con ejercicios de alta intensidad para mejorar la fuerza, la resistencia y la flexibilidad. </p>
          <a href="<?= base_url('/actividades/hiit'); ?>" class="btn btn-primary">Ver m&aacutes informaci&oacuten</a>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card" style="width: 18rem;">
        <img src="\inguz\public\assets\img\terapeutico.jpg" class="card-img-top" alt="terapeutico" width="400" height="300">
        <div class="card-body">
          <h5 class="card-title">Pilates Terap&eacuteutico</h5>
          <p class="card-text">Rehabilitación y tratamiento de lesiones, mejora de la postura y alivio del dolor.</p>
          <a href="<?= base_url('/actividades/terapeutico'); ?>" class="btn btn-primary">Ver m&aacutes informaci&oacuten</a>
        </div>
      </div>
    </div>
  </div>
</div><br>


<?php
    echo $this->include('plantilla/footer');
?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>