<?php
// app/Controllers/FormController.php

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
            'identidad'       => $_POST['identidad']       ?? '',
            'nombre'          => $_POST['nombre']          ?? '',
            'apellido'        => $_POST['apellido']        ?? '',
            'edad'            => $_POST['edad']            ?? 0,
            'sexo'            => $_POST['sexo']            ?? '',
            'pais_residencia' => $_POST['pais_residencia'] ?? '',
            'nacionalidad'    => $_POST['nacionalidad']    ?? '',
            'correo'          => $_POST['correo']          ?? '',
            'celular'         => $_POST['celular']         ?? '',
            'observaciones'   => $_POST['observaciones']   ?? '',
            'temas'           => $_POST['temas']           ?? [],
        ];

        try {
            $idInscriptor = Inscriptor::guardar($datos);

            $tipo    = 'exito';
            $titulo  = 'Inscripción guardada correctamente';
            $mensaje = "Tu registro fue guardado con el ID #{$idInscriptor}.";

        } catch (InvalidArgumentException $e) {
            $tipo    = 'error';
            $titulo  = 'Revisa los datos del formulario';
            $mensaje = $e->getMessage();

        } catch (PDOException $e) {
            $tipo    = 'error';
            $titulo  = 'No se pudo guardar la inscripción';
            $mensaje = self::traducirErrorMysql($e->getMessage());
        }

        require __DIR__ . '/../View/resultado.php';
    }

    /**
     * Convierte mensajes técnicos de MySQL en texto legible para el usuario.
     */
    private static function traducirErrorMysql(string $error): string
    {
        if (str_contains($error, 'uq_inscriptores_identidad')) {
            return 'Este número de identidad ya está registrado.';
        }
        if (str_contains($error, 'uq_inscriptores_correo')) {
            return 'Este correo electrónico ya está registrado.';
        }
        if (str_contains($error, 'uq_inscriptores_celular')) {
            return 'Este número de celular ya está registrado.';
        }
        // Si no reconocemos el error, mostramos algo genérico (nunca el error técnico)
        return 'Ocurrió un problema al guardar. Por favor intenta de nuevo.';
    }
}