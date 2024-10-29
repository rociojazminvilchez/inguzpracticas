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

  </head>
<body>
<?php
    echo $this->include('plantilla/navbar');
?><br>
<!-- confirmacion.php -->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card" style="width: 100%;">
                <div class="card-body">
                    <h5 class="card-title" style="text-align: center;">FINALIZAR COMPRA</h5>
                    <p class="card-text">Actividad seleccionada: <strong><?= strtoupper(esc($valor['actividad'])) ?></strong></p>
                    <p class="card-text">Cantidad de clases: <strong><?= esc($valor['cantidad']) ?></strong></p>
                    <p class="card-text">Medio de pago: <strong><?= esc($valor['pago']) ?></strong></p>

                    <?php if (isset($valor['pago']) && $valor['pago'] === 'Transferencia'): ?>
                        <strong>Estimado/a cliente,</strong><br>
                        Le informamos que el siguiente enlace lo redirigirá al sitio de Mercado Pago para que pueda abonar su membresía de manera segura y rápida. Agradecemos su preferencia y quedamos a su disposición para cualquier consulta adicional.<br>
                        <a href="https://link.mercadopago.com.ar/inguzpilates" target="_blank" style="text-align: center;">Realizar pago</a><br>
                    <?php endif; ?>
                    <p style="text-align:center;">
                        <a href="<?= base_url('/creditos/update/' . esc($valor['id'])) ?>" class="btn btn-primary" style="background-color: #df7718; border: none;">Modificar</a>
                    </p>

                    
                    <p style="text-align:center;">
                        <a href="<?= base_url('/creditos/guardar') ?>" class="btn btn-primary" style="background-color: #df7718; border: none;">CONFIRMAR COMPRA</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>


<br><br><br><br><br>
 
<?php
    echo $this->include('plantilla/footer');
?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>