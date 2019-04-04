<?php
    $dato = $_SERVER['REQUEST_METHOD'];

    foreach($GLOBALS as $key=>$value)
    {
        echo $key;
        echo "<br><br>";
    }
    
    // echo $dato;
    // decidir si el get tiene valor o no
    // listar todos lo del archivo o el alumno solicitado


    if($dato == "POST")
    {
        require_once("Funciones/crea_alumnos.php");
    }

    if($dato == "GET")
    {
        require_once("Funciones/lista_alumnos.php");
    }
    
    if($dato == "PUT")
    {
        require_once("Funciones/modifica_alumnos.php");

        var_dump($_PUT["nombre"]);

        echo $_PUT["nombre"];
    }
    
    if($dato == "DELETE")
    {
        require_once("Funciones/borra_alumnos.php");
        echo $dato;
    }

    if(isset($_FILES))
    {
        require_once("Funciones/sube_fotos.php");

        foreach($_FILES as $paramName=>$value)
        {
            subirFoto("./Fotos/", $paramName, $paramName);
        }
    }

?>