<?php

    //$content = trim(file_get_contents("ListadoAlumnos.txt"));


    $content = file_get_contents("ListadoAlumnos.txt");
    $trimmed = trim($content, " ");

    echo "<pre>".$trimmed."<pre>";

    //Attempt to decode the incoming RAW post data from JSON.
    $decoded = json_decode($content, true);

    foreach($decoded as $alumno)
    {   
        $str ="nombre: " . $alumno['nombre'] . PHP_EOL;
        $str.="edad: " . $alumno['edad'] . PHP_EOL;
        $str.="dni: " . $alumno['dni'] . PHP_EOL;
        $str.="legajo: " . $alumno['legajo'] . PHP_EOL;
        guardarCSV("Archivos\sarasa.csv", "a+", $str);

    }

    function guardarCSV($path, $mode, $str)
    {   
        $gestor = fopen($path, $mode);
        fwrite($gestor, $str);
        fclose($gestor);
    }


?>