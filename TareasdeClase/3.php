<?php
function inicializar_array($numero_de_elementos, $min, $max) {
    if ($numero_de_elementos < 0 || $min > $max) {
      return "Parámetros inválidos";
    }
  
    $array = array();
    for ($i = 0; $i < $numero_de_elementos; $i++) {
      $numeroAleatorio = rand($min, $max);
      array_push($array, $numeroAleatorio);
    }
  
    return $array;
  }
  
  $numero_de_elementos = 5;
  $min = 1;
  $max = 10;
  $miArray = inicializar_array($numero_de_elementos, $min, $max);
  print_r($miArray); 
  ?>