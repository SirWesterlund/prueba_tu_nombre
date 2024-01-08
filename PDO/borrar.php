<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Eliminar Empleado</title>
</head>

<body>
    <div class="container mt-5">
        <?php
        if (isset($_GET['id'])) {
            $id_empleado = $_GET['id'];

            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['confirmar_borrado'])) {
                // Utilizar PDO para eliminar el empleado
                $dsn = "mysql:host=127.0.0.1;dbname=asesorinf";
                $usuario = "root";
                $contrasena = "";
                $opciones = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");

                try {
                    $conexion = new PDO($dsn, $usuario, $contrasena, $opciones);
                    $consulta = "DELETE FROM empleados WHERE id = :id_empleado";
                    $stmt = $conexion->prepare($consulta);
                    $stmt->bindParam(':id_empleado', $id_empleado, PDO::PARAM_INT);

                    if ($stmt->execute()) {
                        echo "Empleado eliminado correctamente.";
                    } else {
                        echo "Error al eliminar el empleado.";
                    }
                } catch (PDOException $e) {
                    echo 'Error: ' . $e->getMessage();
                }

                $conexion = null;
            } else {
                // Mostrar mensaje de confirmación
                echo '<h2>¿Estás seguro de eliminar este empleado?</h2>';
                echo '<form method="post">
                        <button type="submit" name="confirmar_borrado" class="btn btn-danger">Sí, estoy seguro</button>
                        <a href="index.php" class="btn btn-secondary">No, cancelar</a>
                      </form>';
            }
        } else {
            echo "ID de empleado no proporcionado.";
        }
        ?>
    </div>

    <script>
        // JavaScript para mostrar mensaje de confirmación
        document.addEventListener('DOMContentLoaded', function () {
            document.querySelector('form').addEventListener('submit', function (e) {
                if (!confirm('¿Estás seguro de eliminar este empleado?')) {
                    e.preventDefault(); // Cancela el envío del formulario si el usuario hace clic en "No"
                }
            });
        });
    </script>
</body>

</html>
