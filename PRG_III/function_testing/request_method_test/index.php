<?php
    $requestMethod = $_SERVER['REQUEST_METHOD'];
    $contentType = explode(";", $_SERVER['CONTENT_TYPE'])[0];
    


    echo $requestMethod . "<br>";
    echo $contentType . "<br>";
    var_dump($content);
    //echo "<br>";
    //echo $boundary;

    // READ
    if($requestMethod == "GET")
    {

    }

    // CREATE
    if($requestMethod == "POST")
    {
    }

    // UPDATE
    if($requestMethod == "PUT")
    {

    }

    // DELETE
    if($requestMethod == "DELETE")
    {
    }

    function getServerRequestInfo()
    {
        $str  = "<table border='1px'>";
        $str .= "<tr>";
        $str .= "<th colspan='2'>Contenido de Superglobal: " . "$" . "_" . "$nombreSuperGlobal</th>";
        $str .= "</tr>";
        
        foreach($superGlobal as $key=>$value)
        {
            if($key == "CONTENT_TYPE" || $key == "REQUEST_METHOD")
            {
                ob_start();
                var_dump($value);
                $dump = ob_get_clean();
                
                $str .= "<tr>";         
                $str .= "<td>" . "$" . "_" . "$nombreSuperGlobal" . "['" . $key . "']" . "</td>";
                $str .= "<td>" . $dump . "</td>";
                $str .= "</tr>";
            }

        }
        echo $str;
    }

?>