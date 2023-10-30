<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tareas De Clase</title>
</head>
<body>

<?php
$valorDado = rand(1, 6);
$server_ip = $_SERVER['SERVER_ADDR'];
$server_host = $_SERVER['SERVER_NAME'];
$server_software = $_SERVER['SERVER_SOFTWARE'];
$user_agent = $_SERVER['HTTP_USER_AGENT'];
$client_ip = $_SERVER['REMOTE_ADDR'];

echo "<h2>10 Ejercicios de introducción</h2>";

echo "<b>2. Revise la documentación oficial de PHP para ver qué información podemos obtener de la variable superglobal \$_SERVER. 
Escribe un script haciendo uso de la variable superglobal \$_SERVER que muestre lo siguiente:</b><br><br>";

echo "Dirección IP del servidor: " . $server_ip . "<br>";
echo "Nombre del host del servidor: " . $server_host . "<br>";
echo "Software del servidor: " . $server_software . "<br>";
echo "Agente de usuario (User Agent): " . $user_agent . "<br>";
echo "Dirección IP del cliente: " . $client_ip . "<br><br>";

echo "<b>3. Revise la documentación oficial para conocer todas las variables superglobals que existen. Con ayuda
de la función print_r muestra el contenido de cada una de las variables superglobals.</b><br><br>";

echo "<pre>";
print_r($_SERVER);
echo "</pre>";

echo "<h2>11.5 Ejercicios</h2>";
echo "<b>4.4. Escribe un script PHP que realice la simulación de lanzar un dado y muestre una imagen con un valor
aleatorio enre 1 y 6. Resuelva el ejercicio utilizando la estructura de control if - else.</b><br><br>";

if ($valorDado == 1) {
    echo '<img src="Dice-1-b.svg" alt="1">';
} elseif ($valorDado == 2) {
    echo '<img src="Dice-2-b.svg" alt="2">';
} elseif ($valorDado == 3) {
    echo '<img src="Dice-3-b.svg" alt="3">';
} elseif ($valorDado == 4) {
    echo '<img src="Dice-4-b.svg" alt="4">';
} elseif ($valorDado == 5) {
    echo '<img src="Dice-5-b.svg" alt="5">';
} else {
    echo '<img src="Dice-6-b.svg" alt="6">';
}

echo "<p>El dado ha caído en el número $valorDado</p>";

echo "<b>5. Escribe un script PHP que realice la simulación de lanzar un dado y muestre una imagen con un valor
aleatorio enre 1 y 6. Resuelva el ejercicio utilizando la estructura de control switch.</b><br><br>";

switch ($valorDado) {
    case 1:
        echo '<img src="Dice-1-b.svg" alt="1">';
        break;
    case 2:
        echo '<img src="Dice-2-b.svg" alt="2">';
        break;
    case 3:
        echo '<img src="Dice-3-b.svg" alt="3">';
        break;
    case 4:
        echo '<img src="Dice-4-b.svg" alt="4">';
        break;
    case 5:
        echo '<img src="Dice-5-b.svg" alt="5">';
        break;
    default:
        echo '<img src="Dice-6-b.svg" alt="6">';
        break;
}

echo "<p>El dado ha caído en el número $valorDado</p>";

echo "<h2>13.7 Ejercicios</h2>";

echo "<b>10. Escribe un script PHP que muestre el siguiente array asociativo ordenado por la clave. El resultado
deberá seguir el siguiente patrón:</b><br><br>";

$capitales = array("Italy"=>"Rome", "Luxembourg"=>"Luxembourg", "Belgium"=> "Brussels", "Denmark"=>"Copenhagen", "Finland"=>"Helsinki", "France" => "Paris", "Slovakia"=>"Bratislava", "Slovenia"=>"Ljubljana", "Germany" => "Berlin", "Greece" => "Athens", "Ireland"=>"Dublin", "Netherlands"=>"Amsterdam", "Portugal"=>"Lisbon", "Spain"=>"Madrid", "Sweden"=>"Stockholm", "United Kingdom"=>"London", "Cyprus"=>"Nicosia", "Lithuania"=>"Vilnius", "Czech Republic"=>"Prague", "Estonia"=>"Tallin", "Hungary"=>"Budapest", "Latvia"=>" Riga", "Malta"=>"Valetta", "Austria" => "Vienna", "Poland"=>"Warsaw");
asort($capitales);
foreach ($capitales as $clave => $valor) {
     echo "La capital de " . strtoupper($clave) . " es " . strtoupper($valor);
     echo "<br><br>";
     }

echo "<b>11. Escribe un script PHP que convierta el array del ejercicio anterior en un objeto JSON.</b><br><br>";

$capitales = array("Italy"=>"Rome", "Luxembourg"=>"Luxembourg", "Belgium"=> "Brussels", "Denmark"=>"Copenhagen", "Finland"=>"Helsinki", "France" => "Paris", "Slovakia"=>"Bratislava", "Slovenia"=>"Ljubljana", "Germany" => "Berlin", "Greece" => "Athens", "Ireland"=>"Dublin", "Netherlands"=>"Amsterdam", "Portugal"=>"Lisbon", "Spain"=>"Madrid", "Sweden"=>"Stockholm", "United Kingdom"=>"London", "Cyprus"=>"Nicosia", "Lithuania"=>"Vilnius", "Czech Republic"=>"Prague", "Estonia"=>"Tallin", "Hungary"=>"Budapest", "Latvia"=>" Riga", "Malta"=>"Valetta", "Austria" => "Vienna", "Poland"=>"Warsaw");
asort($capitales);

$json_capitales = json_encode($capitales);

echo $json_capitales;

echo "<h2>14 Ejercicios - Funciones</h2>";

echo "<b>3. Escribe una función llamada inicializar_array que reciba tres parámetros llamados numero_de_elementos
, min y max, y que devuelva un array de números enteros comprendidos entre los valores min y max.
El número de elementos que contiene el array será el especificado en el parámetro de entrada
numero_de_elementos</b><br><br>";

include ('3.php');
  
echo "<br><br><b>4. Escribe una función llamada calcular_media que reciba un array como parámetro de entrada y que
devuelva la media de todos los valores que contiene</b><br><br>";

include ('4.php');

echo "<br><br><b>5. Escribe una función llamada calcular_maximo que reciba un array como parámetro de entrada y
que devuelva cuál es el máximo valor del array</b><br><br>";

include ('5.php');

echo "<br><br><b>6. Escribe una función llamada calcular_minimo que reciba un array como parámetro de entrada y
que devuelva cuál es el mínimo valor del array.</b><br><br>";

include ('6.php');

echo "<br><br><b>7. Escribe una función llamada imprimir_array que reciba un array como parámetro de entrada y
muestre su contenido en una tabla con dos columnas. La primera columna mostrará la posición del array
y la segunda el valor que hay en esa posición.</b><br><br>";

include ('7.php');

?>

</body>
</html>
