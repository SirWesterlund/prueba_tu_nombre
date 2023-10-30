<?php

function calcular_maximo($array) {
    $total = count($array);
    if ($total === 0) {
      return 0;
    }
  
    $suma = array_sum($array);
    $maximo = max($array);

    return $maximo;
  
  }
  
 
  $valores = [10, 20, 30, 40, 50];
  $maximo = calcular_maximo($valores);
  echo "El numero mas grande es: " . $maximo; 
  
?>