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
<h3 style="text-align: center;"> Pilates Reformer </h3>
<br>

<div class="card text-center">
  <div class="card-header">
    <ul class="nav nav-tabs card-header-tabs">
      <li class="nav-item">
        <a class="nav-link active" aria-current="true" href="#">Informaci&oacuten</a>
      </li>
    </ul>
  </div><br>
  <div class="container text-center">
    <div class="row">
        <div class="col">
            <h4>Actividades</h4>
            <section style="text-align: justify;">
            El Pilates Reformer es un equipo de ejercicio utilizado en la práctica del pilates que consiste en una cama con un marco y un sistema de poleas y resortes.<br>
  Este equipo permite realizar una variedad de ejercicios que se enfocan en fortalecer y tonificar el cuerpo,<br> mejorar la flexibilidad, y promover una mejor alineación postural.<br>
  Cada sesión de 50 minutos está totalmente guiada por un instructor certificado que te acompañará en cada movimiento,<br> asegurando que realices los ejercicios con la técnica adecuada y la máxima seguridad.

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
                        <img src="/inguz/public/assets/img/informacion/crs1_actividades.png" class="d-block w-100" alt="actividades-1">
                    </div>
                    <div class="carousel-item">
                        <img src="/inguz/public/assets/img/informacion/crs2_actividades.png" class="d-block w-100" alt="actividades-2">
                    </div>
                    <div class="carousel-item">
                        <img src="/inguz/public/assets/img/informacion/crs3_actividades.png" class="d-block w-100" alt="actividades-3">
                    </div>
                </div>
            </div><br>
        </div>
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
      <th scope="col">Mi&eacutercoles</th>
      <th scope="col">Jueves</th>
      <th scope="col">Viernes</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">8-9hs</th>
      <td></td>
      <td>Reformer</td>
      <td></td>
      <td> Reformer </td>
      <td> </td>
    </tr>
    <tr>
      <th scope="row">9-10hs</th>
      <td>Reformer</td>
      <td></td>
      <td>Reformer</td>
      <td></td>
      <td>Reformer</td>
    </tr>
    <tr>
      <th scope="row">11-12hs</th>
      <td></td>
      <td>Reformer</td>
      <td></td>
      <td>Reformer</td>
      <td></td>
    </tr>
    <tr>
      <th scope="row">16-17hs</th>
      <td></td>
      <td>Reformer</td>
      <td></td>
      <td>Reformer</td>
      <td></td>
    </tr>
    <tr>
      <th scope="row">18-19hs</th>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
    </tr>
    <tr>
      <th scope="row">19-20hs</th>
      <td>Reformer</td>
      <td></td>
      <td>Reformer</td>
      <td></td>
      <td>Reformer</td>
    </tr>
  </tbody>
</table><br>
<h5>Precios</h5>
    <table class="table">
      <thead>
    <tr>
      <th scope="col">Clases</th>
      <th scope="col">Precio</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">4</th>
      <td>323</td>
    </tr>
    <tr>
      <th scope="row">8</th>
      <td>123</td>
    </tr>
    <tr>
      <th scope="row">12</th>
      <td>323</td>
    </tr>
  </tbody>
</table><br>
    <a href="#" class="btn btn-primary" style="background-color: #df7718; border: none;">Reservar</a>
  </div>
</div>

<?php
    echo $this->include('plantilla/footer');
?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>