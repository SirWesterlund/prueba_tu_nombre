<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Modificar Empleado</title>
</head>

<body>
    <div class="container mt-5">
        <h2>Modificar Empleado</h2>

        <?php
        $conexion = mysqli_connect('127.0.0.1', 'root', '', 'asesorinf');

        if (!$conexion) {
            die("Error de conexión: " . mysqli_connect_error());
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST["id_empleado"]) && !empty($_POST["id_empleado"])) {
                $id_empleado = mysqli_real_escape_string($conexion, $_POST["id_empleado"]);
                $nuevo_apellido = mysqli_real_escape_string($conexion, $_POST["nuevo_apellido"]);
                $nuevo_nombre = mysqli_real_escape_string($conexion, $_POST["nuevo_nombre"]);
                $nuevo_dni = mysqli_real_escape_string($conexion, $_POST["nuevo_dni"]);
                $nuevo_departamento = mysqli_real_escape_string($conexion, $_POST["nuevo_departamento"]);
                $nuevo_correo_electronico = mysqli_real_escape_string($conexion, $_POST["nuevo_correo_electronico"]);
                $nuevo_telefono = mysqli_real_escape_string($conexion, $_POST["nuevo_telefono"]);
                $nuevo_puesto = mysqli_real_escape_string($conexion, $_POST["nuevo_puesto"]);

            
                if (!preg_match("/^[0-9]{9}$/", $nuevo_telefono)) {
                    echo "El número de teléfono debe contener 9 dígitos.";
                    exit;
                }

                if (!preg_match("/^[0-9]{8}[A-Za-z]$/", $nuevo_dni)) {
                    echo "El DNI debe contener 8 dígitos seguidos de una letra.";
                    exit;
                }

                $sql = "UPDATE empleados SET apellidos='$nuevo_apellido', nombre='$nuevo_nombre', dni='$nuevo_dni', id_departamento='$nuevo_departamento', correo_electronico='$nuevo_correo_electronico', numero_telefono='$nuevo_telefono', id_puesto='$nuevo_puesto' WHERE id='$id_empleado'";

                if (mysqli_query($conexion, $sql)) {
                    echo "Registro actualizado correctamente";
                } else {
                    echo "Error al actualizar el registro: " . mysqli_error($conexion);
                }
            } else {
                echo "ID de empleado no válido";
            }

            mysqli_close($conexion);
            exit;
        }

        $id_empleado = isset($_GET['id']) ? $_GET['id'] : null;

        if (isset($id_empleado) && !empty($id_empleado)) {
            $consulta = "SELECT * FROM empleados WHERE id = '$id_empleado'";
            $resultado = mysqli_query($conexion, $consulta);

            if ($fila = mysqli_fetch_assoc($resultado)) {
        ?>

                <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <input type="hidden" name="id_empleado" value="<?php echo $fila['id']; ?>">

                    <div class="form-group">
                        <label for="nuevo_nombre">Nuevo Nombre:</label>
                        <input type="text" class="form-control" id="nuevo_nombre" name="nuevo_nombre" value="<?php echo $fila['nombre']; ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="nuevo_apellido">Nuevo Apellido:</label>
                        <input type="text" class="form-control" id="nuevo_apellido" name="nuevo_apellido" value="<?php echo $fila['apellidos']; ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="nuevo_dni">Nuevo DNI:</label>
                        <input type="text" class="form-control" id="nuevo_dni" name="nuevo_dni" value="<?php echo $fila['dni']; ?>" required pattern="[0-9]{8}[A-Za-z]" title="Formato de DNI incorrecto. Debe contener 8 dígitos seguidos de una letra">
                    </div>

                    <div class="form-group">
                        <label for="nuevo_departamento">Nuevo Departamento:</label>
                        <select class="form-control" id="nuevo_departamento" name="nuevo_departamento" required>
                            <?php
                            $query_departamentos = "SELECT id, nombre FROM departamentos";
                            $result_departamentos = mysqli_query($conexion, $query_departamentos);

                            if ($result_departamentos) {
                                while ($row_departamento = mysqli_fetch_assoc($result_departamentos)) {
                                    $selected_departamento = ($fila['id_departamento'] == $row_departamento['id']) ? 'selected' : '';
                                    echo '<option value="' . $row_departamento['id'] . '" ' . $selected_departamento . '>' . $row_departamento['nombre'] . '</option>';
                                }
                            } else {
                                echo '<option value="">Error al obtener departamentos</option>';
                            }
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="nuevo_puesto">Nuevo Puesto:</label>
                        <select class="form-control" id="nuevo_puesto" name="nuevo_puesto" required>
                            <?php
                            $query_puestos = "SELECT id, nombre_puesto FROM puesto_trabajo";
                            $result_puestos = mysqli_query($conexion, $query_puestos);

                            if ($result_puestos) {
                                while ($row_puesto = mysqli_fetch_assoc($result_puestos)) {
                                    $selected_puesto = ($fila['id_puesto'] == $row_puesto['id']) ? 'selected' : '';
                                    echo '<option value="' . $row_puesto['id'] . '" ' . $selected_puesto . '>' . $row_puesto['nombre_puesto'] . '</option>';
                                }
                            } else {
                                echo '<option value="">Error al obtener puestos</option>';
                            }
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="nuevo_correo_electronico">Nuevo Correo Electrónico:</label>
                        <input type="email" class="form-control" id="nuevo_correo_electronico" name="nuevo_correo_electronico" value="<?php echo $fila['correo_electronico']; ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="nuevo_telefono">Nuevo Número de Teléfono:</label>
                        <input type="tel" class="form-control" id="nuevo_telefono" name="nuevo_telefono" value="<?php echo $fila['numero_telefono']; ?>" required pattern="[0-9]{9}" title="El número de teléfono debe tener 9 dígitos">
                    </div>

                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                </form>

        <?php
            } else {
                echo "Empleado no encontrado.";
            }

            mysqli_close($conexion);
        } else {
            echo "ID de empleado no definido o no válido";
        }
        ?>

        <a href="index.php" class="btn btn-secondary mt-3">Volver al Listado</a>

    </div>
</body>

</html>
