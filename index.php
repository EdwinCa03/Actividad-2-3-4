<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuario</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>

    <div class="fondo">
        <!-- Nubes -->
        <div class="nube"></div>
        <div class="nube"></div>
        <div class="nube"></div>

        <!-- Estrellas -->
        <div class="estrella"></div>
        <div class="estrella"></div>
        <div class="estrella"></div>
        <div class="estrella"></div>
    </div>

    <div class="contenedor">
        <h2>Registro de Usuario</h2>
        <form action="guardar.php" method="POST">
            <label>Nombre:</label>
            <input type="text" name="nombre">

            <label>Apellido Paterno:</label>
            <input type="text" name="apellido_paterno" required>

            <label>Apellido Materno:</label>
            <input type="text" name="apellido_materno" required>

            <label>Fecha de Nacimiento:</label>
            <input type="date" name="fecha_nacimiento" required>

            <label>CURP:</label>
            <input type="text" name="curp" required pattern="[A-Z0-9]{18}" title="Debe tener 18 caracteres en mayúsculas y números">

            <label>Número de Celular:</label>
            <input type="tel" name="celular" required pattern="[0-9]{10}" title="Debe contener 10 dígitos numéricos">

            <label>Correo Electrónico:</label>
            <input type="email" name="correo" required>

            <label>Estudios:</label>
            <select name="estudios" required>
                <option value="Primaria">Primaria</option>
                <option value="Secundaria">Secundaria</option>
                <option value="Preparatoria">Preparatoria</option>
                <option value="Universidad">Universidad</option>
                <option value="Posgrado">Posgrado</option>
            </select>

            <button type="submit">Registrar</button>
        </form>
        <button type="button" onclick="window.location.href='tabla.php'">Usuarios Registrados</button>
    </div>

</body>
</html>

