<?php
$anioActual = date('Y');
$fechaActual = date('d/m/Y');
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Inscripción - iTECH</title>
    <link rel="stylesheet" href="public/Css/styles.css">
</head>
<body>

<div class="contenedor">

    <h1>Formulario de Inscripción</h1>
    <p class="fecha">Fecha: <?php echo $fechaActual; ?></p>

    <form action="index.php?action=guardar" method="POST">

        <h2>Datos Personales</h2>

        <label for="identidad">Identidad (Documento de Identificación)</label>
        <input type="text" id="identidad" name="identidad" required>

        <label for="nombre">Nombre</label>
        <input type="text" id="nombre" name="nombre" required>

        <label for="apellido">Apellido</label>
        <input type="text" id="apellido" name="apellido" required>

        <label for="edad">Edad</label>
        <input type="number" id="edad" name="edad" min="1" max="120" required>

        <label>Sexo</label>
        <div class="opciones-radio">
            <label><input type="radio" name="sexo" value="Femenino" required> Femenino</label>
            <label><input type="radio" name="sexo" value="Masculino"> Masculino</label>
            <label><input type="radio" name="sexo" value="Otro"> Otro</label>
        </div>

        <label for="pais_residencia">País de Residencia</label>
        <input type="text" id="pais_residencia" name="pais_residencia" required>

        <label for="nacionalidad">Nacionalidad</label>
        <input type="text" id="nacionalidad" name="nacionalidad" required>

        <h2>Información de Contacto</h2>

        <label for="correo">Correo</label>
        <input type="email" id="correo" name="correo" required>

        <label for="celular">Celular</label>
        <input type="tel" id="celular" name="celular" required>

        <h2>Intereses</h2>

        <label>Tema tecnológico que le gustaría aprender</label>
        <div class="opciones-checkbox">
            <label><input type="checkbox" name="temas[]" value="Cloud Computing"> Cloud Computing</label>
            <label><input type="checkbox" name="temas[]" value="Big Data"> Big Data</label>
            <label><input type="checkbox" name="temas[]" value="Desarrollo Movil"> Desarrollo Móvil</label>
            <label><input type="checkbox" name="temas[]" value="Ciberseguridad"> Ciberseguridad</label>
            <label><input type="checkbox" name="temas[]" value="IoT"> IoT (Internet de las Cosas)</label>
            <label><input type="checkbox" name="temas[]" value="Machine Learning"> Machine Learning</label>
            <label><input type="checkbox" name="temas[]" value="DevOps"> DevOps</label>
            <label><input type="checkbox" name="temas[]" value="Python"> Python</label>
        </div>

        <label for="observaciones">Observaciones o consulta sobre el evento</label>
        <textarea id="observaciones" name="observaciones" rows="4"></textarea>

        <button type="submit">Enviar</button>

    </form>

</div>

<footer>
    <p>&copy; <?php echo $anioActual; ?> iTECH. All rights reserved.</p>
</footer>

</body>
</html>