<!DOCTYPE html>
<html lang="en">
<head>
    <title>Mensaje de Bienvenida</title>
</head>
<body>
    <h1>Mensaje de Bienvenida</h1>
    <?php
 
    $hora_actual = date('G');

   
    if ($hora_actual >= 8 && $hora_actual < 14) {
        $mensaje = 'Buenos días';
    } elseif ($hora_actual >= 14 && $hora_actual < 21) {
        $mensaje = 'Buenas tardes';
    } else {
        $mensaje = 'Buenas noches';
    }

    echo "<p>$mensaje</p>";
    ?>
</body>
</html>
