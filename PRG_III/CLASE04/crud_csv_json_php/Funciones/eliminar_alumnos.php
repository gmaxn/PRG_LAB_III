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
                $alumno = Alumno::getAlumnoByID($arrayAlumnos, $datosAlumno['legajo']);
                $elimino = Alumno::remove($arrayAlumnos, $alumno);
                
                if($elimino)
                {
                    eliminarArchivos(array("Archivos/ListadoAlumnos.csv", "Archivos/ListadoAlumnos.json"));
                    generarArchivos($arrayAlumnos);
                    echo "Se elimino el alumno de manera exitosa";
                }
                else
                {
                    echo "No se encontro el alumno con legajo: " . $datosAlumno['legajo'];
                }
            }
        }
        mostrarAlumnos($arrayAlumnos);
    }
    else
    {
        echo "Error: El archivo no existe, o todavía no se han cargado datos.";
    }
?>