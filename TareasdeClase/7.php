<?php

function imprimir_array($array) {
    if (is_array($array) && !empty($array)) {
        echo '<table border="1">';
        echo '<tr><th>Posición</th><th>Valor</th></tr>';
        
        foreach ($array as $posicion => $valor) {
            echo '<tr>';
            echo '<td>' . $posicion . '</td>';
            echo '<td>' . $valor . '</td>';
            echo '</tr>';
        }
        
        echo '</table>';
    } else {
        echo 'El parámetro no es un array válido o está vacío.';
    }
}

$array = array("Cohete", "Barco", "Kiwi", "Isla");

imprimir_array($array);

?>
