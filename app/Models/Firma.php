<?php

class Firma
{
    private const LLAVE_SECRETA = 'CAMBIA-ESTA-LLAVE-PARCIAL-ITECH-2025';

    private static function construirCadena(array $datos): string
    {
        return implode('|', [
            $datos['identidad'] ?? '',
            $datos['nombre'] ?? '',
            $datos['apellido'] ?? '',
            $datos['correo'] ?? '',
            $datos['celular'] ?? '',
            $datos['sexo'] ?? '',
        ]);
    }

    public static function firmar(array $datos): string
    {
        $cadena = self::construirCadena($datos);
        return hash_hmac('sha256', $cadena, self::LLAVE_SECRETA);
    }

    public static function esIntegro(array $datos, ?string $firmaGuardada): bool
    {
        if (empty($firmaGuardada)) {
            return false;
        }
        $firmaCalculada = self::firmar($datos);
        return hash_equals($firmaCalculada, $firmaGuardada);
    }
}