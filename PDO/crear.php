<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Crear Nuevo Empleado</title>
</head>

<body>
    <div class="container mt-5">
        <h2>Crear Nuevo Empleado</h2>
        <form method="POST" action="procesar_crear.php">
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>
            <div class="form-group">
                <label for="apellidos">Apellidos:</label>
                <input type="text" class="form-control" id="apellidos" name="apellidos" required>
            </div>
            <div class="form-group">
                <label for="dni">DNI:</label>
                <input type="text" class="form-control" id="dni" name="dni" pattern="[0-9]{8}[A-Za-z]" title="Formato de DNI incorrecto. Debe contener 8 dígitos seguidos de una letra" required>
            </div>
            <div class="form-group">
                <label for="departamento">Departamento:</label>
                <select class="form-control" id="departamento" name="departamento" required>
                    <?php
                    // Utilizar PDO para obtener departamentos
                    $dsn = "mysql:host=127.0.0.1;dbname=asesorinf";
                    $usuario = "root";
                    $contrasena = "";
                    $opciones = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");

                    try {
                        $conexion = new PDO($dsn, $usuario, $contrasena, $opciones);
                        $query = "SELECT id, nombre FROM departamentos";
                        $stmt = $conexion->query($query);

                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            echo '<option value="' . $row['id'] . '">' . $row['nombre'] . '</option>';
                        }
                    } catch (PDOException $e) {
                        echo 'Error al obtener departamentos: ' . $e->getMessage();
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="puesto">Puesto:</label>
                <select class="form-control" id="puesto" name="puesto" required>
                    <?php
                    // Utilizar PDO para obtener puestos
                    $dsn = "mysql:host=127.0.0.1;dbname=asesorinf";
                    $usuario = "root";
                    $contrasena = "";
                    $opciones = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");

                    try {
                        $conexion = new PDO($dsn, $usuario, $contrasena, $opciones);
                        $query = "SELECT id, nombre_puesto FROM puesto_trabajo";
                        $stmt = $conexion->query($query);

                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            echo '<option value="' . $row['id'] . '">' . $row['nombre_puesto'] . '</option>';
                        }
                    } catch (PDOException $e) {
                        echo 'Error al obtener puestos: ' . $e->getMessage();
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="correo_electronico">Correo Electrónico:</label>
                <input type="email" class="form-control" id="correo_electronico" name="correo_electronico" required>
            </div>
            <div class="form-group">
                <label for="numero_telefono">Número de Teléfono:</label>
                <input type="tel" class="form-control" id="numero_telefono" name="numero_telefono" pattern="[0-9]{9}" title="El número de teléfono debe tener 9 dígitos" required>
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="index.php" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</body>

</html>
