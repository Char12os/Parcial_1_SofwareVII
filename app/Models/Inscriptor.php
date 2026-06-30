<?php

require_once __DIR__ . '/Conexion.php';
require_once __DIR__ . '/Sanitizador.php';
require_once __DIR__ . '/Validador.php';
require_once __DIR__ . '/Firma.php';

class Inscriptor
{
    public static function obtenerOcrearPaisId(string $nombrePais): int
    {
        $pais = Conexion::consultarUno(
            "SELECT id FROM paises WHERE nombre = :nombre",
            ['nombre' => $nombrePais]
        );

        if ($pais) {
            return (int) $pais['id'];
        }

        return Conexion::insertar(
            "INSERT INTO paises (nombre) VALUES (:nombre)",
            ['nombre' => $nombrePais]
        );
    }

    public static function obtenerAreaId(string $nombreArea): ?int
    {
        $area = Conexion::consultarUno(
            "SELECT id FROM areas_interes WHERE nombre = :nombre",
            ['nombre' => $nombreArea]
        );

        return $area ? (int) $area['id'] : null;
    }

    public static function guardar(array $datosCrudos): int
    {
        $datos = Sanitizador::sanitizarInscriptor($datosCrudos);

        $errores = Validador::validarInscriptor($datos);
        if (!empty($errores)) {
            throw new InvalidArgumentException(implode(' ', $errores));
        }

        $idPaisResidencia = self::obtenerOcrearPaisId($datos['pais_residencia']);
        $idNacionalidad   = self::obtenerOcrearPaisId($datos['nacionalidad']);

        $firma = Firma::firmar($datos);

        $idInscriptor = Conexion::insertar(
            "INSERT INTO inscriptores
                (identidad, nombre, apellido, edad, sexo, pais_residencia_id, nacionalidad_id, correo, celular, observaciones, firma)
             VALUES
                (:identidad, :nombre, :apellido, :edad, :sexo, :pais_residencia_id, :nacionalidad_id, :correo, :celular, :observaciones, :firma)",
            [
                'identidad'          => $datos['identidad'],
                'nombre'             => $datos['nombre'],
                'apellido'           => $datos['apellido'],
                'edad'               => $datos['edad'],
                'sexo'               => $datos['sexo'],
                'pais_residencia_id' => $idPaisResidencia,
                'nacionalidad_id'    => $idNacionalidad,
                'correo'             => $datos['correo'],
                'celular'            => $datos['celular'],
                'observaciones'      => $datos['observaciones'] ?? null,
                'firma'              => $firma,
            ]
        );

        foreach ($datos['temas'] ?? [] as $nombreTema) {
            $idArea = self::obtenerAreaId($nombreTema);
            if ($idArea !== null) {
                Conexion::ejecutar(
                    "INSERT IGNORE INTO inscriptor_temas (inscriptor_id, area_interes_id)
                     VALUES (:inscriptor_id, :area_id)",
                    ['inscriptor_id' => $idInscriptor, 'area_id' => $idArea]
                );
            }
        }

        return $idInscriptor;
    }

    public static function obtenerTodos(): array
    {
        $filas = Conexion::consultarTodos(
            "SELECT
                i.id, i.identidad, i.nombre, i.apellido, i.edad, i.sexo,
                pr.nombre AS pais_residencia,
                na.nombre AS nacionalidad,
                i.correo, i.celular, i.observaciones, i.firma, i.fecha_registro,
                GROUP_CONCAT(at.nombre ORDER BY at.nombre SEPARATOR ', ') AS temas
             FROM inscriptores i
             INNER JOIN paises pr ON pr.id = i.pais_residencia_id
             INNER JOIN paises na ON na.id = i.nacionalidad_id
             LEFT JOIN inscriptor_temas it ON it.inscriptor_id = i.id
             LEFT JOIN areas_interes at ON at.id = it.area_interes_id
             GROUP BY i.id
             ORDER BY i.id DESC"
        );

        foreach ($filas as &$fila) {
            $fila['integro'] = Firma::esIntegro($fila, $fila['firma']);
        }

        return $filas;
    }
}