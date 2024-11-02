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
    <link rel="stylesheet" href="<?= base_url('assets/css/formularios.css') ?>">
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js"></script>

  </head>
  <style>
    .inline-text, .select-tamano {
  display: inline-block;
  vertical-align: middle; /* Alinea verticalmente ambos elementos */
  }

    .select-tamano {
  width: 200px; /* Ajusta el ancho según tus necesidades */
  height: 60px; /* Ajusta la altura según tus necesidades */
  font-size: 16px; /* Tamaño de la fuente de las opciones */
  margin-left: 50px; /* Espacio entre el texto y el selector */
}
.flex-container {
    display: flex;
    align-items: center; /* Alinea verticalmente al centro */
}

table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
        .checkbox {
            margin: 0;
        }
    </style>
<body>
<?php
    echo $this->include('plantilla/navbar');
?>

<?php   
$mensaje = "";  // Variable para almacenar el mensaje de éxito
$mensajeError = "";  // Variable para almacenar el mensaje de error

if (!session()->has('usuario')) {
    $mensajeError = "Para realizar una reserva, debe iniciar sesión o registrarse.";
} else {
    if (count($membresia) != 0) {
        $mensaje = "Usted posee una membresía activa.";
        // Agregar el mensaje flash si existe
        if (session()->getFlashdata('mensaje')) {
            $mensaje .= "<br>" . session()->getFlashdata('mensaje');
        }
        $mostrar='1';
    } else {
        $mensajeError = "Usted no registra membresías activas.";
        if (session()->getFlashdata('mensaje')) {
            $mensajeError .= "<br>" . session()->getFlashdata('mensaje');
        }
    }
}
?>

<div style="text-align: left;">
    <?php if (!empty($mensaje)): ?>
        <div class="alert alert-success">
            <h6><?= $mensaje ?></h6>
        </div>
    <?php endif; ?>

    <?php if (!empty($mensajeError)): ?>
        <div class="alert alert-danger">
            <h6><?= $mensajeError ?></h6>
        </div>
    <?php endif; ?>
    
    <?php if (!session()->has('usuario')): ?>
      <div style="text-align: center;">
        <a href="<?= base_url('/formularios/ingreso'); ?>" class="btn btn-primary btn-lg" style="background-color: #df7718; border: none;">Iniciar sesión</a><br><br>
        <a href="<?= base_url('/formularios/registro'); ?>" class="btn btn-primary btn-lg" style="background-color: #df7718; border: none;">Registrarse</a>
    </div>
      <?php endif; ?>
</div>

<?php
   if($mostrar==='1'){
    ?>

<div style="display: flex; align-items: center;">
    <label for="actividades">Actividad - Pilates:</label>
    <select id="actividades" name="act" class="select-actividades">
        <?php if (!empty($actividades2)) : ?>
            <?php foreach ($actividades2 as $actividad) : ?>
                <option value="<?php echo htmlspecialchars($actividad['actividad']); ?>">
                    <?php echo htmlspecialchars(strtoupper($actividad['actividad'])); ?>
                </option>
            <?php endforeach; ?>
        <?php else : ?>
            <option value="">NO HAY ACTIVIDADES DISPONIBLES</option>
        <?php endif; ?>
    </select>
</div><br>


<?php
setlocale(LC_TIME, 'es_ES.UTF-8'); // Configura el idioma a español

// Definir los días de la semana en español
$diasSemana = ['Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes'];

// Obtener las fechas de lunes a viernes de la semana actual
$inicioSemana = strtotime('monday this week');
$fechasSemana = [];
for ($i = 0; $i < 5; $i++) {
    $fecha = strtotime("+$i day", $inicioSemana);
    $fechasSemana[] = [
        'fecha' => date('Y-m-d', $fecha),
        'dia' => ucfirst(strftime('%A', $fecha))
    ];
}
?>

<!-- Vista del calendario -->
<?php
setlocale(LC_TIME, 'es_ES.UTF-8'); // Configura el idioma a español

// Definir los días de la semana en español
$diasSemana = ['Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes'];

// Obtener las fechas de lunes a viernes de la semana actual
$inicioSemana = strtotime('monday this week');
$fechasSemana = [];
for ($i = 0; $i < 5; $i++) {
    $fecha = strtotime("+$i day", $inicioSemana);
    $fechasSemana[] = [
        'fecha' => date('Y-m-d', $fecha),
        'dia' => ucfirst(strftime('%A', $fecha))
    ];
}


?>

<?php
setlocale(LC_TIME, 'es_ES.UTF-8'); // Configura el idioma a español

// Array de traducción de días en inglés a español
function traducirDia($diaEnIngles) {
    $traducciones = [
        'Monday' => 'Lunes',
        'Tuesday' => 'Martes',
        'Wednesday' => 'Miércoles',
        'Thursday' => 'Jueves',
        'Friday' => 'Viernes',
    ];
    return $traducciones[$diaEnIngles] ?? $diaEnIngles;
}

// Obtener las fechas de lunes a viernes de la semana actual
$inicioSemana = strtotime('monday this week');
$fechasSemana = [];
for ($i = 0; $i < 5; $i++) {
    $fecha = strtotime("+$i day", $inicioSemana);
    $fechasSemana[] = [
        'fecha' => date('Y-m-d', $fecha),
        'dia' => traducirDia(strftime('%A', $fecha)) // Traduce el día al español
    ];
}
?>

<!-- Vista del calendario -->
<form action="tu_ruta_de_procesamiento" method="post"> <!-- Ajusta la ruta de procesamiento -->
    <table border="1"> <!-- Añadido borde para ver mejor la tabla -->
        <thead>
            <tr>
                <th>Hora</th>
                <?php foreach ($fechasSemana as $fechaInfo): ?>
                    <th><?php echo $fechaInfo['dia'] . " " . date('d-m-Y', strtotime($fechaInfo['fecha'])); ?></th>
                <?php endforeach; ?>
            </tr>
        </thead>
        <tbody>
            <?php 
            //$horas = ['8-9hs', '9-10hs', '10-11hs', '11-12hs', '15-16hs', '16-17hs', '17-18hs', '18-19hs', '19-20hs', '20-21hs'];
            foreach ($horas as $hora) {
                echo "<tr><td>{$hora}</td>";
                foreach ($fechasSemana as $fechaInfo) {
                    $actividadEncontrada = false;
                    foreach ($actividades as $actividad) {
                        // Verifica que el día y la hora coincidan y que haya cupo
                        if ($actividad['Dia'] == $fechaInfo['dia'] && $actividad['Horario'] == $hora && $actividad['Cupo'] > 0) {
                            $actividadEncontrada = true;
                            echo "<td>
                                    <label>
                                        <input class='checkbox' type='checkbox' name='seleccionar[]' value='" . htmlspecialchars($actividad['Tipo']) . "'>
                                        " . htmlspecialchars($actividad['Tipo']) . "
                                    </label>
                                  </td>";
                            break;
                        }
                    }
                    if (!$actividadEncontrada) {
                        echo "<td>-</td>"; // Espacio vacío si no hay actividad o no hay cupo
                    }
                }
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
    <button type="submit">Enviar Selección</button>
</form>



</body>

<?php
   }
?>
<?php
   echo $this->include('plantilla/footer');
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>