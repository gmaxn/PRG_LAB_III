<?php
    require_once("Entidades/alumno.php");
    require_once("Bibliotecas/mi_biblioteca.php");

    $rawContent = Alumno::leerCSV("Archivos/ListadoAlumnos.csv", "r");
    $arrayAlumnos = Alumno::decodificarCSV($rawContent);

    if(isset($arrayAlumnos))
    {
        if(isJSON($_SERVER['CONTENT_TYPE']))
        {
            $datosAlumno = decodificarJSON(trim(file_get_contents("php://input")));
            
            if(isset($datosAlumno['legajo']))
            {
                modificarAlumno($arrayAlumnos, $datosAlumno);
                eliminarArchivos(array("Archivos/ListadoAlumnos.csv", "Archivos/ListadoAlumnos.json"));
                generarArchivos($arrayAlumnos);
            }
        }
        mostrarAlumnos($arrayAlumnos);
    }
    else
    {
        echo "Error: El archivo no existe, o todavía no se han cargado datos.";
    }

?>