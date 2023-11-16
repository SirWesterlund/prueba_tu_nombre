<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Calificación Final</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Calificación Final</h1>
        <?php
        $name = $email = $dni = '';
        $practicas = array();
        $examenes = array();
        $result = '';

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $dni = $_POST['dni'];

            if (!empty($name) && filter_var($email, FILTER_VALIDATE_EMAIL) && preg_match("/^[0-9]{8}[A-Za-z]$/", $dni)) {
                for ($i = 1; $i <= 4; $i++) {
                    $practicas["Practica$i"] = min(10, floatval($_POST["practica$i"]));
                }
                for ($i = 1; $i <= 2; $i++) {
                    $examenes["Examen$i"] = min(10, floatval($_POST["examen$i"]));
                }

                $calificacion_practicas = array_sum($practicas) / 4;
                $calificacion_examenes = array_sum($examenes) / 2;
                $calificacion_final = 0.4 * $calificacion_practicas + 0.6 * $calificacion_examenes;

                $result = "<p>Nombre del Alumno: $name</p>";
                $result .= "<p>Correo Electrónico: $email</p>";
                $result .= "<p>DNI: $dni</p>";
                $result .= "<p>Calificación Final: $calificacion_final</p>";
            } else {
                echo '<div class="alert alert-danger">Por favor, introduce datos válidos.</div>';
            }
        }
        ?>
        <form method="post">
            <div class="form-group">
                <label for="name">Nombre del Alumno:</label>
                <input type="text" class="form-control" id="name" name="name" required value="<?php echo $name; ?>">
            </div>
            <div class="form-group">
                <label for="email">Correo Electrónico:</label>
                <input type="email" class="form-control" id="email" name="email" required value="<?php echo $email; ?>">
            </div>
            <div class="form-group">
                <label for="dni">DNI:</label>
                <input type="text" class="form-control" id="dni" name="dni" required value="<?php echo $dni; ?>">
            </div>
            <h2>Notas de Prácticas</h2>
            <?php
            for ($i = 1; $i <= 4; $i++) {
                echo "<div class='form-group'>
                        <label for='practica$i'>Práctica $i:</label>
                        <input type='number' step='0.01' class='form-control' id='practica$i' name='practica$i' required max='10' value='{$practicas["Practica$i"]}'>
                    </div>";
            }
            ?>
            <h2>Notas de Exámenes</h2>
            <?php
            for ($i = 1; $i <= 2; $i++) {
                echo "<div class='form-group'>
                        <label for='examen$i'>Examen $i:</label>
                        <input type='number' step='0.01' class='form-control' id='examen$i' name='examen$i' required max='10' value='{$examenes["Examen$i"]}'>
                    </div>";
            }
            ?>
            <button type="submit" class="btn btn-primary">Calcular Calificación Final</button>
        </form>
        <?php
        if (!empty($result)) {
            echo "<div class='mt-4'>$result</div>";
        }
        ?>
    </div>
</body>
</html>
