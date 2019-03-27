<?php
    include("mis_clases.php");

    //Receive the RAW post data.
    $data = file_get_contents("php://input");
    
    //Attempt to decode the incoming RAW post data from JSON.
    $decoded = json_decode($data);

    $arrayVertices = array();
    $index = 0;

    foreach($decoded as $obj)
    {
        $arrayVertices[$index] = new Punto($obj["_x"], $obj["_y"]);
    }


    $miRectangulo = new Rectangulo($arrayVertices[0], $arrayVertices[1]);

    $miRectangulo->Dibujar();


    
    


    //var_dump($decoded); 

    /*

    if($_POST["Tipo"] == "Punto" &&  $_POST["Nombre"] == "Punto1")
    {
        if(isset($_POST["punto1X"]) && isset($_POST["punto1Y"]))
        {
            $xV1 = $_POST["punto1X"];
            $yV1 = $_POST["punto1Y"];
    
            $vertice1 = new Punto($xV1, $yV1);
        }
    }

    if($_POST["Tipo"] == "Punto" &&  $_POST["Nombre"] == "Punto3")
    {
        if(isset($_POST["punto3X"]) && isset($_POST["punto3Y"]))
        {
            $xV2 = $_POST["punto3X"];
            $yV2 = $_POST["punto3Y"];
    
            $vertice3 = new Punto($xV3, $yV3);
        }
    }

    $miRectangulo = new Rectangulo($vertice1, $vertice3);

    */
?>