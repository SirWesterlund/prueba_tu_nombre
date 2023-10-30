<?php

function calcular_media($array) {
    $total = count($array);
    if ($total === 0) {
      return 0;
    }
  
    $suma = array_sum($array);
    $media = $suma / $total;
  
    return $media;
  }
  
 
  $valores = [10, 20, 30, 40, 50];
  $media = calcular_media($valores);
  echo "La media es: " . $media; 
  

?>