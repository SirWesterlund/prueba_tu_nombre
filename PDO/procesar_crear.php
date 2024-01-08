<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Utilizar PDO para crear un nuevo empleado
    $dsn = "mysql:host=127.0.0.1;dbname=asesorinf";
    $usuario = "root";
    $contrasena = "";
    $opciones = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");

    try {
        $conexion = new PDO($dsn, $usuario, $contrasena, $opciones);

        $nombre = $_POST['nombre'];
        $apellidos = $_POST['apellidos'];
        $dni = $_POST['dni'];
        $id_departamento = $_POST['departamento'];
        $correo_electronico = $_POST['correo_electronico'];
        $numero_telefono = $_POST['numero_telefono'];
        $id_puesto = $_POST['puesto'];

        $query_departamento = "SELECT nombre FROM departamentos WHERE id = :id_departamento";
        $stmt_departamento = $conexion->prepare($query_departamento);
        $stmt_departamento->bindParam(':id_departamento', $id_departamento, PDO::PARAM_INT);
        $stmt_departamento->execute();
        $nombre_departamento = $stmt_departamento->fetchColumn();
        $stmt_departamento = null;

        $query_puesto = "SELECT nombre_puesto FROM puesto_trabajo WHERE id = :id_puesto";
        $stmt_puesto = $conexion->prepare($query_puesto);
        $stmt_puesto->bindParam(':id_puesto', $id_puesto, PDO::PARAM_INT);
        $stmt_puesto->execute();
        $nombre_puesto = $stmt_puesto->fetchColumn();
        $stmt_puesto = null;

        $consulta = "INSERT INTO empleados (nombre, apellidos, dni, id_departamento, correo_electronico, numero_telefono, nombre_departamento, id_puesto, nombre_puesto) VALUES (:nombre, :apellidos, :dni, :id_departamento, :correo_electronico, :numero_telefono, :nombre_departamento, :id_puesto, :nombre_puesto)";
        $stmt = $conexion->prepare($consulta);
        $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
        $stmt->bindParam(':apellidos', $apellidos, PDO::PARAM_STR);
        $stmt->bindParam(':dni', $dni, PDO::PARAM_STR);
        $stmt->bindParam(':id_departamento', $id_departamento, PDO::PARAM_INT);
        $stmt->bindParam(':correo_electronico', $correo_electronico, PDO::PARAM_STR);
        $stmt->bindParam(':numero_telefono', $numero_telefono, PDO::PARAM_STR);
        $stmt->bindParam(':nombre_departamento', $nombre_departamento, PDO::PARAM_STR);
        $stmt->bindParam(':id_puesto', $id_puesto, PDO::PARAM_INT);
        $stmt->bindParam(':nombre_puesto', $nombre_puesto, PDO::PARAM_STR);

        if ($stmt->execute()) {
            echo 'Empleado creado correctamente.';
        } else {
            echo 'Error al crear empleado.';
        }
    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage();
    }

    $stmt = null;
    $conexion = null;

    header('Location: index.php');
    exit;
}
?>
