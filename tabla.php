<?php
include 'conexion.php';

$query = "SELECT * FROM usuarios ORDER BY apellido_paterno ASC";
$resultado = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios Registrados</title>
    <link rel="stylesheet" href="estilos.css">
    <style>
        body {
            background: linear-gradient(to right, #a18cd1, #fbc2eb);
            font-family: Arial, sans-serif;
        }

        .contenedor {
            max-width: 90%;
            margin: 40px auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
            text-align: center;
        }

        .tabla-contenedor {
            overflow-x: auto;
            margin-top: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            border-radius: 10px;
            overflow: hidden;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: center;
            word-wrap: break-word;
        }

        th {
            background-color:rgb(105, 102, 255);
            color: white;
        }

        tr:nth-child(even) {
            background-color:rgb(249, 249, 249);
        }

        .btn {
            background-color:rgb(51, 248, 255);
            color: white;
            padding: 8px 12px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            font-size: 14px;
        }

        .btn:hover {
            background-color:rgba(248, 21, 21, 0.64);
        }
    </style>
</head>
<body>

    <div class="contenedor">
        <h2>Usuarios Registrados</h2>

        <div class="tabla-contenedor">
            <table>
                <thead>
                    <tr>
                        <th>Apellido Paterno</th>
                        <th>Apellido Materno</th>
                        <th>Nombre</th>
                        <th>Fecha de Nacimiento</th>
                        <th>CURP</th>
                        <th>Celular</th>
                        <th>Correo</th>
                        <th>Estudios</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($fila = mysqli_fetch_assoc($resultado)) { ?>
                        <tr>
                            <td><?= htmlspecialchars($fila['apellido_paterno']) ?></td>
                            <td><?= htmlspecialchars($fila['apellido_materno']) ?></td>
                            <td><?= htmlspecialchars($fila['nombre']) ?></td>
                            <td><?= htmlspecialchars($fila['fecha_nacimiento']) ?></td>
                            <td><?= htmlspecialchars($fila['curp']) ?></td>
                            <td><?= htmlspecialchars($fila['celular']) ?></td>
                            <td><?= htmlspecialchars($fila['correo']) ?></td>
                            <td><?= htmlspecialchars($fila['estudios']) ?></td>
                            <td>
                                <a href="editar.php?id=<?= $fila['id'] ?>" class="btn">Editar</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

        <br>
        <a href="index.php"><button class="btn">Volver al Registro</button></a>
    </div>

</body>
</html>
