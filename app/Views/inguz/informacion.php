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
            <h4>¿Quiénes somos?</h4>
            <section style="text-align: justify;">
                En INGUZ, nos especializamos en actividades de pilates en tres modalidades: reformer, HIIT y terapéutico. 
                Con seis años de experiencia en el sector, contamos con un equipo de instructores altamente capacitados y un espacio completamente equipado, diseñado para que te sientas cómodo y logres tus objetivos. 
                Ofrecemos una variedad de días y horarios que se adaptan a tus necesidades, garantizando un ambiente exclusivo con solo 7 personas por clase. Esto nos permite ofrecerte atención personalizada y de calidad en cada sesión.
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

<!-- ACTIVIDADES -->
<div class="container text-center">
    <div class="row">
        <div class="col">
            <h4>Actividades</h4>
            <section style="text-align: justify;">
                Ofrecemos clases de pilates en sus modalidades: reformer, HIIT y terapéutico. Cada actividad está diseñada para atender diferentes necesidades, desde mejorar la fuerza y flexibilidad hasta la rehabilitación y el bienestar general. 
                Todos nuestros programas son impartidos por instructores certificados que se enfocan en garantizar una experiencia segura y efectiva para cada participante.
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

<!-- Donde estamos -->
 

<?php
    echo $this->include('plantilla/footer');
?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>