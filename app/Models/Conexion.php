<?php

class Conexion
{
    private static $host    = '127.0.0.1';
    private static $bd      = 'parcial_itech';
    private static $usuario = 'root';
    private static $clave   = '';        
    private static $charset = 'utf8mb4';

    private static $instancia = null;

    private function __construct()
    {
    }

    public static function getConexion(): PDO
    {
        if (self::$instancia === null) {
            try {
                $dsn = "mysql:host=" . self::$host . ";dbname=" . self::$bd . ";charset=" . self::$charset;

                $opciones = [
                    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::ATTR_EMULATE_PREPARES   => false,
                ];

                self::$instancia = new PDO($dsn, self::$usuario, self::$clave, $opciones);
            } catch (PDOException $e) {
                die('Error de conexión a la base de datos: ' . $e->getMessage());
            }
        }

        return self::$instancia;
    }

    public static function ejecutar(string $sql, array $parametros = []): int
    {
        $stmt = self::getConexion()->prepare($sql);
        $stmt->execute($parametros);
        return $stmt->rowCount();
    }

    public static function insertar(string $sql, array $parametros = []): int
    {
        $conexion = self::getConexion();
        $stmt = $conexion->prepare($sql);
        $stmt->execute($parametros);
        return (int) $conexion->lastInsertId();
    }

    public static function consultarTodos(string $sql, array $parametros = []): array
    {
        $stmt = self::getConexion()->prepare($sql);
        $stmt->execute($parametros);
        return $stmt->fetchAll();
    }

    public static function consultarUno(string $sql, array $parametros = [])
    {
        $stmt = self::getConexion()->prepare($sql);
        $stmt->execute($parametros);
        $fila = $stmt->fetch();
        return $fila ?: null;
    }
}