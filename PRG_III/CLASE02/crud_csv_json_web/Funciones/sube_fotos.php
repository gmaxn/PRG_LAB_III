<?php


    function subirFoto($uploaddir, $requestName, $nuevoNombre)
    {
        $nombreCompletoArchivo = basename($_FILES[$requestName]['name']);
        list($nombreArchivo, $extensionArchivo) = explode(".", $nombreCompletoArchivo);

        $uploadfile = $uploaddir . $nuevoNombre . "." . $extensionArchivo;
    
        if (move_uploaded_file($_FILES[$requestName]['tmp_name'], $uploadfile)) 
        {
            echo "File is valid, and was successfully uploaded.<br><br>";
        } 
        else 
        {
            echo "Possible file upload attack!<br><br>";
        }
    
        //print_r($_FILES);
    }

    function createWaterMark($uploadfile)
    {
        // Load the mian image
        $source = imagecreatefromjpeg($uploadimage);

        // load the image you want to you want to be watermarked
        $watermark = imagecreatefrompng('watermark.png');

        // get the width and height of the watermark image
        $water_width = imagesx($watermark);
        $water_height = imagesy($watermark);

        // get the width and height of the main image image
        $main_width = imagesx($source);
        $main_height = imagesy($source);

        // Set the dimension of the area you want to place your watermark we use 0
        // from x-axis and 0 from y-axis 
        $dime_x = 0;
        $dime_y = 0;

        // copy both the images
        imagecopy($source, $watermark, $dime_x, $dime_y, 0, 0, $water_width, $water_height);

        // Final processing Creating The Image
        imagejpeg($source, $thumbnail, 100);



    }




?>

