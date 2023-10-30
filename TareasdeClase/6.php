<?php

function calcular_minimo($array) {
    $total = count($array);
    if ($total === 0) {
      return 0;
    }
  
    $suma = array_sum($array);
    $minimo = min($array);

    return $minimo;
  
  }
  
 
  $valores = [10, 20, 30, 40, 50];
  $minimo = calcular_minimo($valores);
  echo "El numero mas pequeño es: " . $minimo; 
  
?>