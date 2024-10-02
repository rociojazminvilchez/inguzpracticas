<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://unpkg.com/ionicons@5.5.2/dist/ionicons.min.css">
  <link rel="stylesheet" href="<?= base_url('assets/css/plantilla.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/actividades.css') ?>">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"> </script>
  <title>
    INGUZ
  </title>
  <style>
        /* Asegúrate de que el cuerpo ocupe toda la altura de la ventana */
        html, body {
            height: 100%;
            margin: 0;
        }

        /* Configurar el contenedor principal como flex */
        body {
            display: flex;
            flex-direction: column;
        }

        /* El contenido crecerá para llenar el espacio */
        .content {
            flex-grow: 1;
        }

        /* El footer siempre estará al final */
        footer {
            background-color: #f1f1f1;
            text-align: center;
            padding: 10px;
        }
    </style>
</head>
<?php
    echo $this->include('plantilla/navbar');
?>

</body>
</html>