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
<div class="alert alert-warning" role="alert">
  <strong>Atención:</strong> Este panel es para visualizar el estado de la membresia.
</div>
<div class="card text-center">
<div class="card-header">
    <ul class="nav nav-tabs card-header-tabs">
      <li class="nav-item">
        <a class="nav-link active" aria-current="true" href=<?= base_url('/creditos/membresia_espera'); ?>> En espera</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" aria-current="true" href=<?= base_url('/creditos/membresia_activa'); ?>> Activas</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" aria-current="true" href=<?= base_url('/creditos/membresia_rechazada'); ?>> <label style="color:red; font-weight: bold;">* Rechazadas </label></a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" aria-current="true" href=<?= base_url('/creditos/membresia_vencida'); ?>> Vencidas</label></a>
      </li>
    </ul>
  </div><br>
  <h3 class="my-3" id="titulo" style="margin: 20px;font-family: 'Times New Roman', serif;"> Membresias rechazadas </h3> 

<table class="table table-hover table-bordered my-3" aria-describedby="titulo">
    <thead class="table-dark">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Fecha compra</th>
            <th scope="col">Correo</th>
            <th scope="col">Actividad</th>
            <th scope="col">Cant. clases</th>
            <th scope="col">Medio de pago</th>
            <th scope="col">Fecha rechazo</th>
        </tr>
    </thead>

    <tbody>
        <?php foreach ($rechazada as $espe) : 
            $id= $espe['id']; ?>
            <tr>
              <td><?= $espe['id']; ?></td>
              <td><?= $espe['fecha_creada']; ?></td>
              <td><?= ucfirst($espe['correo']); ?></td>
              <td><?= ucfirst($espe['actividad']); ?></td>
              <td><?= $espe['cantidad']; ?></td>
              <td><?= $espe['pago']; ?></td>
              <td><?= $espe['fecha_actualizacion']; ?></td>
            </tr>
        <?php 
            endforeach; 
        
      ?>
    </tbody>
</table><br><br><br><br>

    </body>   
<?php
    echo $this->include('plantilla/footer');
?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>