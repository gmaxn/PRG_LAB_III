<?php
    require_once("Entidades/alumno.php");
    require_once("Bibliotecas/mi_biblioteca.php");

    if(isJSON($_SERVER['CONTENT_TYPE']))
    {
        $rawData = trim(file_get_contents("php://input"));  
        $data = decodificarJSON($rawData);
        saveData($data);
    }

    if(POSTParamsAreSetted(array("nombre", "apellido", "edad", "dni", "legajo")))
    {
        $data = post_params_get_array(array("nombre", "apellido", "edad", "dni", "legajo"));
        saveData($data);
    }

    // Subir una foto
    if(isset($_FILES))
    {
        require_once("Funciones/subir_fotos.php");

        $name = $_POST['legajo'] . $_POST['nombre'] . $_POST['apellido'];
        $ext = ".jpg";
        date_default_timezone_set('America/Argentina/Buenos_Aires');
        $date = "_" . date("dmY_gia");
        

        $imgFolder = "Fotos/";
        $bakFolder = "Fotos_Buckup/";

        $uploaddir = $imgFolder . $name . $ext;
        $movedir = $bakFolder . $name . $date . $ext;
        
        if(file_exists($uploaddir))
        {
            if(rename($uploaddir, $movedir))
            {
                echo "se modificó el archivo";
            }
            else
            {
                echo "no se pudo modificar el archivo";
            }
        }

        if(count($_FILES) == 1)
        {
            foreach($_FILES as $paramName=>$value)
            {
                subirFoto($uploaddir, $paramName);
            }
        }
    }
    
?>