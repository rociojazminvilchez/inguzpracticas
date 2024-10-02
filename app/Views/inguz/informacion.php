<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Inguz</title>
    <meta name="description" content="The small framework with powerful features">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?= base_url('img/icon.png')?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= base_url('assets/css/informacion.css') ?>">
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
   
  </head>
<body>
<?php
    echo $this->include('plantilla/navbar');
?><br>
<h3 style= "text-align: center;"> Informaci&oacuten </h3><br>

<!-- QUIENES SOMOS -->
<div class="container text-center">
    <div class="row">
        <div class="col">
            <h4>¿Qui&eacutenes somos?</h4>
            <section style="text-align: justify;">
                INGUZ, es un centro de bienestar y salud especializado en pilates. Contamos con seis años de experiencia en el sector, con un equipo de instructores altamente capacitados y un espacio completamente equipado, diseñado para que te sientas cómodo y logres tus objetivos. 
                Ofrecemos una variedad de días y horarios que se adaptan a tus necesidades, garantizando un ambiente exclusivo con solo 7 personas por clase. Esto nos permite ofrecerte atención personalizada y de calidad en cada sesion.
            </section>
        </div>
        <div class="col">
            <div id="carouselQuienes" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselQuienes" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselQuienes" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselQuienes" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="/inguz/public/assets/img/informacion/crs1_quienes.png" class="d-block w-100" alt="quienes-somos-1">
                    </div>
                    <div class="carousel-item">
                        <img src="/inguz/public/assets/img/informacion/crs2_quienes.png" class="d-block w-100" alt="quienes-somos-2">
                    </div>
                    <div class="carousel-item">
                        <img src="/inguz/public/assets/img/informacion/crs3_quienes.png" class="d-block w-100" alt="quienes-somos-3">
                    </div>
                </div>
            </div><br>
        </div>
    </div>
</div>

<!-- Donde estamos -->
<div class="container text-center">
        <div class="row">
            <div class="col">
                <h4>¿Dónde estamos?</h4>
                <section style="text-align: center;">
                    Nos encontramos en Dominicos Puntanos 823<br> (A media cuadra de la plaza 9 de julio).
                </section><br><br><br>
                <h4>Horarios de atenci&oacuten</h4>
                <section style="text-align: center;">
                   Lunes a Viernes<br>
                   8hs - 12hs <br>
                   15hs - 21hs
                </section><br>
            </div>
            <div class="col">
                 <!-- Incluir el iframe del mapa -->
                 <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1667.7021363394529!2d-66.33973556153828!3d-33.28208509336416!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95d439368661a2fb%3A0x4b2dcc49a588827e!2sDominicos%20Puntanos%20823%2C%20D5700%20IFH%2C%20San%20Luis!5e0!3m2!1ses!2sar!4v1727453659826!5m2!1ses!2sar" width="350" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> 
            </div>
        </div>
    </div> <br>

    <!-- ACTIVIDADES -->
<div class="container text-center">
    <div class="row">
        <div class="col">
            <h4>Actividades</h4>
            <section style="text-align: justify;">
                Ofrecemos clases de pilates en sus modalidades: reformer, HIIT y terapéutico. Cada actividad está diseñada para atender diferentes necesidades, desde mejorar la fuerza y flexibilidad hasta la rehabilitación y el bienestar general. 
                Todos nuestros programas son impartidos por instructores certificados que se enfocan en garantizar una experiencia segura y efectiva para cada participante.
                <p style="text-align: center;">
                    <a href="<?= base_url('/inguz/actividades'); ?>" class="btn btn-primary" style="background-color: #df7718;border: none;">Ver m&aacutes informaci&oacuten</a>
                </p>
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
<!-- HORARIOS TABLA -->
<div class="container text-center">
<h5>Horarios clases:</h5>

<table class="table">
    <thead>
        <tr>
            <th scope="col"></th>
            <th scope="col">Lunes</th>
            <th scope="col">Martes</th>
            <th scope="col">Miércoles</th>
            <th scope="col">Jueves</th>
            <th scope="col">Viernes</th>
        </tr>
    </thead>
    <tbody>
        <?php
        // Definir los horarios y días
        $horas = ['8-9hs', '9-10hs', '10-11hs', '11-12hs', '15-16hs', '16-17hs', '17-18hs', '18-19hs', '19-20hs', '20-21hs'];
        $dias = ['Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes'];

        // Recorrer los horarios
        foreach ($horas as $hora): ?>
            <tr>
                <th scope="row"><?= esc($hora) ?></th>
                <?php foreach ($dias as $dia): ?>
                    <td>
                        <?php
                        // Variable para saber si el horario está ocupado
                        $ocupado = false;
                        $tipoActividad = '';
                        $instructorActividad = '';

                        // Recorrer las actividades para verificar si hay una asignada en este horario y día
                        foreach ($actividades as $actividad) {
                          
                            if ($actividad['Horario'] === $hora && $actividad['Dia'] === $dia) {
                                $ocupado = true;
                                $tipoActividad = $actividad['Tipo'];
                                $instructorActividad = $actividad['Instructor'];
                                break; 
                            }
                        }
                        $instructorSesion = $_SESSION['usuario'];
                        // Si el horario está ocupado, mostrar la actividad
                        if ($ocupado){ ?>
                          <?= esc($tipoActividad) ?>
                          <input type="hidden" name="id_instructor_original" value="<?= esc($instructorActividad) ?>">
                      <?php }else{
                            ?>
                            <?= esc("-") ?>
                            <?php
                      } ?>
                  </td>
                <?php endforeach; ?>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table><br>

</div>
<?php
    echo $this->include('plantilla/footer');
?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>


</body>
</html>