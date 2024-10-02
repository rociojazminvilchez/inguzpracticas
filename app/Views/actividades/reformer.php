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

<div class="card text-center">
  <div class="card-header">
    <ul class="nav nav-tabs card-header-tabs">
      <li class="nav-item">
        <a class="nav-link active" aria-current="true" href=<?= base_url('/actividades/reformer'); ?>>Pilates Reformer</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" aria-current="true" href="<?= base_url('/actividades/hiit'); ?>">Pilates Hiit</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" aria-current="true" href="<?= base_url('/actividades/terapeutico'); ?>" >Pilates Terap&eacuteutico</a>
      </li>
    </ul>
  </div><br>
  <div class="container text-center">
    <div class="row">
      <div class="col">
        <h4>Pilates Reformer</h4>
        <section style="text-align: justify;">
            <?php foreach ($pilates as $pila): 
            ?>
            <p><?= esc($pila['Descripcion']) ?></p> 
            <?php endforeach; ?>
        </section>
      </div>

      <div class="col">
        <div id="carouselActividades" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselActividades" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselActividades" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselActividades" data-bs-slide-to="2" aria-label="Slide 3"></button>
          </div>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="/inguz/public/assets/img/actividades/reformer1.png" class="d-block w-100" alt="actividades-1">
            </div>
            <div class="carousel-item">
              <img src="/inguz/public/assets/img/actividades/reformer2.png" class="d-block w-100" alt="actividades-2">
            </div>
            <div class="carousel-item">
              <img src="/inguz/public/assets/img/actividades/reformer3.png" class="d-block w-100" alt="actividades-3">
            </div>
        </div>
      </div><br>
  </div>
</div>

<div class="card-body">
  <h5>Horarios</h5>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">Horario</th>
          <th scope="col">Lunes</th>
          <th scope="col">Martes</th>
          <th scope="col">Miércoles</th>
          <th scope="col">Jueves</th>
          <th scope="col">Viernes</th>
        </tr>
      </thead>
      <tbody>
      <?php
        $horas = ['8-9hs', '9-10hs', '10-11hs','11-12hs', '15-16hs','16-17hs', '17-18','18-19hs', '19-20hs','20-21hs'];
        $dias = ['Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes'];
        
        foreach ($horas as $hora): ?>
          <tr>
          <th scope="row">
          <?php foreach ($actividades as $actividad) {
            if ($actividad['Horario'] == $hora) {
              echo $hora; 
              break;
            }
          }
          ?>
          </th>
          <?php foreach ($dias as $dia): ?>
            <td>
            <?php foreach ($actividades as $actividad) {
              if ($actividad['Horario'] === $hora && $actividad['Dia'] === $dia) {
                echo "Reformer";
              }
            }
            ?>
            </td>
            <?php endforeach; ?>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
</div><br>

<h5>Precios</h5>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Clases</th>
      <th scope="col">Precio</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($pilates as $pila): ?>
      <tr>
        <td><?= esc($pila['Clases']) ?></td> 
        <td>$<?= esc($pila['Precio']) ?></td> 
      </tr>
    <?php endforeach; ?>
  </tbody>
</table><br>
<h6 style="text-align: center;"> Medios de pago: Efectivo y Transferencia. </h6><br>
  <div>
    <a href="<?= base_url('/inguz/reserva'); ?>" class="btn btn-primary btn-lg" style="background-color: #df7718; border: none;">Reservar</a>
  </div>
    </div>
<?php
    echo $this->include('plantilla/footer');
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>