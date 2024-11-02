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
        <?php if (!empty($actividades)) : ?>
            <?php foreach ($actividades as $actividad) : ?>
                <option value="<?php echo htmlspecialchars($actividad['actividad']); ?>">
                    <?php echo htmlspecialchars(strtoupper($actividad['actividad'])); ?>
                </option>
            <?php endforeach; ?>
        <?php else : ?>
            <option value="">NO HAY ACTIVIDADES DISPONIBLES</option>
        <?php endif; ?>
    </select>
</div><br>



          <div id="calendar"></div>
          <script>
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');

        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'timeGridWeek', // Vista semanal con horas
            selectable: true,            // Habilitar selección de eventos
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'timeGridWeek,timeGridDay'
            },
            events: '/obtener_eventos.php', // Ruta para cargar eventos desde tu base de datos
            select: function(info) {
                // Acción al seleccionar un horario en el calendario
                let confirmar = confirm(`¿Reservar el horario desde ${info.startStr} hasta ${info.endStr}?`);
                if (confirmar) {
                    // Aquí podrías hacer una petición AJAX para guardar la reserva
                    fetch('/reservar.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify({
                            start: info.startStr,
                            end: info.endStr
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            alert('Reserva confirmada');
                            calendar.refetchEvents(); // Recargar eventos
                        } else {
                            alert('Error en la reserva');
                        }
                    });
                }
            }
        });

        calendar.render();
    });
</script>

<?php
   }
?>
<?php
   echo $this->include('plantilla/footer');
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>