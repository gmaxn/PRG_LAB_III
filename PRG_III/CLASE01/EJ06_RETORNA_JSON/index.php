<?php

    include("empleado.php");

    $miEmpleado = new Empleado("Harry", 29, "11111111");
    
    var_dump($miEmpleado);
    echo "<br><br>";

    echo $miEmpleado->retornarJSON();
    echo "<br><br>";

?>