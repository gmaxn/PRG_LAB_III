<?php
    require_once("manejador_postman_request.php");
    $dato = $_SERVER['REQUEST_METHOD'];

    printSuperglobalData($_SERVER, "SERVER");

    if($dato == "GET")
    {
        echo "entró en GET";
        printSuperglobalData($_GET, $dato);
    }

    if($dato == "POST")
    {
        echo "entró en POST";
        printSuperglobalData($_POST, $dato);
    }

    if($dato == "PUT")
    {
        echo "entró en PUT";

        printPut($dato);
    }

    if($dato == "DELETE")
    {
        echo "entró en DELETE";
        printDelete($dato);
    }

?>