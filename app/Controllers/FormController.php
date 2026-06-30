<?php
require_once __DIR__ . '/../Models/Inscriptor.php';

class FormController
{
    
    public function mostrarFormulario()
    {
        require __DIR__ . '/../View/formulario.php';
    }

    public function guardar()
    {
        $datos = [
            'identidad'        => $_POST['identidad'] ?? '',
            'nombre'           => $_POST['nombre'] ?? '',
            'apellido'         => $_POST['apellido'] ?? '',
            'edad'             => $_POST['edad'] ?? 0,
            'sexo'             => $_POST['sexo'] ?? '',
            'pais_residencia'  => $_POST['pais_residencia'] ?? '',
            'nacionalidad'     => $_POST['nacionalidad'] ?? '',
            'correo'           => $_POST['correo'] ?? '',
            'celular'          => $_POST['celular'] ?? '',
            'observaciones'    => $_POST['observaciones'] ?? '',
            'temas'            => $_POST['temas'] ?? [],
        ];

        try {
            $idInscriptor = Inscriptor::guardar($datos);

            echo "<h2>Inscripción guardada correctamente</h2>";
            echo "<p>ID generado: {$idInscriptor}</p>";
            echo '<p><a href="index.php">Volver al formulario</a> | <a href="index.php?action=reporte">Ver reporte</a></p>';

        } catch (InvalidArgumentException $e) {
            
            echo "<h2>Revisa los datos del formulario</h2>";
            echo "<p>" . htmlspecialchars($e->getMessage()) . "</p>";
            echo '<p><a href="index.php">Volver al formulario</a></p>';

        } catch (PDOException $e) {
            
            echo "<h2>No se pudo guardar la inscripción</h2>";
            echo "<p>" . htmlspecialchars($e->getMessage()) . "</p>";
            echo '<p><a href="index.php">Volver al formulario</a></p>';
        }
    }
}