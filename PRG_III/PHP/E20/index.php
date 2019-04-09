<?php

    //include("crear_objetos.php");
    include("mis_clases.php");

    $vertice1 = new Punto(5, 8);
    echo $vertice1->GetX();
    echo $vertice1->GetY();

    echo json_encode($vertice1);

    //$miRectangulo->Dibujar();

?>