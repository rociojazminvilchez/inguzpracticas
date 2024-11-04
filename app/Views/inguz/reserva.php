<?php
use App\Models\ReservaModel;
?>
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
    html, body {
    height: 100%; /* Asegúrate de que el body ocupe el 100% de la altura de la ventana */
    margin: 0; /* Elimina el margen por defecto */
}

body {
    display: flex;
    flex-direction: column; /* Coloca los elementos en una columna */
}

.main-content {
    flex: 1; /* Permite que el contenido principal ocupe el espacio restante */
    padding: 20px; /* Espaciado alrededor del contenido */
}

footer {
    background-color: #f2f2f2; /* Color de fondo del footer */
    text-align: center; /* Centrar el texto del footer */
    padding: 10px; /* Espaciado interno del footer */
    position: relative; /* Posición relativa para evitar que cubra el contenido */
}

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
    margin: 20px 0;
    font-family: Arial, sans-serif;
}

th, td {
    border: 1px solid #ddd;
    padding: 12px;
    text-align: center;
    transition: background-color 0.3s;
}

th {
    background-color: #f2f2f2;
    color: #333;
    font-weight: bold;
}

td {
    background-color: #fff;
}

td:hover {
    background-color: #f9f9f9;
}

.checkbox {
    margin: 0;
}

/* Estilo para botones, si los necesitas */
input[type="submit"] {
    background-color: #df7718; /* Color del botón */
    color: white; /* Color del texto */
    padding: 10px 20px; /* Espaciado interno */
    border: none; /* Sin borde */
    border-radius: 5px; /* Bordes redondeados */
    cursor: pointer; /* Cambia el cursor al pasar el mouse */
    font-size: 16px; /* Tamaño de fuente */
}

input[type="submit"]:hover {
    background-color: #c75d15; /* Color más oscuro al hacer hover */
}

</style>
<body>
<?php
    echo $this->include('plantilla/navbar');
?>

<?php   
$mensaje = "";  // Variable para almacenar el mensaje de éxito
$mensajeError = "";  // Variable para almacenar el mensaje de error
$mostrar = "";

if (!session()->has('usuario')) {
    $mensajeError = "Para realizar una reserva, debe iniciar sesión o registrarse.";
} else {
    if (count($membresia) != 0) {
        $mensaje = "Solo puede reservar una actividad POR DIA";
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
        $mostrar='2';
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

<?php 
$actividades_pagadas = [];
$informacion_actividades = [];
$informacion_membresias = [];
$id_membresia="";

// Obtener actividades pagadas y sus horarios
foreach ($actividades as $act) {
    foreach ($membresia as $mebre) {
        $id_membresia = $mebre['id'];
        if ($act['Tipo'] === $mebre['actividad']) {
            $actividades_pagadas[] = $mebre['actividad'];
            $informacion_actividades[] = [
                'id' => $act['id'],
                'tipo' => $act['Tipo'],
                'dia' => $act['Dia'],
                'horario' => $act['Horario'],
                'hora_inicio' => $act['hora_inicio'],
                'hora_fin' => $act['hora_fin'],
                'cupo' => $act['Cupo'], 
                'instructor' => $act['Instructor'] 
            ];
        }
    }
}

$actividades_pagadas = array_unique($actividades_pagadas);

// Crear un array con los horarios únicos
$horarios_array = [];
foreach ($informacion_actividades as $info) {
    $horarios_array[$info['horario']] = true; // Usamos un array asociativo para obtener solo los horarios únicos
}

// Ordenar los horarios
$horarios_array = array_keys($horarios_array);
usort($horarios_array, function($a, $b) {
    list($a_inicio) = explode('-', $a);
    list($b_inicio) = explode('-', $b);
    return $a_inicio <=> $b_inicio; // Ordenar de menor a mayor
});

// Supongamos que tienes acceso al modelo de reserva
$reservaModel = new ReservaModel();
?>

<div style="display: flex; align-items: center;">
    <h4><label for="actividades" style="padding-left: 40px;">Actividad - Pilates:</label></h4>
    <select id="actividades" name="act" class="select-actividades">
        <?php foreach ($actividades_pagadas as $actividad) : ?>
            <option value="<?php echo htmlspecialchars($actividad); ?>">
                <?php echo htmlspecialchars(strtoupper($actividad)); ?>
            </option>
        <?php endforeach; ?>
    </select>
</div><br>

<?php
setlocale(LC_TIME, 'es_ES.UTF-8', 'Spanish_Spain.1252');

$diasBD = [
    'Monday' => 'Lunes',
    'Tuesday' => 'Martes',
    'Wednesday' => 'Miércoles',
    'Thursday' => 'Jueves',
    'Friday' => 'Viernes',
    'Saturday' => 'Sábado',
    'Sunday' => 'Domingo'
];

// Fecha de hoy
$hoy = strtotime(date('Y-m-d'));
$fechasSemana = [];

// Si hoy es sábado o domingo, establecer el lunes de la próxima semana, de lo contrario, establecer el lunes de la misma semana.
if (date('N') >= 6) { 
    $inicioSemana = strtotime('next monday');
} else {
    $inicioSemana = strtotime('last monday', strtotime('tomorrow'));
}

// Calcular las fechas de lunes a viernes de la semana correspondiente
for ($i = 0; $i < 5; $i++) {
    $fecha = strtotime("+$i day", $inicioSemana);
    $nombreDiaIngles = date('l', $fecha); 
    $nombreDiaEspanol = $diasBD[$nombreDiaIngles]; 

    $fechasSemana[] = [
        'fecha' => date('Y-m-d', $fecha),
        'dia' => $nombreDiaEspanol
    ];
}
?>

<!-- Mensaje de fin de semana -->
<?php if (date('N') >= 6): ?>
    <div style="background-color: #ffdddd; padding: 10px; border: 1px solid #ff0000; text-align: center;">
        <strong>Nota:</strong> Las reservas solo están disponibles a partir del próximo lunes (<?php echo date('d-m-Y', strtotime('next monday')); ?>).
    </div>
<?php else: ?>
    <form action="<?= base_url('reserva/create'); ?>" method="post">
        <table>
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
                foreach ($horarios_array as $hora) {
                    echo "<tr><td>{$hora}</td>";
                    foreach ($fechasSemana as $fechaInfo) {
                        $actividadEncontrada = false;
                        foreach ($informacion_actividades as $info) {
                            // Contar reservas existentes para esta combinación
                            $cantidadReservas = $reservaModel->where('fecha', $fechaInfo['fecha'])
                                                              ->where('horario', $hora)
                                                              ->where('actividad', htmlspecialchars($info['tipo']))
                                                              ->countAllResults(); // Contar el número de reservas

                            // Verifica que el día y la hora coincidan, que haya cupo y que no haya alcanzado el límite de reservas
                            if ($info['dia'] == $fechaInfo['dia'] && $info['horario'] == $hora && $info['cupo'] > 0 && $cantidadReservas < 7) {
                                $actividadEncontrada = true;
                                echo "<input type='hidden' name='membresia' value='" . htmlspecialchars($id_membresia) . "'>";
                                echo "<td>
                                        <label>
                                            <input class='checkbox' type='radio' name='seleccionar[{$fechaInfo['fecha']}_{$hora}]' value='" . htmlspecialchars($info['tipo']) . "'>
                                            Disponible". "
                                        </label>
                                      </td>";
                                // Campos ocultos deben estar fuera del ciclo anidado
                                echo "<input type='hidden' name='instructor' value='" . htmlspecialchars($info['instructor']) . "'>";
                                echo "<input type='hidden' name='hora_inicio' value='" . htmlspecialchars($info['hora_inicio']) . "'>";
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
        <p style="text-align: center;">
            <button type="submit" class="btn btn-primary" style="background-color: #df7718; border: none;">RESERVAR</button>
        </p>
    </form>
<?php endif; ?>









<?php
   }
?>
<?php
   echo $this->include('plantilla/footer');
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>