<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>CRUD Empleados</title>
</head>

<body>
    <div class="container mt-5">
        <h2>Listado de Empleados (MySQLI Procedural)</h2>
        <a href="crear.php" class="btn btn-primary mb-3">Crear Nuevo Empleado</a>

        <?php
        $conexion = mysqli_connect('127.0.0.1', 'root', '', 'asesorinf');

        if (!$conexion) {
            die("Error de conexión: " . mysqli_connect_error());
        }

        $consulta = "SELECT empleados.id, empleados.nombre, empleados.apellidos, empleados.dni, empleados.correo_electronico, empleados.numero_telefono, puesto_trabajo.nombre_puesto, departamentos.nombre AS nombre_departamento
                    FROM empleados
                    INNER JOIN puesto_trabajo ON empleados.id_puesto = puesto_trabajo.id
                    INNER JOIN departamentos ON empleados.id_departamento = departamentos.id";

        $resultados = mysqli_query($conexion, $consulta);

        if (mysqli_num_rows($resultados) > 0) {
            echo '<table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Apellidos</th>
                            <th>DNI</th>
                            <th>Correo Electrónico</th>
                            <th>Teléfono</th>
                            <th>Puesto</th>
                            <th>Departamento</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>';

            while ($fila = mysqli_fetch_assoc($resultados)) {
                echo '<tr>
                        <td>' . $fila['id'] . '</td>
                        <td>' . $fila['nombre'] . '</td>
                        <td>' . $fila['apellidos'] . '</td>
                        <td>' . $fila['dni'] . '</td>
                        <td>' . $fila['correo_electronico'] . '</td>
                        <td>' . $fila['numero_telefono'] . '</td>
                        <td>' . $fila['nombre_puesto'] . '</td>
                        <td>' . $fila['nombre_departamento'] . '</td>
                        <td>
                            <a href="editar.php?id=' . $fila['id'] . '" class="btn btn-warning btn-sm">Editar</a>
                            <a href="borrar.php?id=' . $fila['id'] . '" class="btn btn-danger btn-sm">Borrar</a>
                        </td>
                    </tr>';
            }

            echo '</tbody></table>';
        } else {
            echo '<p>No hay empleados registrados.</p>';
        }

        mysqli_close($conexion);
        ?>

    </div>
</body>

</html>
