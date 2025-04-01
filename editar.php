<?php
include 'conexion.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM usuarios WHERE id = $id";
    $resultado = mysqli_query($conn, $query);
    $usuario = mysqli_fetch_assoc($resultado);
}

if (isset($_POST['actualizar'])) {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $apellido_paterno = $_POST['apellido_paterno'];
    $apellido_materno = $_POST['apellido_materno'];
    $fecha_nacimiento = $_POST['fecha_nacimiento'];
    $curp = $_POST['curp'];
    $celular = $_POST['celular'];
    $correo = $_POST['correo'];
    $estudios = $_POST['estudios'];

    $query = "UPDATE usuarios SET nombre='$nombre', apellido_paterno='$apellido_paterno', 
              apellido_materno='$apellido_materno', fecha_nacimiento='$fecha_nacimiento',
              curp='$curp', celular='$celular', correo='$correo', estudios='$estudios' 
              WHERE id=$id";

    mysqli_query($conn, $query);
    echo "<script>
            alert('Usuario actualizado correctamente.');
            window.location.href='tabla.php';
          </script>";
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Usuario</title>
    <link rel="stylesheet" href="estilos.css">
    <script>
        function confirmarActualizacion() {
            return confirm("¿Estás de acuerdo en modificar los datos?");
        }
    </script>
</head>
<body>

    <div class="contenedor">
        <h2>Editar Usuario</h2>
        <form method="POST" onsubmit="return confirmarActualizacion();">
            <input type="hidden" name="id" value="<?= $usuario['id'] ?>">

            <label>Apellido Paterno:</label>
            <input type="text" name="apellido_paterno" value="<?= $usuario['apellido_paterno'] ?>" required>

            <label>Apellido Materno:</label>
            <input type="text" name="apellido_materno" value="<?= $usuario['apellido_materno'] ?>" required>

            <label>Nombre:</label>
            <input type="text" name="nombre" value="<?= $usuario['nombre'] ?>" required>

            <label>Fecha de Nacimiento:</label>
            <input type="date" name="fecha_nacimiento" value="<?= $usuario['fecha_nacimiento'] ?>" required>

            <label>CURP:</label>
            <input type="text" name="curp" value="<?= $usuario['curp'] ?>" required>

            <label>Número de Celular:</label>
            <input type="tel" name="celular" value="<?= $usuario['celular'] ?>" required>

            <label>Correo Electrónico:</label>
            <input type="email" name="correo" value="<?= $usuario['correo'] ?>" required>

            <label>Estudios:</label>
            <select name="estudios" required>
                <option value="Primaria" <?= $usuario['estudios'] == 'Primaria' ? 'selected' : '' ?>>Primaria</option>
                <option value="Secundaria" <?= $usuario['estudios'] == 'Secundaria' ? 'selected' : '' ?>>Secundaria</option>
                <option value="Preparatoria" <?= $usuario['estudios'] == 'Preparatoria' ? 'selected' : '' ?>>Preparatoria</option>
                <option value="Universidad" <?= $usuario['estudios'] == 'Universidad' ? 'selected' : '' ?>>Universidad</option>
                <option value="Posgrado" <?= $usuario['estudios'] == 'Posgrado' ? 'selected' : '' ?>>Posgrado</option>
            </select>

            <button type="submit" name="actualizar">Actualizar Usuario</button>
        </form>
    </div>

</body>
</html>
