<?php

class Sanitizador
{
    public static function texto(string $valor): string
    {
        $valor = trim($valor);
        $valor = preg_replace('/\s+/', ' ', $valor);
        return $valor;
    }

    public static function tituloCase(string $valor): string
    {
        $valor = self::texto($valor);
        return mb_convert_case(mb_strtolower($valor, 'UTF-8'), MB_CASE_TITLE, 'UTF-8');
    }

    public static function correo(string $valor): string
    {
        return mb_strtolower(trim($valor), 'UTF-8');
    }

    public static function telefono(string $valor): string
    {
        $valor = trim($valor);
        return preg_replace('/[^0-9+\-\s]/', '', $valor);
    }

    public static function entero($valor): int
    {
        return (int) $valor;
    }

    public static function sanitizarInscriptor(array $datos): array
    {
        return [
            'identidad'        => self::texto($datos['identidad'] ?? ''),
            'nombre'           => self::tituloCase($datos['nombre'] ?? ''),
            'apellido'         => self::tituloCase($datos['apellido'] ?? ''),
            'edad'             => self::entero($datos['edad'] ?? 0),
            'sexo'             => self::texto($datos['sexo'] ?? ''),
            'pais_residencia'  => self::tituloCase($datos['pais_residencia'] ?? ''),
            'nacionalidad'     => self::tituloCase($datos['nacionalidad'] ?? ''),
            'correo'           => self::correo($datos['correo'] ?? ''),
            'celular'          => self::telefono($datos['celular'] ?? ''),
            'observaciones'    => self::texto($datos['observaciones'] ?? ''),
            'temas'            => $datos['temas'] ?? [],
        ];
    }
}