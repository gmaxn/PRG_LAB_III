<?php
    require_once("Entidades/alumno.php");
    require_once("Bibliotecas/mi_biblioteca.php");

    if(isJSON($_SERVER['CONTENT_TYPE']))
    {
        $rawData = trim(file_get_contents("php://input"));
        
        $data = decodificarJSON($rawData);

        // Procesar JSON 
        if(isMultiArray($data))
        {
            foreach($data as $alumno)
            {
                $miAlumno = new Alumno($alumno['nombre'], $alumno['edad'], $alumno['dni'], $alumno['legajo']);
                $miAlumno->guardarCSV("Archivos/ListadoAlumnos.csv" ,"a+");
                $miAlumno->guardarJSON("Archivos/ListadoAlumnos.json" ,"a+");
            }  
        }
        else
        {
            $miAlumno = new Alumno($data['nombre'], $data['edad'], $data['dni'], $data['legajo']);
            $miAlumno->guardarCSV("Archivos/ListadoAlumnos.csv" ,"a+");
            $miAlumno->guardarJSON("Archivos/ListadoAlumnos.json" ,"a+");
        }
    }

    if(POSTParamsAreSetted(array("nombre", "edad", "dni", "legajo")))
    {
        $miAlumno = new Alumno($_POST['nombre'], $_POST['edad'], $_POST['dni'], $_POST['legajo']);
        $miAlumno->guardarCSV("Archivos/ListadoAlumnos.csv" ,"a+");
        $miAlumno->guardarJSON("Archivos/ListadoAlumnos.json" ,"a+");
    }
?>