<?php
// app/View/reporte.php
$anioActual = date('Y');
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <title>iTECH | Reporte de Inscriptores</title>
    <?php require __DIR__ . '/partials/_head.php'; ?>
</head>
<body>

<div class="card card-lg">

    <div class="reporte-header">
        <h1>Reporte de Inscriptores</h1>
        <div class="reporte-acciones">
            <a class="btn btn-neutro" href="index.php">← Volver al formulario</a>
            <a class="btn btn-secundario" href="index.php?action=exportar">⬇ Exportar a Excel</a>
        </div>
    </div>

    <div class="leyenda">
        <span><span class="badge badge-verde"></span> Registro íntegro (no ha sido alterado)</span>
        <span><span class="badge badge-rojo"></span> Registro corrompido o modificado fuera del sistema</span>
    </div>

    <div class="tabla-wrap">
        <table class="tabla-reporte">
            <thead>
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
            </thead>
            <tbody>
                <?php if (empty($inscriptores)): ?>
                    <tr class="tabla-sin-datos"><td colspan="14">Todavía no hay inscriptores registrados.</td></tr>
                <?php else: ?>
                    <?php foreach ($inscriptores as $fila): ?>
                        <tr>
                            <td style="text-align:center;">
                                <?php if ($fila['integro']): ?>
                                    <span class="badge badge-verde" title="Íntegro"></span>
                                <?php else: ?>
                                    <span class="badge badge-rojo" title="Corrompido"></span>
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
                            <td><?php echo htmlspecialchars($fila['temas'] ?? '—'); ?></td>
                            <td><?php echo htmlspecialchars($fila['observaciones'] ?? '—'); ?></td>
                            <td style="white-space:nowrap;"><?php echo htmlspecialchars($fila['fecha_registro']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <?php if (!empty($inscriptores)): ?>
        <p class="total-registros">Total de registros: <strong><?php echo count($inscriptores); ?></strong></p>
    <?php endif; ?>

</div>

<footer class="site-footer">
    &copy; <?php echo $anioActual; ?> iTECH. All rights reserved. | Contacto: info@itech.com
</footer>

</body>
</html>