<!DOCTYPE html>
<html>
<head>
    <title>Datos de Gente</title>
</head>
<body>
<?php
// Datos de la base de datos
$usuario = "AdminDavid";
$password = "AdminDavid1234!";
$servidor = "127.0.0.1";
$basededatos = "david";

// Creación de la conexión a la base de datos
$conexion = mysqli_connect($servidor, $usuario, $password, $basededatos) or die("No se ha podido conectar al servidor de Base de datos");

// Consulta SQL para seleccionar todos los registros de la tabla "alumnos"
$consulta = "SELECT * FROM datos";
$resultado = mysqli_query($conexion, $consulta) or die("Algo ha ido mal en la consulta");

// Mostrar el resultado en una tabla HTML
echo "<table border='3'>";
echo "<tr>";
echo "<th>ID</th>";
echo "<th>Nombre</th>";
echo "<th>Edad</th>";
echo "</tr>";

while ($columna = mysqli_fetch_array($resultado)) {
    echo "<tr>";
    echo "<td>" .$columna['id'] . "</td><td>" . $columna['nombre'] . "</td><td>" . $columna['edad'] . "</td>";
    echo "</tr>";
}

echo "</table>"; // Fin de la tabla

// Cerrar conexión de base de datos
mysqli_close($conexion);
?>
</body>
</html>

