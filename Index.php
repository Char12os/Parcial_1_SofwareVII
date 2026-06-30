<?php

require __DIR__ . '/app/Controllers/FormController.php';
require __DIR__ . '/app/Controllers/ReporteController.php';

$accion = $_GET['action'] ?? 'index';

switch ($accion) {
    case 'guardar':
        (new FormController())->guardar();
        break;

    case 'reporte':
        (new ReporteController())->mostrarReporte();
        break;

    case 'exportar':
        (new ReporteController())->exportarExcel();
        break;

    case 'index':
    default:
        (new FormController())->mostrarFormulario();
        break;
}