<?php
    require_once("Entidades/alumno.php");
    require_once("Bibliotecas/mi_biblioteca.php");

    $rawContent = Alumno::leerCSV("Archivos/ListadoAlumnos.csv", "r");
    $arrayAlumnos = Alumno::decodificarCSV($rawContent);

    if(isset($arrayAlumnos))
    {
        if(GETParamsAreSetted(array("legajo")))
        {
            $alumno = Alumno::getAlumnoByID($arrayAlumnos, $_GET['legajo']);
            $alumno->imprimirAlumno();
        }
        else
        {
            mostrarAlumnos($arrayAlumnos);
        }
    }
    else
    {
        echo "Error: El archivo no existe, o todavía no se han cargado datos.";
    }
?>