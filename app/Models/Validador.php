<?php

class Validador
{
    public static function identidad(string $valor): bool
    {
        return $valor !== '' && strlen($valor) <= 30;
    }

    public static function nombre(string $valor): bool
    {
        
        return $valor !== '' && preg_match('/^[\p{L}\s]+$/u', $valor) === 1;
    }

    public static function edad(int $valor): bool
    {
        return $valor >= 1 && $valor <= 120;
    }

    public static function sexo(string $valor): bool
    {
        return in_array($valor, ['Masculino', 'Femenino', 'Otro'], true);
    }

    public static function correo(string $valor): bool
    {
        return filter_var($valor, FILTER_VALIDATE_EMAIL) !== false;
    }

    public static function celular(string $valor): bool
    {
        
        return (bool) preg_match('/^[0-9+\-\s]{7,20}$/', $valor);
    }

    public static function paisOTexto(string $valor): bool
    {
        return $valor !== '';
    }

    public static function validarInscriptor(array $datos): array
    {
        $errores = [];

        if (!self::identidad($datos['identidad'] ?? '')) {
            $errores[] = 'La identidad es obligatoria y debe tener máximo 30 caracteres.';
        }
        if (!self::nombre($datos['nombre'] ?? '')) {
            $errores[] = 'El nombre es obligatorio y solo debe contener letras.';
        }
        if (!self::nombre($datos['apellido'] ?? '')) {
            $errores[] = 'El apellido es obligatorio y solo debe contener letras.';
        }
        if (!self::edad((int) ($datos['edad'] ?? 0))) {
            $errores[] = 'La edad debe estar entre 1 y 120 años.';
        }
        if (!self::sexo($datos['sexo'] ?? '')) {
            $errores[] = 'Debe seleccionar un sexo válido.';
        }
        if (!self::paisOTexto($datos['pais_residencia'] ?? '')) {
            $errores[] = 'El país de residencia es obligatorio.';
        }
        if (!self::paisOTexto($datos['nacionalidad'] ?? '')) {
            $errores[] = 'La nacionalidad es obligatoria.';
        }
        if (!self::correo($datos['correo'] ?? '')) {
            $errores[] = 'El correo no tiene un formato válido.';
        }
        if (!self::celular($datos['celular'] ?? '')) {
            $errores[] = 'El celular no tiene un formato válido.';
        }

        return $errores;
    }
}