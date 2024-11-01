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
  <strong>Atención:</strong> Este panel es para visualizar las membresias realizadas.
</div>
<div class="card text-center">
<div class="card-header">
    <ul class="nav nav-tabs card-header-tabs">
      <li class="nav-item">
        <a class="nav-link active" aria-current="true" href=<?= base_url('/usuario/membresias'); ?>> <label style="color:red; font-weight: bold;">*Membresias</label></a>
      </li>
      </li>
        <a class="nav-link active" aria-current="true" href=<?= base_url('/usuario/reservas'); ?> > Reservas </a>
      </li>
    </ul>
  </div><br>
  <h3 class="my-3" id="titulo" style="margin: 20px;font-family: 'Times New Roman', serif;"> MEMBRESIAS </h3> 

  <table class="table table-hover table-bordered my-3" aria-describedby="titulo">
    <thead class="table-dark">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Fecha compra</th>
            <th scope="col">Actividad</th>
            <th scope="col">Cant. clases</th>
            <th scope="col">Medio de pago</th>
            <th scope="col">Estado medio de pago</th>
            <th scope="col">Estado membresia</th>
            <th scope="col">Fecha Alta</th>
            <th scope="col">Fecha Vencimiento</th>
            <th scope="col">Reservas disponibles</th>
        </tr>
    </thead>

    <tbody>
        <?php foreach ($membresia as $espe) : 
            $estado_membresia= $espe['estado']; ?>
            <tr>
              <td><?= $espe['id']; ?></td>
              <td><?= $espe['fecha_creada']; ?></td>
              <td><?= ucfirst($espe['actividad']); ?></td>
              <td><?= $espe['cantidad']; ?></td>
              <td><?= $espe['pago']; ?></td>
              <td><?= $espe['estado_pago']; ?></td>
              
              <?php if($espe['estado_pago']!='Rechazado' && $espe['estado_pago']!='En espera'){
                 ?>             
                <td><?= $espe['estado']; ?></td>
                <td><?= $espe['fecha_inicio']; ?></td>
                <td><?= $espe['fecha_fin']; ?></td>
                <td><?= $espe['pases']; ?></td>
                <?php
              }else{
                ?>
                <td>  </td>
                <td>  </td>
                <td>  </td>
                <td>  </td>
                <?php
              }
              ?>

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