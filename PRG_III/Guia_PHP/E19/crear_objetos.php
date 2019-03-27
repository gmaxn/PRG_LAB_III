<?php
    include("mis_clases.php");

    if(isset($_GET["Tipo"]) &&  $_GET["Tipo"] == "Rectangulo")
    {
        if(isset($_GET["base"]) && isset($_GET["altura"]))
        {
            $base = $_GET["base"];
            $altura = $_GET["altura"];
    
            $miRectangulo = new Rectangulo($base, $altura);

            $miRectangulo->SetColor("Magenta");
            $miRectangulo->ToString();
            $miRectangulo->Dibujar();
        }
    }

    if(isset($_GET["Tipo"])  &&  $_GET["Tipo"] == "Triangulo")
    {
        if(isset($_GET["base"]) && isset($_GET["altura"]))
        {
            $base = $_GET["base"];
            $altura = $_GET["altura"];
    
            $miTriangulo = new Triangulo($base, $altura);

            $miTriangulo->SetColor("Cyan");
            $miTriangulo->ToString();
            $miTriangulo->Dibujar();
        }
    }
?>