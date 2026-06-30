<?php
$anioActual = date('Y');
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <title>iTECH | Resultado</title>
    <?php require __DIR__ . '/partials/_head.php'; ?>
</head>
<body>

<div class="resultado-wrap">
    <div class="card card-sm" style="text-align:center;">

        <?php if ($tipo === 'exito'): ?>
            <p class="resultado-titulo exito">Inscripción guardada</p>
        <?php else: ?>
            <p class="resultado-titulo error">No se pudo guardar</p>
        <?php endif; ?>

        <p class="resultado-mensaje"><?php echo htmlspecialchars($mensaje); ?></p>

        <div class="grupo-botones">
            <a class="btn btn-primario" href="index.php">← Volver al formulario</a>
            <?php if ($tipo === 'exito'): ?>
                <a class="btn btn-secundario" href="index.php?action=reporte">Ver reporte →</a>
            <?php endif; ?>
        </div>

    </div>
</div>

<footer class="site-footer">
    &copy; <?php echo $anioActual; ?> iTECH. All rights reserved. | Contacto: info@itech.com
</footer>

</body>
</html>