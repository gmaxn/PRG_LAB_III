<?php
    include_once("Entidades/alumno.php");

    $rawFileContent = Alumno::leerCSV("Archivos/ListadoAlumnos.csv", "r");
    $arrayAlumnos = Alumno::codificarArchivo($rawFileContent);


    //Make sure that the content type of the POST request has been set to application/json
    if(isJSON($_SERVER['CONTENT_TYPE']))
    {
        //decodificarJSON($content) $content = RAW post data.
        $datosAlumno = decodificarJSON(trim(file_get_contents("php://input")));
        
        //Process the JSON


        // como identificar si estoy recibiendo 
        // un string de objetos o un objeto solo??


        if(isset($datosAlumno['legajo']))
        {
            //$alumno = getAlumnoByID($arrayAlumnos, $datosAlumno['legajo']);


            

            foreach($arrayAlumnos as &$alumno)
            {
                if($alumno->legajo == $datosAlumno['legajo'])
                {
                    $alumno->nombre = $datosAlumno['nombre'];
                    $alumno->edad = $datosAlumno['edad'];
                    $alumno->dni = $datosAlumno['dni'];
                }
            }

            listar($arrayAlumnos);

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
                $miAlumno = new Alumno($alumno->nombre,$alumno->edad, $alumno->dni, $alumno->legajo);

                $miAlumno->guardarCSV("Archivos/ListadoAlumnos.csv" ,"a+");
                $miAlumno->guardarJSON("Archivos/ListadoAlumnos.json" ,"a+");
            }

        }

    }
    
    if(!isset($_PUT['legajo']))
    {
        //var_dump($arrayAlumnos);
        //listar($arrayAlumnos);
    }
    
    if(isset($_PUT['legajo']))
    {
        //echo $_PUT['legajo'];
        $alumno = getAlumnoByID($arrayAlumnos, $_PUT['legajo']);
        if($alumno != null)
        {
            $arrayAlumnos[$alumno]->nombre = $_PUT['nombre'];
            $arrayAlumnos[$alumno]->edad = $_PUT['edad'];
            $arrayAlumnos[$alumno]->dni = $_PUT['dni'];
            $arrayAlumnos[$alumno]->legajo = $_PUT['legajo'];
            
            foreach($arrayAlumnos as $aux)
            {
                //echo "sarasa";
                $aux->guardarCSV("Archivos/ListadoAlumnos.csv" ,"w");
                $aux->guardarJSON("Archivos/ListadoAlumnos.json" ,"w");
            }

        }
        //listar($alumno);
    }

    //-----------------------------------
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
    
    //-----------------------------------
    
    function listar($arrayAlumnos)
    {
        $str  = "<table style='border:1px solid black'>";
        $str .= "<tr>";
        $str .= "<th>Nombre</th>";
        $str .= "<th>Edad</th>";
        $str .= "<th>DNI</th>";
        $str .= "<th>Legajo</th>";
        $str .= "</tr>";

        foreach($arrayAlumnos as $alumno)
        {
            $str .= "<tr>";
            $str .= "<th>$alumno->nombre</th>";
            $str .= "<th>$alumno->edad</th>";
            $str .= "<th>$alumno->dni</th>";
            $str .= "<th>$alumno->legajo</th>";
            $str .= "</tr>";
        }
        $str .= "</table>";  
        echo $str;
    }
    function getAlumnoByID($arr, $legajo)
    {
        foreach($arr as $alumno)
        {
            if($alumno->legajo == $legajo)
            {
                return $alumno; // retornar un alumno en lugar de un string
            }
        }
        return null;
    }
    function imprimir($alumno)
    {
        $str  = "<table style='border:1px solid black'>";
        $str .= "<tr>";
        $str .= "<th>Nombre</th>";
        $str .= "<th>Edad</th>";
        $str .= "<th>DNI</th>";
        $str .= "<th>Legajo</th>";
        $str .= "</tr>";
        $str .= "<tr>";
        $str .= "<th>$alumno->nombre</th>";
        $str .= "<th>$alumno->edad</th>";
        $str .= "<th>$alumno->dni</th>";
        $str .= "<th>$alumno->legajo</th>";
        $str .= "</tr>";
        $str .= "</table>";  
        echo $str;
    }

?>