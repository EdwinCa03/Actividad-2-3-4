<?php
$servidor = "localhost";
$usuario = "root";
$password = "";
$base_datos = "registro_db";

// Conexión a MySQL con mysqli (mejor que mysql_)
$conn = mysqli_connect($servidor, $usuario, $password, $base_datos);

// Verificar conexión
if (!$conn) {
    die("❌ Error de conexión: " . mysqli_connect_error());
}
?>
