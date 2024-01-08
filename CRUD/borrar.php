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
        $conexion = mysqli_connect('127.0.0.1', 'root', '', 'asesorinf');

        if (!$conexion) {
            die("Error de conexión: " . mysqli_connect_error());
        }

        if (isset($_GET['id'])) {
            $id_empleado = $_GET['id'];

            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['confirmar_borrado'])) {
                $consulta = "DELETE FROM empleados WHERE id = $id_empleado";

                if (mysqli_query($conexion, $consulta)) {
                    echo "Empleado eliminado correctamente.";
                } else {
                    echo "Error al eliminar el empleado: " . mysqli_error($conexion);
                }

                mysqli_close($conexion);
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
