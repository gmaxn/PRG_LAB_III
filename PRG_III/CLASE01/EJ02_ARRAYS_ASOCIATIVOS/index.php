<?php

// declaracion array indexado:

    // Método #01
    $cars = array("Volvo", "BMW", "Toyota");

    // Método #02
    $cars[0] = "Volvo";
    $cars[1] = "BMW";
    $cars[2] = "Toyota";



// Declaracion de un array asociativo:

    // Método #01
    $miArray01 = array("nombre"=>"maxi", "edad"=>"28");

    // Método #02
    $miArray02 = array();

    $miArray02["nombre"] = "maxi";
    $miArray02["edad"] = 28;


    
// Recorrido de un Array asociativo

    $friend = array("Peter"=>"35", "Ben"=>"37", "Joe"=>"43");

    foreach($friend as $key => $value) {
        echo "Name: " . $key . ", Age: " . $value;
        echo "<br>";
    }

?>
