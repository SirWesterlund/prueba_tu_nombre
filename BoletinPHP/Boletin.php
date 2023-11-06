<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boletín PHP</title>
</head>
<body>

<?php

$link_url = "./Seccion 1-3.php";
$link_text = "Visitar Seccion 1-3.php";


echo "<h1>Boletín Ejercicios PHP</h1>";


echo "<br><br><h2>Sección 1: Variables, expresiones y estructuras de control</h2><br><br>";

echo "<b>1. Crear una página que muestre una tabla de conversión de euros a pesetas
como la que aparece en la figura 1. La equivalencia es 1€ = 166,386 pts.</b>";

include ('Seccion 1-1.php');

echo "<br><br><b>2. Modificar la página anterior para que los elementos aparezcan colocados en
una tabla con dos columnas, la primera para la cantidad en euros y la segunda
para la cantidad en pesetas. Colocar además una fila de encabezado en la
parte superior de la tabla (figura 2)</b><br><br>";

include ('Seccion 1-2.php');

echo "<br><br><b>3. Modificar la tabla anterior de la siguiente manera (figura 3):
    • Suprimir los bordes.
    • Añadir un color de fondo al encabezado (#FFEECC)
    • Añadir un color de fondo a las filas de la tabla, alternando entre dos
    colores diferentes para mejorar la legibilidad (#CCCCCC y #CCEEFF)</b><br><br>";

echo "<a href='$link_url'>$link_text</a>";

echo "<br><br><b>4. Crear una página que muestre un mensaje de bienvenida que dependa de la hora
actual, de la siguiente manera (figura 4):
• Si la hora se encuentra entre las 8 y las 13, mostrará ‘Buenos días’
Si la hora se encuentra entre las 14 y las 20, mostrará ‘Buenas tardes’
• Si la hora se encuentra entre las 21 y las 7, mostrará ‘Buenas noches’</b><br><br>";

include ('Seccion 1-4.php');

echo "<br><br><h2>Sección 2 – Cadenas de texto:</h2><br><br>";

include ('Seccion 2-cadenas.php');

echo "<br><br><h2>Sección 3 – Arrays:</h2><br><br>";

include ('Seccion 3.php');

echo "<h2>Sección 4: Funciones:</h2>";

echo "<br><br><b>1. Crea un fichero php llamado funciones.php y resuelve los siguientes puntos:
Queremos crear una función llamada insert que nos genere una sentencia
insert into en sql. Para ello la función recibirá dos parámetros: El nombre de la
tabla y un array asociativo que contendrá los nombres y valores de los campos
de la tabla. La sentencia resultante tendrá la siguiente forma:
insert into nombre_tabla (nombres campos separados por comas) values
(nombres campos separados por comas con el carácter ‘:’ delante)
Ayuda: utiliza las funciones sprintf, implode y array_keys.</b><br><br>";

include ('funciones.php');

echo "<br><br><b>2. Sea la cadena de caracteres $texto = 'uno-dos-tres-cuatro-cinco'; Crear una
página que, a partir de esta cadena, muestre una lista con los elementos de la
misma que resultan de partirla usando como carácter separador el guión ‘-‘
Utilizar las siguientes funciones de PHP: explode, count
Consultar el manual de PHP para averiguar el objetivo y la sintaxis de cada una
de ellas</b><br><br>";

include ('Seccion 4-2.php');

echo "<h2>Sección 5 - Formularios:</h2>";

include ('Seccion 5.php');

?>


</body>
</html>