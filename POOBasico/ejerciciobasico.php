<!DOCTYPE html>
<html>
<body>

<?php
    class Persona {
        public $nombre;
        public $apellido1;
        public $apellido2;
        public $edad;

        function set_name($nombre) {
            $this->nombre = $nombre;
        }

        function set_apellido1($apellido1) {
            $this->apellido1 = $apellido1;
        }

        function set_apellido2($apellido2) {
            $this->apellido2 = $apellido2;
        }


        function set_edad($edad) {
            $this->edad= $edad;
        }

        function get_name() {
            return $this->nombre;
        }

        function get_apellido1() {
            return $this->apellido1;
        }

        function get_apellido2() {
            return $this->apellido2;
        }

        function get_edad() {
            return $this->edad;
        }
    }

    $david = new Persona();
    $tronchoni = new Persona();
    $gonzalez = new Persona();
    $edad = new Persona();
    $david->set_name('David');
    $tronchoni->set_apellido1('Tronchoni');
    $gonzalez->set_apellido2('Gonzalez');
    $edad->set_edad(21);

    echo $david->get_name();
    echo "<br>";
    echo $tronchoni->get_apellido1();
    echo "<br>";
    echo $gonzalez->get_apellido2();
    echo "<br>";
    echo $edad->get_edad();
    echo "<br><br>";
    $imprimir = get_object_vars($david);
    print_r($imprimir);
    echo "<br><br>";
    $imprimir = get_object_vars($tronchoni);
    print_r($imprimir);
    echo "<br><br>";
    $imprimir = get_object_vars($gonzalez);
    print_r($imprimir);
    echo "<br><br>";
    $imprimir = get_object_vars($edad);
    print_r($imprimir);
?>

</body>
</html>
