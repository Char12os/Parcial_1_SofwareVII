<?php
?>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
<style>
* { box-sizing: border-box; margin: 0; padding: 0; }

body {
    font-family: 'Inter', Arial, sans-serif;
    background-color: #f2f4f7;
    color: #2b2b2b;
    line-height: 1.5;
    min-height: 100vh;
    display: flex;
    flex-direction: column;
}

/* ── Tarjeta contenedor ── */
.card {
    background: #ffffff;
    border-radius: 10px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.08);
    padding: 32px 40px;
    margin: 36px auto;
    width: 100%;
}

.card-sm  { max-width: 480px; }
.card-md  { max-width: 720px; }
.card-lg  { max-width: 1100px; }

/* ── Tipografía ── */
h1 {
    font-size: 26px;
    font-weight: 700;
    color: #1d4ed8;
    text-align: center;
    margin-bottom: 4px;
}

h2 {
    font-size: 16px;
    font-weight: 600;
    color: #1d4ed8;
    border-bottom: 2px solid #e5e7eb;
    padding-bottom: 6px;
    margin: 28px 0 4px;
}

.subtitulo {
    text-align: center;
    color: #6b7280;
    font-size: 13px;
    margin-bottom: 24px;
}

/* ── Formulario ── */
label {
    display: block;
    margin-top: 14px;
    margin-bottom: 5px;
    font-size: 13px;
    font-weight: 600;
    color: #374151;
}

input[type="text"],
input[type="number"],
input[type="email"],
input[type="tel"],
textarea {
    width: 100%;
    padding: 10px 12px;
    border: 1px solid #d1d5db;
    border-radius: 6px;
    font-size: 14px;
    font-family: 'Inter', Arial, sans-serif;
    background-color: #f9fafb;
    color: #2b2b2b;
    transition: border-color .2s, box-shadow .2s;
}

input:focus, textarea:focus {
    outline: none;
    border-color: #1d4ed8;
    box-shadow: 0 0 0 3px rgba(29,78,216,0.12);
    background-color: #fff;
}

textarea { resize: vertical; }

.grupo-checks {
    display: flex;
    flex-wrap: wrap;
    gap: 8px 18px;
    background: #f9fafb;
    border: 1px solid #e5e7eb;
    border-radius: 6px;
    padding: 12px 14px;
    margin-top: 6px;
}

.grupo-checks label {
    display: flex;
    align-items: center;
    gap: 6px;
    margin: 0;
    font-weight: 400;
    font-size: 13px;
    color: #374151;
    cursor: pointer;
}

.grupo-checks input { accent-color: #1d4ed8; width: auto; }

/* ── Botones ── */
.btn {
    display: inline-block;
    padding: 10px 22px;
    border-radius: 7px;
    font-size: 14px;
    font-weight: 600;
    font-family: 'Inter', Arial, sans-serif;
    text-decoration: none;
    cursor: pointer;
    border: none;
    transition: background-color .2s, transform .1s;
}

.btn:hover { text-decoration: none; transform: translateY(-1px); }

.btn-primario   { background: #1d4ed8; color: #fff; }
.btn-primario:hover { background: #1e40af; }

.btn-secundario { background: #16a34a; color: #fff; }
.btn-secundario:hover { background: #15803d; }

.btn-neutro { background: #e5e7eb; color: #374151; border: 1px solid #d1d5db; }
.btn-neutro:hover { background: #d1d5db; }

.btn-bloque {
    display: block;
    width: 100%;
    margin-top: 24px;
    padding: 12px;
    font-size: 15px;
    text-align: center;
}

.grupo-botones {
    display: flex;
    gap: 12px;
    justify-content: center;
    flex-wrap: wrap;
    margin-top: 24px;
}

/* ── Badge integridad ── */
.badge {
    display: inline-block;
    width: 12px; height: 12px;
    border-radius: 50%;
    flex-shrink: 0;
}

.badge-verde { background: #16a34a; box-shadow: 0 0 5px rgba(22,163,74,.5); }
.badge-rojo  { background: #dc2626; box-shadow: 0 0 5px rgba(220,38,38,.5); }

/* ── Leyenda ── */
.leyenda {
    display: flex;
    gap: 20px;
    flex-wrap: wrap;
    align-items: center;
    background: #f9fafb;
    border: 1px solid #e5e7eb;
    border-radius: 6px;
    padding: 10px 14px;
    font-size: 13px;
    color: #374151;
    margin-bottom: 16px;
}

.leyenda span { display: flex; align-items: center; gap: 7px; }

/* ── Tabla reporte ── */
.tabla-wrap {
    overflow-x: auto;
    border-radius: 8px;
    border: 1px solid #e5e7eb;
}

.tabla-reporte {
    width: 100%;
    border-collapse: collapse;
    font-size: 13px;
    min-width: 900px;
}

.tabla-reporte th {
    background: #1d4ed8;
    color: #fff;
    font-weight: 600;
    padding: 11px 12px;
    text-align: left;
    white-space: nowrap;
}

.tabla-reporte td {
    padding: 9px 12px;
    border-bottom: 1px solid #e5e7eb;
    vertical-align: middle;
    color: #374151;
}

.tabla-reporte tr:last-child td { border-bottom: none; }
.tabla-reporte tr:nth-child(even) td { background: #f9fafb; }
.tabla-reporte tr:hover td { background: #eef2ff; }

.tabla-sin-datos td {
    text-align: center;
    color: #9ca3af;
    padding: 30px;
    font-style: italic;
}

.total-registros {
    text-align: right;
    font-size: 12px;
    color: #6b7280;
    margin-top: 10px;
}

/* ── Header reporte ── */
.reporte-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: 12px;
    margin-bottom: 16px;
}

.reporte-header h1 { font-size: 20px; text-align: left; }

.reporte-acciones { display: flex; gap: 10px; }

/* ── Footer ── */
.site-footer {
    text-align: center;
    padding: 16px 20px;
    color: #9ca3af;
    font-size: 12px;
    border-top: 1px solid #e5e7eb;
    background: #f2f4f7;
    margin-top: auto;
}

/* ── Resultado (éxito / error) ── */
.resultado-wrap {
    flex: 1;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 40px 16px;
}

.resultado-icono { font-size: 52px; line-height: 1; margin-bottom: 14px; }

.resultado-titulo {
    font-size: 22px;
    font-weight: 700;
    margin-bottom: 8px;
}

.resultado-titulo.exito { color: #16a34a; }
.resultado-titulo.error { color: #dc2626; }

.resultado-mensaje { color: #6b7280; font-size: 15px; margin-bottom: 28px; }

/* ── Responsivo ── */
@media (max-width: 600px) {
    .card { margin: 0; border-radius: 0; padding: 20px; }
    .grupo-checks { flex-direction: column; gap: 8px; }
    .reporte-header { flex-direction: column; align-items: flex-start; }
}
</style>