<?php
    include_once("Entidades/alumno.php");
  
    //Make sure that the content type of the POST request has been set to application/json
    if(isJSON($_SERVER['CONTENT_TYPE']))
    {
        //decodificarJSON($content) $content = RAW post data.
        $arrayAlumnos = decodificarJSON(trim(file_get_contents("php://input")));
        

        
        //Process the JSON
        foreach($arrayAlumnos as $alumno)
        {
            $miAlumno = new Alumno($alumno['nombre'],$alumno['edad'],$alumno['dni'], $alumno['legajo']);
            $miAlumno->guardarCSV("Archivos/ListadoAlumnos.csv" ,"a+");
            $miAlumno->guardarJSON("Archivos/ListadoAlumnos.json" ,"a+");
        }
    }

    if(isFormParam())
    {
        $miAlumno = new Alumno($_POST['nombre'], $_POST['edad'], $_POST['dni'], $_POST['legajo']);
        $miAlumno->guardarCSV("Archivos/ListadoAlumnos.csv" ,"a+");
        $miAlumno->guardarJSON("Archivos/ListadoAlumnos.json" ,"a+");
        echo "se guardaron los datos con exito";
    }


    
    //-----------------------------------------
    function isFormParam()
    {
        if (isset($_POST['nombre']) &&
            isset($_POST['edad']) &&
            isset($_POST['dni']) &&
            isset($_POST['legajo'])) 
        {
            return true;
        }
        return false;
    }
    function isJSON($serverContentType)
    {
        $type = isset($serverContentType) ? trim($serverContentType) : "";

        if(strcasecmp($type, "application/json") != 0)
        {
            return false;
        }
        return true;
    }
    function decodificarJSON($content)
    {
        //Attempt to decode the incoming RAW post data from JSON.
        $arrayObjetos = json_decode($content, true);
        
        //If json_decode failed, the JSON is invalid.
        if(!is_array($arrayObjetos))
        {
            throw new Exception('Received content contained invalid JSON!');
        }
        return $arrayObjetos;
    }

?>