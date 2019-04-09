<?php
    $requestMethod = $_SERVER['REQUEST_METHOD'];
    
    // READ
    if($requestMethod == "GET")
    {
        require_once("Funciones/leer_alumnos.php");
    }

    // CREATE
    if($requestMethod == "POST")
    {
        require_once("Funciones/crear_alumnos.php");
    }

    // UPDATE
    if($requestMethod == "PUT")
    {
        require_once("Funciones/modificar_alumnos.php");
    }

    // DELETE
    if($requestMethod == "DELETE")
    {
        require_once("Funciones/eliminar_alumnos.php");
    }

?>