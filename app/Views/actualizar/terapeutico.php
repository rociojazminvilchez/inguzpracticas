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
<!-- form_edit_reformer.php -->
<div class="card text-center">
<div class="card-header">
    <ul class="nav nav-tabs card-header-tabs">
    
      <li class="nav-item">
        <a class="nav-link active" aria-current="true" href=<?= base_url('/actualizar/actualizar_reformer'); ?>>Actualizar Reformer</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" aria-current="true" href="<?= base_url('/actualizar/hiit'); ?>">Actualizar Hiit</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" aria-current="true" href="<?= base_url('/actualizar/terapeutico'); ?>" >Actualizar Terap&eacuteutico</a>
      </li>
    </ul>
  </div><br>
<div class="container">
    <h3 style="text-align: center; color: red;">Actualizar -> Pilates Terap&eacuteutico</h3>
    
    <form action="<?= base_url('admin/updateReformer') ?>" method="post">
        <!-- Descripción -->
        <div class="mb-3">
        <h5>Descripci&oacuten:</h5>
            <?php foreach ($actividades as $actividad): 
             if(!empty($actividad['Descripcion'])){
             ?>
              <textarea class="form-control" id="descripcion" name="descripcion" rows="4"><?= esc($actividad['Descripcion']) ?></textarea>
            <?php
            }
            ?>
      <?php endforeach; ?>
        </div>

        <!-- Horarios -->
        <h5>Horarios:</h5>
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
        
        foreach ($horas as $hora): ?>
            <tr>
                <th scope="row"><?= esc($hora) ?></th>
                <?php foreach ($dias as $dia): ?>
                    <td>
                    <select name="horarios[<?= $hora ?>][<?= $dia ?>]" class="form-select">
                                <option value="">-</option> 
                                <option value="Reformer" <?php
                                    
                                    foreach ($actividades as $actividad) {
                                        if ($actividad['Horario'] === $hora && $actividad['Dia'] === $dia && $actividad['Tipo'] === 'Terapeutico') {
                                            echo 'selected'; 
                                        }
                                    }
                                ?>>Terapeutico</option>
                            </select>
                        </td>
                <?php endforeach; ?>
            </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
</div><br>
<h5>Precios:</h5>
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
        <td>  <input type="text" name="clases[<?= $pila['id'] ?>]" value="<?= esc($pila['Clases']) ?>" class="form-control" /></td> 
        <td><input type="text" name="precios[<?= $pila['id'] ?>]" value="<?= esc($pila['Precio']) ?>" class="form-control" /></td> 
      </tr>
    <?php endforeach; ?>
  </tbody>
</table><br>
       
        <!-- Botón para enviar el formulario -->
         <p style="text-align: center;">
        <button type="submit" class="btn btn-primary" style="background-color: #df7718; border: none;">GUARDAR CAMBIOS</button>
    </p>
    </form>
</div>
    </div>
<?php
    echo $this->include('plantilla/footer');
?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>