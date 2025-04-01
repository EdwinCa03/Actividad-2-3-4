<?php
include 'conexion.php'; // Conexión a la base de datos
// Verificar si el formulario fue enviado
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['confirmar'])) {
    // Si se confirmó, proceder con el registro en la base de datos
    $nombre = $_POST['nombre'];
    $apellido_paterno = $_POST['apellido_paterno'];
    $apellido_materno = $_POST['apellido_materno'];
    $fecha_nacimiento = $_POST['fecha_nacimiento'];
    $curp = $_POST['curp'];
    $celular = $_POST['celular'];
    $correo = $_POST['correo'];
    $estudios = $_POST['estudios'];

    $query = "INSERT INTO usuarios (nombre, apellido_paterno, apellido_materno, fecha_nacimiento, curp, celular, correo, estudios)
              VALUES ('$nombre', '$apellido_paterno', '$apellido_materno', '$fecha_nacimiento', '$curp', '$celular', '$correo', '$estudios')";

    if (mysqli_query($conn, $query)) {
        header("Location: tabla.php"); // Redirige a la tabla de registros
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
// Si el formulario no ha sido confirmado, mostrar los datos a confirmar
if ($_SERVER["REQUEST_METHOD"] == "POST" && !isset($_POST['confirmar'])) {
    $nombre = $_POST['nombre'];
    $apellido_paterno = $_POST['apellido_paterno'];
    $apellido_materno = $_POST['apellido_materno'];
    $fecha_nacimiento = $_POST['fecha_nacimiento'];
    $curp = $_POST['curp'];
    $celular = $_POST['celular'];
    $correo = $_POST['correo'];
    $estudios = $_POST['estudios'];

    // Mostrar un mensaje de confirmación
    echo "<h3>¿Estás seguro de que deseas registrar los siguientes datos?</h3>";
    echo "<ul>
            <li>Nombre: $nombre</li>
            <li>Apellido Paterno: $apellido_paterno</li>
            <li>Apellido Materno: $apellido_materno</li>
            <li>Fecha de Nacimiento: $fecha_nacimiento</li>
            <li>CURP: $curp</li>
            <li>Celular: $celular</li>
            <li>Correo: $correo</li>
            <li>Estudios: $estudios</li>
          </ul>";

    // Formulario con botones de confirmación
    echo '<form method="POST">
            <input type="hidden" name="nombre" value="' . $nombre . '">
            <input type="hidden" name="apellido_paterno" value="' . $apellido_paterno . '">
            <input type="hidden" name="apellido_materno" value="' . $apellido_materno . '">
            <input type="hidden" name="fecha_nacimiento" value="' . $fecha_nacimiento . '">
            <input type="hidden" name="curp" value="' . $curp . '">
            <input type="hidden" name="celular" value="' . $celular . '">
            <input type="hidden" name="correo" value="' . $correo . '">
            <input type="hidden" name="estudios" value="' . $estudios . '">
            <button type="submit" name="confirmar" value="sí">Confirmar Registro</button>
            <button type="button" onclick="window.history.back();">Cancelar</button>
          </form>';       
}
?>
<head><link rel="stylesheet" href="estilos.css">
</head>


