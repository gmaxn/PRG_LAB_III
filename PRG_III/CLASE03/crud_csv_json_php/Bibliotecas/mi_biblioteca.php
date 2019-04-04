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

?>