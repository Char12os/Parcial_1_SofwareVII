<?php
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte de Inscriptores - iTECH</title>
    <link rel="stylesheet" href="public/Css/styles.css">
    <style>
        /* Estilos puntuales solo para la tabla del reporte */
        .tabla-reporte { width: 100%; border-collapse: collapse; margin-top: 20px; font-size: 14px; }
        .tabla-reporte th, .tabla-reporte td { border: 1px solid #ccc; padding: 8px; text-align: left; vertical-align: top; }
        .tabla-reporte th { background-color: #222; color: #fff; }
        .tabla-reporte tr:nth-child(even) { background-color: #f7f7f7; }
        .badge { display: inline-block; width: 14px; height: 14px; border-radius: 50%; margin-right: 6px; vertical-align: middle; }
        .badge-verde { background-color: #2e7d32; box-shadow: 0 0 4px #2e7d32; }
        .badge-rojo  { background-color: #c62828; box-shadow: 0 0 4px #c62828; }
        .acciones { margin: 15px 0; }
        .acciones a { margin-right: 12px; }
    </style>
</head>
<body>

<div class="contenedor">
    <h1>Reporte de Inscriptores</h1>

    <div class="acciones">
        <a href="index.php">Volver al formulario</a>
        <a href="index.php?action=exportar">Exportar a Excel</a>
    </div>

    <p>
        <span class="badge badge-verde"></span> Registro íntegro (no ha sido alterado) &nbsp;&nbsp;
        <span class="badge badge-rojo"></span> Registro corrompido o modificado fuera del sistema
    </p>

    <table class="tabla-reporte">
        <tr>
            <th>Integridad</th>
            <th>ID</th>
            <th>Identidad</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Edad</th>
            <th>Sexo</th>
            <th>País de Residencia</th>
            <th>Nacionalidad</th>
            <th>Correo</th>
            <th>Celular</th>
            <th>Temas de Interés</th>
            <th>Observaciones</th>
            <th>Fecha de Registro</th>
        </tr>

        <?php if (empty($inscriptores)): ?>
            <tr><td colspan="14">Todavía no hay inscriptores registrados.</td></tr>
        <?php endif; ?>

        <?php foreach ($inscriptores as $fila): ?>
            <tr>
                <td>
                    <?php if ($fila['integro']): ?>
                        <span class="badge badge-verde" title="Íntegro"></span>
                    <?php else: ?>
                        <span class="badge badge-rojo" title="Corrompido / vulnerado"></span>
                    <?php endif; ?>
                </td>
                <td><?php echo htmlspecialchars($fila['id']); ?></td>
                <td><?php echo htmlspecialchars($fila['identidad']); ?></td>
                <td><?php echo htmlspecialchars($fila['nombre']); ?></td>
                <td><?php echo htmlspecialchars($fila['apellido']); ?></td>
                <td><?php echo htmlspecialchars($fila['edad']); ?></td>
                <td><?php echo htmlspecialchars($fila['sexo']); ?></td>
                <td><?php echo htmlspecialchars($fila['pais_residencia']); ?></td>
                <td><?php echo htmlspecialchars($fila['nacionalidad']); ?></td>
                <td><?php echo htmlspecialchars($fila['correo']); ?></td>
                <td><?php echo htmlspecialchars($fila['celular']); ?></td>
                <td><?php echo htmlspecialchars($fila['temas'] ?? ''); ?></td>
                <td><?php echo htmlspecialchars($fila['observaciones'] ?? ''); ?></td>
                <td><?php echo htmlspecialchars($fila['fecha_registro']); ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>

</body>
</html>