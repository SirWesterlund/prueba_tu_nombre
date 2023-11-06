<!DOCTYPE html>
<html lang="en">
<head>
    <title>Cadena de carácteres</title>
</head>
<body>
    <h1>Manejo de cadenas</h1>
    <?php
    $cadena = 'uno-dos-tres-cuatro-cinco';
    $elementos = explode('-', $cadena);
    $cantidad_elementos = count($elementos);

    echo "<h2>Ejemplo 2</h2>";
    
    if ($cantidad_elementos > 0) {
        echo '<ul>';
        foreach ($elementos as $elemento) {
            echo '<li>' . $elemento . '</li>';
        }
        echo '</ul>';
    } else {
        echo 'La cadena está vacía.';
    }
    ?>
</body>
</html>