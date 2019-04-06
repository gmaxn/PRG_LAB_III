<?php

    function printSuperglobalData($superGlobal, $nombre)
    {
        $str = "<table border='1px'>";
        $str .= "<tr>";
        $str .= "<th colspan='2'>Contenido de Superglobal: "."$"."_"."$nombre</th>";
        $str .= "</tr>";

        
        foreach($superGlobal as $key=>$value)
        {
            ob_start();
            var_dump($value);
            $dump = ob_get_clean();
            $str .= "<tr>";         
            $str .= "<td>" . "$" . "_" . $nombre . "['" . $key . "']" . "</td>";
            $str .= "<td>" . $dump . "</td>";
            $str .= "</tr>";
        }
        echo $str;
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

    function isFORM($serverContentType)
    {
        $type = isset($serverContentType) ? trim($serverContentType) : "";
        $type = explode(";", $type);

        if(strcasecmp($type[0], "multipart/form-data") != 0)
        {
            return false;
        }
        return true;
    }

    function isUrlencoded($serverContentType)
    {
        $type = isset($serverContentType) ? trim($serverContentType) : "";

        if(strcasecmp($type, "application/x-www-form-urlencoded") != 0)
        {
            return false;
        }
        return true;
    }

    function GETParamsAreSetted($args)
    {
        foreach($args as $param)
        {
            if(!isset($_GET[$param]))
            {
                return false;
            }
        }
        return true;
    }
    
    function obtenerContenidosPUT()
    {
        // Obtengo el contenido de PUT en string y quito caracteres especiales
        $rawData = trim(file_get_contents("php://input"));

        // Decodifico contenido como JSON
        $decoded = json_decode($rawData, true);

        return $decoded;
        //return $rawData;
    }

    function printPut($nombre)
    {
        $rawData = obtenerContenidosPUT();

        ob_start();
        var_dump($rawData);
        var_dump($_GET);
        var_dump($_POST);
        $dump = ob_get_clean();

        $str = "<table border='1px'>";
        $str .= "<tr>";
        $str .= "<th>Contenido PUT Method: file_get_contents(php://input)</th>";
        $str .= "</tr>";

        $str .= "<tr>";         
        $str .= "<td>" . $dump . "</td>";
        $str .= "</tr>";



        
        foreach($rawData as $value)
        {
            ob_start();
            var_dump($value);
            $dump = ob_get_clean();
            $str .= "<tr>";         
            $str .= "<td>" . '.JSON' . "-" . $value . "</td>";
            $str .= "<td>" . $dump . "</td>";
            $str .= "</tr>";
        }
        echo $str;        
    }

    function obtenerContenidosDELETE()
    {
        // Obtengo el contenido de PUT en string y quito caracteres especiales
        $rawData = trim(file_get_contents("php://input"));

        // Decodifico contenido como JSON
        $decoded = json_decode($rawData, true);

        return $decoded;
        //return $rawData;
    }

    function printDelete($nombre)
    {
        $rawData = obtenerContenidosDELETE();

        ob_start();
        var_dump($rawData);
        var_dump($_GET);
        var_dump($_POST);
        $dump = ob_get_clean();

        $str = "<table border='1px'>";
        $str .= "<tr>";
        $str .= "<th>Contenido PUT Method: file_get_contents(php://input)</th>";
        $str .= "</tr>";

        $str .= "<tr>";         
        $str .= "<td>" . $dump . "</td>";
        $str .= "</tr>";
    
        foreach($rawData as $value)
        {
            ob_start();
            var_dump($value);
            $dump = ob_get_clean();
            $str .= "<tr>";         
            $str .= "<td>" . '.JSON' . "-" . $value . "</td>";
            $str .= "<td>" . $dump . "</td>";
            $str .= "</tr>";
        }
        echo $str;        
    }
?>