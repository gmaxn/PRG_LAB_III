<?php
    require_once("Entidades/alumno.php");
    require_once("Bibliotecas/mi_biblioteca.php");

    $rawContent = Alumno::leerCSV("Archivos/ListadoAlumnos.csv", "r");
    $arrayAlumnos = Alumno::decodificarCSV($rawContent);



    if(isJSON($_SERVER['CONTENT_TYPE']))
    {
        $datosAlumno = decodificarJSON(trim(file_get_contents("php://input")));
        
        if(isset($datosAlumno['legajo']))
        {
            $alumno = Alumno::getAlumnoByID($arrayAlumnos, $datosAlumno['legajo']);

            if($alumno != null)
            {          
                $alumno->nombre = $datosAlumno['nombre'];
                $alumno->edad = $datosAlumno['edad'];
                $alumno->dni = $datosAlumno['dni'];
            }

            mostrarAlumnos($arrayAlumnos);

            if(file_exists("Archivos/ListadoAlumnos.csv"))
            {
                unlink("Archivos/ListadoAlumnos.csv") or die("Couldn't delete file");
            }

            if(file_exists("Archivos/ListadoAlumnos.json"))
            {
                unlink("Archivos/ListadoAlumnos.json") or die("Couldn't delete file");
            }
             
            foreach($arrayAlumnos as $alumno)
            {
                $miAlumno = new Alumno($alumno->nombre, $alumno->edad, $alumno->dni, $alumno->legajo);

                $miAlumno->guardarCSV("Archivos/ListadoAlumnos.csv" ,"a+");
                $miAlumno->guardarJSON("Archivos/ListadoAlumnos.json" ,"a+");
            }
        }
    }
?>