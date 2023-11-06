<!DOCTYPE html>
<html>
<head>
    <title>Operaciones con Arrays</title>
</head>
<body>
    <h1>Operaciones con Arrays</h1>

    <?php
    $nombres = ['Juan', 'María', 'Carlos', 'Ana', 'Pedro'];

    $num_elementos = count($nombres);
    echo "<p>2. Número de elementos en el array: $num_elementos</p>";

    $cadena_nombres = implode(' ', $nombres);
    echo "<p>3. Nombres de los alumnos: $cadena_nombres</p>";

    asort($nombres);
    echo "<p>4. Array ordenado alfabéticamente:</p>";
    print_r($nombres);

    $reversed = array_reverse($nombres);
    echo "<p>5. Array en orden inverso:</p>";
    print_r($reversed);

    $mi_nombre = 'Juan';
    $posicion = array_search($mi_nombre, $nombres);
    echo "<p>6. Mi nombre '$mi_nombre' se encuentra en la posición $posicion</p>";

    $alumnos = [
        ['id' => 1, 'nombre' => 'Juan', 'edad' => 25],
        ['id' => 2, 'nombre' => 'María', 'edad' => 30],
        ['id' => 3, 'nombre' => 'Carlos', 'edad' => 28],
    ];

    echo "<p>8. Tabla de datos de los alumnos:</p>";
    echo "<table border='1'>";
    echo "<tr><th>ID</th><th>Nombre</th><th>Edad</th></tr>";
    foreach ($alumnos as $alumno) {
        echo "<tr><td>{$alumno['id']}</td><td>{$alumno['nombre']}</td><td>{$alumno['edad']}</td></tr>";
    }
    echo "</table>";

    $numeros = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
    $suma = array_sum($numeros);
    echo "<p>9. La suma de los 10 números es: $suma</p>";
    ?>
</body>
</html>
