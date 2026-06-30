<?php

require_once __DIR__ . '/../Models/Inscriptor.php';

class ReporteController
{
    public function mostrarReporte()
    {
        $inscriptores = Inscriptor::obtenerTodos();
        require __DIR__ . '/../View/reporte.php';
    }

    public function exportarExcel()
    {
        $inscriptores = Inscriptor::obtenerTodos();

        $nombreArchivo = 'reporte_inscriptores_' . date('Y-m-d_His') . '.xls';

        header('Content-Type: application/vnd.ms-excel; charset=UTF-8');
        header('Content-Disposition: attachment; filename="' . $nombreArchivo . '"');
        
        echo "\xEF\xBB\xBF";

        echo '<table border="1">';
        echo '<tr>
                <th>ID</th><th>Identidad</th><th>Nombre</th><th>Apellido</th><th>Edad</th>
                <th>Sexo</th><th>País de Residencia</th><th>Nacionalidad</th><th>Correo</th>
                <th>Celular</th><th>Temas de Interés</th><th>Observaciones</th>
                <th>Integridad</th><th>Fecha de Registro</th>
              </tr>';

        foreach ($inscriptores as $fila) {
            $integridad = $fila['integro'] ? 'Válido' : 'Alterado';
            echo '<tr>';
            echo '<td>' . htmlspecialchars($fila['id']) . '</td>';
            echo '<td>' . htmlspecialchars($fila['identidad']) . '</td>';
            echo '<td>' . htmlspecialchars($fila['nombre']) . '</td>';
            echo '<td>' . htmlspecialchars($fila['apellido']) . '</td>';
            echo '<td>' . htmlspecialchars($fila['edad']) . '</td>';
            echo '<td>' . htmlspecialchars($fila['sexo']) . '</td>';
            echo '<td>' . htmlspecialchars($fila['pais_residencia']) . '</td>';
            echo '<td>' . htmlspecialchars($fila['nacionalidad']) . '</td>';
            echo '<td>' . htmlspecialchars($fila['correo']) . '</td>';
            echo '<td>' . htmlspecialchars($fila['celular']) . '</td>';
            echo '<td>' . htmlspecialchars($fila['temas'] ?? '') . '</td>';
            echo '<td>' . htmlspecialchars($fila['observaciones'] ?? '') . '</td>';
            echo '<td>' . $integridad . '</td>';
            echo '<td>' . htmlspecialchars($fila['fecha_registro']) . '</td>';
            echo '</tr>';
        }

        echo '</table>';
    }
}