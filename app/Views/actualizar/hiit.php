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
  <strong>Atención:</strong> En este panel SOLO puede modificar los días | horarios de las clases que administra.
</div>
<div class="card text-center">
<div class="card-header">
    <ul class="nav nav-tabs card-header-tabs">
    
      <li class="nav-item">
        <a class="nav-link active" aria-current="true" href=<?= base_url('/actualizar/actualizar_reformer'); ?>>Pilates Reformer</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" aria-current="true" href="<?= base_url('/actualizar/hiit'); ?>"> <label style="color:red; font-weight: bold;">*  Pilates HIIT</label></a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" aria-current="true" href="<?= base_url('/actualizar/terapeutico'); ?>" >Pilates Terap&eacuteutico</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" aria-current="true" href="<?= base_url('/actualizar/informacion'); ?>"> Informaci&oacuten</label></a>
      </li>
    </ul>
  </div><br>
<div class="container">
    <h3 style="text-align: center; color: red;"> Pilates HIIT</h3>
    
    <form action="<?= base_url('/actualizar/hiit') ?>" method="post">
  <!-- Descripción -->
        <div class="mb-3">
        <h5 style= "text-align: left;">Descripci&oacuten:</h5>
        <?php foreach ($pilates as $pila): 
        if (!empty($pila['Descripcion'])) {
            ?>
            <textarea class="form-control" id="descripcion" name="descripcion" rows="6"><?= esc($pila['Descripcion']) ?></textarea>
        <?php
        }
    endforeach; ?>
        </div>

<!-- Horarios -->
<h5 style= "text-align: left;">Horarios:</h5>
<div class="card-body">
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
                      $tipoActividadPanel ='HIIT';

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
                      if ($ocupado): ?>
                        <select name="horarios[<?= esc($hora) ?>][<?= esc($dia) ?>]" class="form-select">
                            <option value="<?= esc($tipoActividad) ?>"><?= esc($tipoActividad) ?></option>
                            <?php
                            if ($instructorSesion === $instructorActividad && $tipoActividadPanel=== $tipoActividad): ?>
                                <option value="-">-</option>
                            <?php endif; ?>
                        </select>
                        <input type="hidden" name="id_instructor_original" value="<?= $_SESSION['usuario'] ?>">
                    <?php else: ?>
                        <select name="horarios[<?= esc($hora) ?>][<?= esc($dia) ?>]" class="form-select">
                            <option value="">-</option>
                            <option value="HIIT">HIIT</option>
                        </select>
                    <?php endif; ?>
                </td>
              <?php endforeach; ?>
          </tr>
      <?php endforeach; ?>
  </tbody>
</table><br>
</div><br>
<h5 style= "text-align: left;">Precios:</h5>
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
        <td style="text-align: center;"> <?= esc($pila['Clases']) ?></td> 
        <td><input type="number" name="precios[]" value="<?= esc($pila['Precio']) ?>" class="form-control" /></td> 
        <input type="hidden" name="id_precios[]" value="<?= esc($pila['id']) ?>"> 
      </tr>
    <?php 
      endforeach; ?> 
  </tbody>
</table><br>
         <p style="text-align: center;">
        <button type="submit" class="btn btn-primary" style="background-color: #df7718; border: none;">GUARDAR CAMBIOS</button>
    </p>
    </form>
</div>

<?php
    echo $this->include('plantilla/footer');
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>