<!DOCTYPE html>
<html lang="en">
<body>
    <h1>Cadenas de texto</h1>
    <?php
    $nombre = isset($_GET['nombre']) ? trim($_GET['nombre'], '/') : 'Tu Nombre';
    $longitud = strlen($nombre);
    $mayusculas = strtoupper($nombre);
    $minusculas = strtolower($nombre);
    $prefijo = isset($_GET['prefijo']) ? $_GET['prefijo'] : null;
    $comienza_con_prefijo = ($prefijo !== null) ? (strpos($nombre, $prefijo) === 0) : null;
    $conteo_a = substr_count(strtolower($nombre), 'a');
    $posicion_a = stripos($nombre, 'a');
    $nombre_sustituido = str_ireplace('o', '0', $nombre);

    echo "<p>1. Nombre: $nombre</p>";
    echo "<p>2. Longitud del nombre: $longitud caracteres</p>";
    echo "<p>3. Nombre en mayúsculas: $mayusculas</p>";
    echo "<p>4. Nombre en minúsculas: $minusculas</p>";

    if ($comienza_con_prefijo !== null) {
        echo "<p>5. El nombre " . ($comienza_con_prefijo ? "comienza" : "no comienza") . " con el prefijo '$prefijo'</p>";
    }

    echo "<p>6. Cantidad de letras 'a' en el nombre: $conteo_a</p>";

    if ($posicion_a !== false) {
        echo "<p>7. La primera 'a' se encuentra en la posición $posicion_a</p>";
    } else {
        echo "<p>7. No se encontró ninguna letra 'a' en el nombre</p>";
    }

    echo "<p>8. Nombre con letras 'o' sustituidas: $nombre_sustituido</p>";
    ?>
</body>
</html>
