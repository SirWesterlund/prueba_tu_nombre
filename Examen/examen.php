<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Calculadora de la liga</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h1>Calculadora de la liga</h1>
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $participantes = [];
    for ($i = 1; $i <= 4; $i++) {
        $nombre = $_POST["nombre$i"];
        $email = $_POST["email$i"];
        $puntuaciones = [
            "partida1" => intval($_POST["partida1_$i"]),
            "partida2" => intval($_POST["partida2_$i"]),
            "partida3" => intval($_POST["partida3_$i"])
        ];

        $participantes[] = [
            "nombre" => $nombre,
            "email" => $email,
            "puntuaciones" => $puntuaciones
        ];
    }

    $errores = [];
    foreach ($participantes as $participante) {

        if (!is_string($participante["nombre"]) && !empty($participante["nombre"])) {
            $errores[] = "No puedes poner numeros, tiene que ser texto para los nombres.";       
        }

        if (empty($participante["nombre"]) || empty($participante["email"])) {
            $errores[] = "Completa todos los campos para cada participante.";
        }

        if (!filter_var($participante["email"], FILTER_VALIDATE_EMAIL)) {
            $errores[] = "El formato del correo electrónico no es válido para uno o más participantes.";
        }

        foreach ($participante["puntuaciones"] as $puntuacion) {
            if (!is_numeric($puntuacion)) {
                $errores[] = "Las puntuaciones deben ser números enteros.";
                break;
            }
        }
    }

    if (!empty($errores)) {
        foreach ($errores as $error) {
            echo "<p>Error: $error</p>";
        }
    } else {
        $puntuacionesTotales = [];
        foreach ($participantes as $participante) {
            $puntuaciones = $participante["puntuaciones"];
            $puntuacionTotal = array_sum($puntuaciones);
            $puntuacionesTotales[] = $puntuacionTotal;
        }

        $ganadorIndice = array_search(max($puntuacionesTotales), $puntuacionesTotales);
        $ganador = $participantes[$ganadorIndice];

        $puntuacionMedia = array_sum($puntuacionesTotales) / count($participantes);

        $partidaConMasPuntos = "";
        $puntosMasAltos = 0;
        foreach ($participantes as $participante) {
            foreach ($participante["puntuaciones"] as $partida => $puntuacion) {
                if ($puntuacion > $puntosMasAltos) {
                    $puntosMasAltos = $puntuacion;
                    $partidaConMasPuntos = $partida;
                }
            }
        }

        echo "<h2>Resultados:</h2>";
        echo "<p>Ganador de la Liga: " . $ganador["nombre"] . "</p>";
        echo "<p>Clasificación de los participantes:</p>";
        echo "<ul>";
        foreach ($participantes as $participante) {
            echo "<li>" . $participante["nombre"] . " - Puntuación total: " . array_sum($participante["puntuaciones"]) . "</li>";
        }
        echo "</ul>";
        echo "<p>Puntuación media de las partidas: " . $puntuacionMedia . "</p>";
        echo "<p>Partida con más puntos: " . $partidaConMasPuntos . " - Puntuación más alta: " . $puntosMasAltos . "</p>";
    }
}
?>

<form method="POST" action="">
    <?php for ($i = 1; $i <= 4; $i++) : ?>
        <h3>Profesor <?php echo $i; ?></h3>
        <label for="nombre<?php echo $i; ?>">Nombre:</label>
        <input type="text" name="nombre<?php echo $i; ?>" required>
        <br>
        <label for="email<?php echo $i; ?>">Correo electrónico:</label>
        <input type="email" name="email<?php echo $i; ?>" required>
        <br>
        <label for="partida1_<?php echo $i; ?>">Puntuación partida 1:</label>
        <input type="number" name="partida1_<?php echo $i; ?>" required>
        <br>
        <label for="partida2_<?php echo $i; ?>">Puntuación partida 2:</label>
        <input type="number" name="partida2_<?php echo $i; ?>" required>
        <br>
        <label for="partida3_<?php echo $i; ?>">Puntuación partida 3:</label>
        <input type="number" name="partida3_<?php echo $i; ?>" required>
        <br><br>
    
    <?php endfor; ?>
    <button type="submit">CALCULAR LIGA</button>
</form>
    </div>
 </body>
</html>



