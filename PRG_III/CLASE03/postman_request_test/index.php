<?php
    $requestMethod = $_SERVER['REQUEST_METHOD'];
    
    // READ
    if($requestMethod == "GET")
    {
        echo $requestMethod;
    }

    // CREATE
    if($requestMethod == "POST")
    {
        echo $requestMethod;
    }

    // UPDATE
    if($requestMethod == "PUT")
    {
        echo $requestMethod;
    }

    // DELETE
    if($requestMethod == "DELETE")
    {
        echo $requestMethod;
    }




?>