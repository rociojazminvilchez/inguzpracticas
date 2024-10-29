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
<?php if (session()->getFlashdata('mensaje')): ?>
    <div class="alert alert-success">
        <?= session()->getFlashdata('mensaje') ?>
    </div>
<?php endif; ?>

<?php if (session()->getFlashdata('error')): ?>
    <div class="alert alert-danger">
        <?= session()->getFlashdata('error') ?>
    </div>
<?php endif; ?>

<br>
<div class="alert alert-warning" role="alert">
  <strong>Atención:</strong> Este panel es para actualizar | visualizar el estado de la membresia.
</div>
<div class="card text-center">
<div class="card-header">
    <ul class="nav nav-tabs card-header-tabs">
      <li class="nav-item">
        <a class="nav-link active" aria-current="true" href=<?= base_url('/actualizar/actualizar_reformer'); ?>><label style="color:red; font-weight: bold;">*En espera</label></a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" aria-current="true" href="<?= base_url('/actualizar/hiit'); ?>">Activas</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" aria-current="true" href="<?= base_url('/actualizar/terapeutico'); ?>" >Rechazadas</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" aria-current="true" href="<?= base_url('/actualizar/informacion'); ?>">Vencidas</label></a>
      </li>
    </ul>
  </div><br>
  <h3 class="my-3" id="titulo" style="margin: 20px;font-family: 'Times New Roman', serif;"> Actualizar estado de pago </h3> 

<table class="table table-hover table-bordered my-3" aria-describedby="titulo">
    <thead class="table-dark">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Fecha compra</th>
            <th scope="col">Correo</th>
            <th scope="col">Actividad</th>
            <th scope="col">Cant. clases</th>
            <th scope="col">Medio de pago</th>
            <th scope="col">Estado pago</th>
        </tr>
    </thead>

    <tbody>
        <?php foreach ($espera as $espe) : 
            $id= $espe['id']; ?>
            <tr>
              <td><?= $espe['id']; ?></td>
              <td><?= $espe['fecha_creada']; ?></td>
              <td><?= ucfirst($espe['correo']); ?></td>
              <td><?= ucfirst($espe['actividad']); ?></td>
              <td><?= $espe['cantidad']; ?></td>
              <td><?= $espe['pago']; ?></td>
              
              <td>
                <a href="<?= base_url('creditos/aprobar_pago/'.$id) ?>" class="btn btn-primary" style="background-color: #df7718; border: none;">Aprobar</a>
                <a href="<?= base_url('creditos/rechazar_pago/'.$id) ?>" class="btn btn-primary" style="background-color: #df7718; border: none;">Rechazar</a>
              </td>
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