

<?php

    require_once(".\Funciones\crear_alumno.php");
    
    
    echo $miAlumno->retornarJSON();
    echo "<br><br>";
    var_dump($miAlumno);

    // decidir si el get tiene valor o no
    // listar todos lo del archivo o el alumno solicitado
/*
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        require_once(".\Funciones\crear_alumno.php");

        // collect value of input field
        $name = $_REQUEST['fname'];



        if (empty($name)) {
            echo "Name is empty";
        } else {
            echo $name;
        }
    }
    
*/


?>