<?php

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

    function isJSON($serverContentType)
    {
        $type = isset($serverContentType) ? trim($serverContentType) : "";

        if(strcasecmp($type, "application/json") != 0)
        {
            return false;
        }
        return true;
    }

    function isMultiArray($arr)
    {
        if (count($arr) == count($arr, COUNT_RECURSIVE)) 
        {
            return false;
        }
        return true;
    }

    function GETParamsAreSetted($args)
    {
        if(isset($_GET))
        {
            foreach($args as $param)
            {
                if(!isset($_GET[$param]))
                {
                    return false;
                }
            }
        }
        return true;
    }

    function POSTParamsAreSetted($args)
    {
        if(isset($_POST))
        {
            foreach($args as $param)
            {
                if(!isset($_POST[$param]))
                {
                    return false;
                }
            }
        }
        return true;
    }

    function mostrarAlumnos($arrayAlumnos)
    {
        $str  = "<table border='1px'>";
        
        $str .= "<tr>";
        $str .= "<th>Nombre</th>";
        $str .= "<th>Apellido</th>";
        $str .= "<th>Edad</th>";
        $str .= "<th>DNI</th>";
        $str .= "<th>Legajo</th>";
        $str .= "</tr>";

        foreach($arrayAlumnos as $alumno)
        {
            $str .= "<tr>";
            $str .= $alumno->alumnoToString();
            $str .= "</tr>";
        }

        $str .= "</table>";  
        
        echo $str;
    }

    function modificarAlumno($array, $json)
    {
        $alumno = Alumno::getAlumnoByID($array, $json['legajo']);

        if($alumno != null)
        {          
            $alumno->nombre = $json['nombre'];
            $alumno->nombre = $json['apellido'];
            $alumno->edad = $json['edad'];
            $alumno->dni = $json['dni'];
        }
    }

    function generarArchivos($arrayAlumnos)
    {
        foreach($arrayAlumnos as $alumno)
        {
            $miAlumno = new Alumno($alumno->nombre, $alumno->apellido, $alumno->edad, $alumno->dni, $alumno->legajo);

            $miAlumno->guardarCSV("Archivos/ListadoAlumnos.csv" ,"a+");
            $miAlumno->guardarJSON("Archivos/ListadoAlumnos.json" ,"a+");
        }
    }

    function eliminarArchivos($args)
    {
        if(is_array($args))
        {
            foreach($args as $path)
            {
                if(file_exists($path))
                {
                    unlink($path) or die("No se pudo eliminar: $path");
                }
            }
            return true;
        }

        if(is_string($args))
        {
            if(file_exists($path))
            {
                unlink($path) or die("No se pudo eliminar: $path");
            }
            return true;
        }
        
        return false;
    }

    function saveData($args)
    {
        if(isMultiArray($args))
        {
            foreach($args as $alumno)
            {
                $miAlumno = new Alumno($alumno['nombre'], $alumno['apellido'], $alumno['edad'], $alumno['dni'], $alumno['legajo']);
                $miAlumno->guardarCSV("Archivos/ListadoAlumnos.csv" ,"a+");
                $miAlumno->guardarJSON("Archivos/ListadoAlumnos.json" ,"a+");
            }
            return true;
        }
        else
        {
            $miAlumno = new Alumno($args['nombre'], $args['apellido'], $args['edad'], $args['dni'], $args['legajo']);
            $miAlumno->guardarCSV("Archivos/ListadoAlumnos.csv" ,"a+");
            $miAlumno->guardarJSON("Archivos/ListadoAlumnos.json" ,"a+");
            return true;
        }
        return false;
    }

    function post_params_get_array($values)
    {
        $array = array();
        
        foreach($values as $keys)
        {
            if(!isset($_POST[$keys]))
            {
                return null;
            }
            
            $array[$keys] = $_POST[$keys];
        }
        return $array;
    }

    function get_params_get_array($values)
    {
        $array = array();
        
        foreach($values as $keys)
        {
            if(!isset($_GET[$keys]))
            {
                return null;
            }
            
            $array[$keys] = $_GET[$keys];
        }
        return $array;
    }

?>