<?php
    require_once("Entidades/alumno.php");
    require_once("Bibliotecas/mi_biblioteca.php");

    if(isJSON($_SERVER['CONTENT_TYPE']))
    {
        $rawData = trim(file_get_contents("php://input"));  
        $data = decodificarJSON($rawData);
        saveData($data);
    }

    if(POSTParamsAreSetted(array("nombre", "edad", "dni", "legajo")))
    {
        $data = post_params_get_array(array("nombre", "edad", "dni", "legajo"));
        saveData($data);
    }
?>