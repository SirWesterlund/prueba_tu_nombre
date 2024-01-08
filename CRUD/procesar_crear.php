<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $conexion = mysqli_connect('127.0.0.1', 'root', '', 'asesorinf');

    if (!$conexion) {
        die("Error de conexión: " . mysqli_connect_error());
    }

    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $dni = $_POST['dni'];
    $id_departamento = $_POST['departamento'];  
    $correo_electronico = $_POST['correo_electronico'];
    $numero_telefono = $_POST['numero_telefono'];
    $id_puesto = $_POST['puesto'];

    // Obtener nombre del departamento
    $query_departamento = "SELECT nombre FROM departamentos WHERE id = ?";
    $stmt_departamento = mysqli_prepare($conexion, $query_departamento);
    mysqli_stmt_bind_param($stmt_departamento, 'i', $id_departamento);
    mysqli_stmt_execute($stmt_departamento);
    mysqli_stmt_bind_result($stmt_departamento, $nombre_departamento);
    mysqli_stmt_fetch($stmt_departamento);
    mysqli_stmt_close($stmt_departamento);

    // Obtener nombre del puesto
    $query_puesto = "SELECT nombre_puesto FROM puesto_trabajo WHERE id = ?";
    $stmt_puesto = mysqli_prepare($conexion, $query_puesto);
    mysqli_stmt_bind_param($stmt_puesto, 'i', $id_puesto);
    mysqli_stmt_execute($stmt_puesto);
    mysqli_stmt_bind_result($stmt_puesto, $nombre_puesto);
    mysqli_stmt_fetch($stmt_puesto);
    mysqli_stmt_close($stmt_puesto);

    // Insertar empleado con procedimientos preparados
    $consulta = "INSERT INTO empleados (nombre, apellidos, dni, id_departamento, correo_electronico, numero_telefono, id_puesto, nombre_puesto) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conexion, $consulta);
    mysqli_stmt_bind_param($stmt, 'ssissisi', $nombre, $apellidos, $dni, $id_departamento, $correo_electronico, $numero_telefono, $id_puesto, $nombre_puesto);

    if (mysqli_stmt_execute($stmt)) {
        echo 'Empleado creado correctamente.';
    } else {
        echo 'Error al crear empleado: ' . mysqli_error($conexion);
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conexion);

    header('Location: index.php');
    exit;
}
?>
